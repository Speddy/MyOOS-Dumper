<?php

declare (strict_types=1);
namespace Rector\Php80\ValueObject;

use Rector\BetterPhpDocParser\PhpDoc\DoctrineAnnotationTagValueNode;
final readonly class NestedDoctrineTagAndAnnotationToAttribute
{
    public function __construct(
        /**
         * @readonly
         */
        private DoctrineAnnotationTagValueNode $doctrineAnnotationTagValueNode,
        /**
         * @readonly
         */
        private \Rector\Php80\ValueObject\NestedAnnotationToAttribute $nestedAnnotationToAttribute
    )
    {
    }
    public function getDoctrineAnnotationTagValueNode() : DoctrineAnnotationTagValueNode
    {
        return $this->doctrineAnnotationTagValueNode;
    }
    public function getNestedAnnotationToAttribute() : \Rector\Php80\ValueObject\NestedAnnotationToAttribute
    {
        return $this->nestedAnnotationToAttribute;
    }
}
