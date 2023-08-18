<?php

declare (strict_types=1);
namespace Rector\PhpDocDecorator;

use PhpParser\Node\ComplexType;
use PhpParser\Node\Expr\ArrowFunction;
use PhpParser\Node\Expr\Closure;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Param;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Function_;
use PHPStan\PhpDocParser\Ast\PhpDoc\ReturnTagValueNode;
use PHPStan\Reflection\ClassReflection;
use PHPStan\Type\ObjectType;
use PHPStan\Type\ThisType;
use PHPStan\Type\Type;
use PHPStan\Type\TypeCombinator;
use PHPStan\Type\UnionType;
use Rector\BetterPhpDocParser\PhpDocInfo\PhpDocInfoFactory;
use Rector\BetterPhpDocParser\PhpDocManipulator\PhpDocTypeChanger;
use Rector\Core\Php\PhpVersionProvider;
use Rector\Core\Reflection\ReflectionResolver;
use Rector\Core\ValueObject\PhpVersionFeature;
use Rector\NodeNameResolver\NodeNameResolver;
use Rector\Php80\NodeAnalyzer\PhpAttributeAnalyzer;
use Rector\PhpAttribute\NodeFactory\PhpAttributeGroupFactory;
use Rector\PHPStanStaticTypeMapper\Enum\TypeKind;
use Rector\StaticTypeMapper\StaticTypeMapper;
use Rector\StaticTypeMapper\ValueObject\Type\SelfStaticType;
use Rector\ValueObject\ClassMethodWillChangeReturnType;
/**
 * @see https://wiki.php.net/rfc/internal_method_return_types#proposal
 */
