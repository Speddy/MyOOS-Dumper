<?php

declare (strict_types=1);
namespace Rector\NodeManipulator;

use PhpParser\Node\ComplexType;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Stmt\Property;
use PHPStan\PhpDocParser\Ast\PhpDoc\VarTagValueNode;
use Rector\BetterPhpDocParser\PhpDocInfo\PhpDocInfoFactory;
use Rector\BetterPhpDocParser\PhpDocManipulator\PhpDocTypeChanger;
use Rector\StaticTypeMapper\StaticTypeMapper;
final readonly class PropertyDecorator
{
    public function __construct(
        /**
         * @readonly
         */
        private PhpDocInfoFactory $phpDocInfoFactory,
        /**
         * @readonly
         */
        private StaticTypeMapper $staticTypeMapper,
        /**
         * @readonly
         */
        private PhpDocTypeChanger $phpDocTypeChanger
    )
    {
    }
    /**
     * @param \PhpParser\Node\ComplexType|\PhpParser\Node\Identifier|\PhpParser\Node\Name $typeNode
     */
    public function decorateWithDocBlock(Property $property, $typeNode) : void
    {
        $phpDocInfo = $this->phpDocInfoFactory->createFromNodeOrEmpty($property);
        if ($phpDocInfo->getVarTagValueNode() instanceof VarTagValueNode) {
            return;
        }
        $newType = $this->staticTypeMapper->mapPhpParserNodePHPStanType($typeNode);
        $this->phpDocTypeChanger->changeVarType($property, $phpDocInfo, $newType);
    }
}
