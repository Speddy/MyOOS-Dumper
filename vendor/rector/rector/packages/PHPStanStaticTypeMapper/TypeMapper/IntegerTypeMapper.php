<?php

declare (strict_types=1);
namespace Rector\PHPStanStaticTypeMapper\TypeMapper;

use PhpParser\Node;
use PhpParser\Node\Identifier;
use PHPStan\PhpDocParser\Ast\Type\IdentifierTypeNode;
use PHPStan\PhpDocParser\Ast\Type\TypeNode;
use PHPStan\Type\IntegerType;
use PHPStan\Type\Type;
use Rector\Core\Php\PhpVersionProvider;
use Rector\Core\ValueObject\PhpVersionFeature;
use Rector\PHPStanStaticTypeMapper\Contract\TypeMapperInterface;
/**
 * @implements TypeMapperInterface<IntegerType>
 */
final readonly class IntegerTypeMapper implements TypeMapperInterface
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
        return IntegerType::class;
    }
    /**
     * @param IntegerType $type
     */
    public function mapToPHPStanPhpDocTypeNode(Type $type) : TypeNode
    {
        // note: cannot be handled by PHPStan as uses explicit values
        return new IdentifierTypeNode('int');
    }
    /**
     * @param IntegerType $type
     */
    public function mapToPhpParserNode(Type $type, string $typeKind) : ?Node
    {
        if (!$this->phpVersionProvider->isAtLeastPhpVersion(PhpVersionFeature::SCALAR_TYPES)) {
            return null;
        }
        return new Identifier('int');
    }
}
