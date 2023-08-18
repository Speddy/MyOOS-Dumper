<?php

declare (strict_types=1);
namespace Rector\Php80\ValueObject;

use Rector\Core\Validation\RectorAssert;
use Rector\Php80\Contract\ValueObject\AnnotationToAttributeInterface;
final readonly class AnnotationToAttribute implements AnnotationToAttributeInterface
{
    public function __construct(/**
     * @readonly
     */
    private string $tag, /**
     * @readonly
     */
    private ?string $attributeClass = null)
    {
        RectorAssert::className($tag);
        if (\is_string($attributeClass)) {
            RectorAssert::className($attributeClass);
        }
    }
    public function getTag() : string
    {
        return $this->tag;
    }
    public function getAttributeClass() : string
    {
        if ($this->attributeClass === null) {
            return $this->tag;
        }
        return $this->attributeClass;
    }
}
