<?php

declare (strict_types=1);
namespace Rector\FamilyTree\Reflection;

use PhpParser\Node\Name;
use PhpParser\Node\Stmt\Class_;
use PhpParser\Node\Stmt\Interface_;
use PHPStan\Reflection\ClassReflection;
use PHPStan\Reflection\ReflectionProvider;
use Rector\Core\PhpParser\AstResolver;
use Rector\Core\Util\Reflection\PrivatesAccessor;
use Rector\NodeNameResolver\NodeNameResolver;
final readonly class FamilyRelationsAnalyzer
{
    public function __construct(
        /**
         * @readonly
         */
        private ReflectionProvider $reflectionProvider,
        /**
         * @readonly
         */
        private PrivatesAccessor $privatesAccessor,
        /**
         * @readonly
         */
        private NodeNameResolver $nodeNameResolver,
        /**
         * @readonly
         */
        private AstResolver $astResolver
    )
    {
    }
    /**
     * @return ClassReflection[]
     */
    public function getChildrenOfClassReflection(ClassReflection $desiredClassReflection) : array
    {
        /** @var ClassReflection[] $classReflections */
        $classReflections = $this->privatesAccessor->getPrivateProperty($this->reflectionProvider, 'classes');
        $childrenClassReflections = [];
        foreach ($classReflections as $classReflection) {
            if (!$classReflection->isSubclassOf($desiredClassReflection->getName())) {
                continue;
            }
            $childrenClassReflections[] = $classReflection;
        }
        return $childrenClassReflections;
    }
    /**
     * @api
     * @return string[]
     * @param \PhpParser\Node\Stmt\Class_|\PhpParser\Node\Stmt\Interface_|\PhpParser\Node\Name $classOrName
     */
    public function getClassLikeAncestorNames($classOrName) : array
    {
        $ancestorNames = [];
        if ($classOrName instanceof Name) {
            $fullName = $this->nodeNameResolver->getName($classOrName);
            $classLike = $this->astResolver->resolveClassFromName($fullName);
        } else {
            $classLike = $classOrName;
        }
        if ($classLike instanceof Interface_) {
            foreach ($classLike->extends as $extendInterfaceName) {
                $ancestorNames[] = $this->nodeNameResolver->getName($extendInterfaceName);
                $ancestorNames = \array_merge($ancestorNames, $this->getClassLikeAncestorNames($extendInterfaceName));
            }
        }
        if ($classLike instanceof Class_) {
            if ($classLike->extends instanceof Name) {
                $ancestorNames[] = $this->nodeNameResolver->getName($classLike->extends);
                $ancestorNames = \array_merge($ancestorNames, $this->getClassLikeAncestorNames($classLike->extends));
            }
            foreach ($classLike->implements as $implement) {
                $ancestorNames[] = $this->nodeNameResolver->getName($implement);
                $ancestorNames = \array_merge($ancestorNames, $this->getClassLikeAncestorNames($implement));
            }
        }
        /** @var string[] $ancestorNames */
        return $ancestorNames;
    }
}
