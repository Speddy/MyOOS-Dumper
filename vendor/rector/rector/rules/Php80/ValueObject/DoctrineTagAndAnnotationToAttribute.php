<?php

declare (strict_types=1);
namespace Rector\Php80\ValueObject;

use Rector\BetterPhpDocParser\PhpDoc\DoctrineAnnotationTagValueNode;
final readonly class DoctrineTagAndAnnotationToAttribute
{
    public function __construct(
        /**
         * @readonly
         */
        private DoctrineAnnotationTagValueNode $doctrineAnnotationTagValueNode,
        /**
         * @readonly
         */
        private \Rector\Php80\ValueObject\AnnotationToAttribute $annotationToAttribute
    )
    {
    }
    public function getDoctrineAnnotationTagValueNode() : DoctrineAnnotationTagValueNode
    {
        return $this->doctrineAnnotationTagValueNode;
    }
    public function getAnnotationToAttribute() : \Rector\Php80\ValueObject\AnnotationToAttribute
    {
        return $this->annotationToAttribute;
    }
}
