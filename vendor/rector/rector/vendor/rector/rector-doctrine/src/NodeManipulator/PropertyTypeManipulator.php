<?php

declare (strict_types=1);
namespace Rector\Doctrine\NodeManipulator;

use PhpParser\Node\Stmt\Property;
use Rector\BetterPhpDocParser\PhpDocInfo\PhpDocInfoFactory;
use Rector\NodeTypeResolver\Node\AttributeKey;
use Rector\NodeTypeResolver\PhpDoc\NodeAnalyzer\DocBlockClassRenamer;
use Rector\NodeTypeResolver\ValueObject\OldToNewType;
use Rector\StaticTypeMapper\ValueObject\Type\FullyQualifiedObjectType;
final readonly class PropertyTypeManipulator
{
    public function __construct(
        /**
         * @readonly
         */
        private DocBlockClassRenamer $docBlockClassRenamer,
        /**
         * @readonly
         */
        private PhpDocInfoFactory $phpDocInfoFactory
    )
    {
    }
    public function changePropertyType(Property $property, string $oldClass, string $newClass) : void
    {
        $phpDocInfo = $this->phpDocInfoFactory->createFromNodeOrEmpty($property);
        $oldToNewTypes = [new OldToNewType(new FullyQualifiedObjectType($oldClass), new FullyQualifiedObjectType($newClass))];
        $this->docBlockClassRenamer->renamePhpDocType($phpDocInfo, $oldToNewTypes);
        if ($phpDocInfo->hasChanged()) {
            // invoke phpdoc reprint
            $property->setAttribute(AttributeKey::ORIGINAL_NODE, null);
        }
    }
}
