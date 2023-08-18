<?php

declare (strict_types=1);
namespace Rector\Php80\NodeFactory;

use PhpParser\Node\AttributeGroup;
use PhpParser\Node\Stmt\Use_;
use Rector\Php80\ValueObject\DoctrineTagAndAnnotationToAttribute;
use Rector\PhpAttribute\NodeFactory\PhpAttributeGroupFactory;
final readonly class AttrGroupsFactory
{
    public function __construct(
        /**
         * @readonly
         */
        private PhpAttributeGroupFactory $phpAttributeGroupFactory
    )
    {
    }
    /**
     * @param DoctrineTagAndAnnotationToAttribute[] $doctrineTagAndAnnotationToAttributes
     * @param Use_[] $uses
     * @return AttributeGroup[]
     */
    public function create(array $doctrineTagAndAnnotationToAttributes, array $uses) : array
    {
        $attributeGroups = [];
        foreach ($doctrineTagAndAnnotationToAttributes as $doctrineTagAndAnnotationToAttribute) {
            $doctrineAnnotationTagValueNode = $doctrineTagAndAnnotationToAttribute->getDoctrineAnnotationTagValueNode();
            // add attributes
            $attributeGroups[] = $this->phpAttributeGroupFactory->create($doctrineAnnotationTagValueNode, $doctrineTagAndAnnotationToAttribute->getAnnotationToAttribute(), $uses);
        }
        return $attributeGroups;
    }
}