final class PhpDocFromTypeDeclarationDecorator
{
    /**
     * @var ClassMethodWillChangeReturnType[]
     */
    private array $classMethodWillChangeReturnTypes = [];
    public function __construct(/**
     * @readonly
     */
    private readonly StaticTypeMapper $staticTypeMapper, /**
     * @readonly
     */
    private readonly PhpDocInfoFactory $phpDocInfoFactory, /**
     * @readonly
     */
    private readonly NodeNameResolver $nodeNameResolver, /**
     * @readonly
     */
    private readonly PhpDocTypeChanger $phpDocTypeChanger, /**
     * @readonly
     */
    private readonly PhpAttributeGroupFactory $phpAttributeGroupFactory, /**
     * @readonly
     */
    private readonly ReflectionResolver $reflectionResolver, /**
     * @readonly
     */
    private readonly PhpAttributeAnalyzer $phpAttributeAnalyzer, /**
     * @readonly
     */
    private readonly PhpVersionProvider $phpVersionProvider)
    {
        $this->classMethodWillChangeReturnTypes = [
            // @todo how to make list complete? is the method list needed or can we use just class names?
            new ClassMethodWillChangeReturnType('ArrayAccess', 'offsetGet'),
            new ClassMethodWillChangeReturnType('ArrayAccess', 'getIterator'),
        ];
    }
    /**
     * @param \PhpParser\Node\Stmt\ClassMethod|\PhpParser\Node\Stmt\Function_|\PhpParser\Node\Expr\Closure|\PhpParser\Node\Expr\ArrowFunction $functionLike
     */
    public function decorateReturn($functionLike) : void
    {
        if ($functionLike->returnType === null) {
            return;
        }
        $phpDocInfo = $this->phpDocInfoFactory->createFromNodeOrEmpty($functionLike);
        $returnTagValueNode = $phpDocInfo->getReturnTagValue();
        $returnType = $returnTagValueNode instanceof ReturnTagValueNode ? $this->staticTypeMapper->mapPHPStanPhpDocTypeToPHPStanType($returnTagValueNode, $functionLike->returnType) : $this->staticTypeMapper->mapPhpParserNodePHPStanType($functionLike->returnType);
        // if nullable is supported, downgrade to that one
        if ($this->isNullableSupportedAndPossible($returnType)) {
            $functionLike->returnType = $this->staticTypeMapper->mapPHPStanTypeToPhpParserNode($returnType, TypeKind::RETURN);
            return;
        }
        $this->phpDocTypeChanger->changeReturnType($functionLike, $phpDocInfo, $returnType);
        $functionLike->returnType = null;
        if (!$functionLike instanceof ClassMethod) {
            return;
        }
        $classReflection = $this->reflectionResolver->resolveClassReflection($functionLike);
        if (!$classReflection instanceof ClassReflection || !$classReflection->isInterface() && !$classReflection->isClass()) {
            return;
        }
        if (!$this->isRequireReturnTypeWillChange($classReflection, $functionLike)) {
            return;
        }
        $functionLike->attrGroups[] = $this->phpAttributeGroupFactory->createFromClass('ReturnTypeWillChange');
    }
    /**
     * @param array<class-string<Type>> $requiredTypes
     * @param \PhpParser\Node\Stmt\ClassMethod|\PhpParser\Node\Stmt\Function_|\PhpParser\Node\Expr\Closure|\PhpParser\Node\Expr\ArrowFunction $functionLike
     */
    public function decorateParam(Param $param, $functionLike, array $requiredTypes) : void
    {
        if ($param->type === null) {
            return;
        }
        $type = $this->staticTypeMapper->mapPhpParserNodePHPStanType($param->type);
        if (!$this->isMatchingType($type, $requiredTypes)) {
            return;
        }
        if ($this->isNullableSupportedAndPossible($type)) {
            $param->type = $this->staticTypeMapper->mapPHPStanTypeToPhpParserNode($type, TypeKind::PARAM);
            return;
        }
        $this->moveParamTypeToParamDoc($functionLike, $param, $type);
    }
    /**
     * @param \PhpParser\Node\Stmt\ClassMethod|\PhpParser\Node\Stmt\Function_|\PhpParser\Node\Expr\Closure|\PhpParser\Node\Expr\ArrowFunction $functionLike
     */
    public function decorateParamWithSpecificType(Param $param, $functionLike, Type $requireType) : bool
    {
        if ($param->type === null) {
            return \false;
        }
        if (!$this->isTypeMatch($param->type, $requireType)) {
            return \false;
        }
        $type = $this->staticTypeMapper->mapPhpParserNodePHPStanType($param->type);
        if ($this->isNullableSupportedAndPossible($type)) {
            $param->type = $this->staticTypeMapper->mapPHPStanTypeToPhpParserNode($type, TypeKind::PARAM);
            return \true;
        }
        $this->moveParamTypeToParamDoc($functionLike, $param, $type);
        return \true;
    }
    /**
     * @return bool True if node was changed
     * @param \PhpParser\Node\Stmt\ClassMethod|\PhpParser\Node\Stmt\Function_|\PhpParser\Node\Expr\Closure|\PhpParser\Node\Expr\ArrowFunction $functionLike
     */
    public function decorateReturnWithSpecificType($functionLike, Type $requireType) : bool
    {
        if ($functionLike->returnType === null) {
            return \false;
        }
        if (!$this->isTypeMatch($functionLike->returnType, $requireType)) {
            return \false;
        }
        $this->decorateReturn($functionLike);
        return \true;
    }
    private function isRequireReturnTypeWillChange(ClassReflection $classReflection, ClassMethod $classMethod) : bool
    {
        if ($classReflection->isAnonymous()) {
            return \false;
        }
        $methodName = $classMethod->name->toString();
        // support for will return change type in case of removed return doc type
        // @see https://php.watch/versions/8.1/ReturnTypeWillChange
        foreach ($this->classMethodWillChangeReturnTypes as $classMethodWillChangeReturnType) {
            if ($classMethodWillChangeReturnType->getMethodName() !== $methodName) {
                continue;
            }
            if (!$classReflection->isSubclassOf($classMethodWillChangeReturnType->getClassName())) {
                continue;
            }
            if ($this->phpAttributeAnalyzer->hasPhpAttribute($classMethod, 'ReturnTypeWillChange')) {
                continue;
            }
            return \true;
        }
        return \false;
    }
    /**
     * @param \PhpParser\Node\ComplexType|\PhpParser\Node\Identifier|\PhpParser\Node\Name $typeNode
     */
    private function isTypeMatch($typeNode, Type $requireType) : bool
    {
        $returnType = $this->staticTypeMapper->mapPhpParserNodePHPStanType($typeNode);
        if ($returnType instanceof SelfStaticType) {
            $returnType = new ThisType($returnType->getClassReflection());
        }
        // cover nullable union types
        if ($returnType instanceof UnionType) {
            $returnType = TypeCombinator::removeNull($returnType);
        }
        if ($returnType instanceof ObjectType) {
            return $returnType->equals($requireType);
        }
        return $returnType::class === $requireType::class;
    }
    /**
     * @param \PhpParser\Node\Stmt\ClassMethod|\PhpParser\Node\Stmt\Function_|\PhpParser\Node\Expr\Closure|\PhpParser\Node\Expr\ArrowFunction $functionLike
     */
    private function moveParamTypeToParamDoc($functionLike, Param $param, Type $type) : void
    {
        $phpDocInfo = $this->phpDocInfoFactory->createFromNodeOrEmpty($functionLike);
        $paramName = $this->nodeNameResolver->getName($param);
        $this->phpDocTypeChanger->changeParamType($functionLike, $phpDocInfo, $type, $param, $paramName);
        $param->type = null;
    }
    /**
     * @param array<class-string<Type>> $requiredTypes
     */
    private function isMatchingType(Type $type, array $requiredTypes) : bool
    {
        return \in_array($type::class, $requiredTypes, \true);
    }
    private function isNullableSupportedAndPossible(Type $type) : bool
    {
        if (!$this->phpVersionProvider->isAtLeastPhpVersion(PhpVersionFeature::NULLABLE_TYPE)) {
            return \false;
        }
        if (!$type instanceof UnionType) {
            return \false;
        }
        if (\count($type->getTypes()) !== 2) {
            return \false;
        }
        return TypeCombinator::containsNull($type);
    }
}
