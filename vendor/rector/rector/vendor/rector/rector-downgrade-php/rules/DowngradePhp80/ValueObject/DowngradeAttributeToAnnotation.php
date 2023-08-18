<?php

declare (strict_types=1);
namespace Rector\DowngradePhp80\ValueObject;

final readonly class DowngradeAttributeToAnnotation
{
    /**
     * @param class-string $attributeClass
     * @param class-string|string|null $tag
     */
    public function __construct(
        /**
         * @readonly
         */
        private string $attributeClass,
        /**
         * @readonly
         */
        private ?string $tag = null
    )
    {
    }
    public function getAttributeClass() : string
    {
        return $this->attributeClass;
    }
    public function getTag() : string
    {
        if ($this->tag === null) {
            return $this->attributeClass;
        }
        return $this->tag;
    }
}
