<?php

declare (strict_types=1);
namespace Rector\Php80\ValueObject;

use Rector\Core\Validation\RectorAssert;
final class AnnotationPropertyToAttributeClass
{
    /**
     * @param string|int|null $annotationProperty
     */
    public function __construct(/**
     * @readonly
     */
    private readonly string $attributeClass, private $annotationProperty = null, /**
     * @readonly
     */
    private readonly bool $doesNeedNewImport = \false)
    {
        RectorAssert::className($attributeClass);
    }
    /**
     * @return string|int|null
     */
    public function getAnnotationProperty()
    {
        return $this->annotationProperty;
    }
    public function getAttributeClass() : string
    {
        return $this->attributeClass;
    }
    public function doesNeedNewImport() : bool
    {
        return $this->doesNeedNewImport;
    }
}
