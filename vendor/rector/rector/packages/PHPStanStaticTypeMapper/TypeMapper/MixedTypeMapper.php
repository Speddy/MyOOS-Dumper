<?php

declare (strict_types=1);
namespace Rector\PHPStanStaticTypeMapper\TypeMapper;

use PhpParser\Node;
use PhpParser\Node\Identifier;
use PHPStan\PhpDocParser\Ast\Type\TypeNode;
use PHPStan\Type\MixedType;
use PHPStan\Type\Type;
use Rector\Core\Php\PhpVersionProvider;
use Rector\Core\ValueObject\PhpVersionFeature;
use Rector\PHPStanStaticTypeMapper\Contract\TypeMapperInterface;
/**
 * @implements TypeMapperInterface<MixedType>
 */
final readonly class MixedTypeMapper implements TypeMapperInterface
{
    public function __construct(
        /**
         * @readonly
         */
        private PhpVersionProvider $phpVersionProvider
    )
    {
    }
    /**
     * @return class-string<Type>
     */
    public function getNodeClass() : string
    {
        return MixedType::class;
    }
    /**
     * @param MixedType $type
     */
    public function mapToPHPStanPhpDocTypeNode(Type $type) : TypeNode
    {
        return $type->toPhpDocNode();
    }
    /**
     * @param MixedType $type
     */
    public function mapToPhpParserNode(Type $type, string $typeKind) : ?Node
    {
        if (!$this->phpVersionProvider->isAtLeastPhpVersion(PhpVersionFeature::MIXED_TYPE)) {
            return null;
        }
        if (!$type->isExplicitMixed()) {
            return null;
        }
        return new Identifier('mixed');
    }
}
