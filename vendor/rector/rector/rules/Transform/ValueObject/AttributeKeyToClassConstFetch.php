<?php

declare (strict_types=1);
namespace Rector\Transform\ValueObject;

final readonly class AttributeKeyToClassConstFetch
{
    /**
     * @param array<string, string> $valuesToConstantsMap
     */
    public function __construct(
        /**
         * @readonly
         */
        private string $attributeClass,
        /**
         * @readonly
         */
        private string $attributeKey,
        /**
         * @readonly
         */
        private string $constantClass,
        /**
         * @readonly
         */
        private array $valuesToConstantsMap
    )
    {
    }
    public function getAttributeClass() : string
    {
        return $this->attributeClass;
    }
    public function getAttributeKey() : string
    {
        return $this->attributeKey;
    }
    public function getConstantClass() : string
    {
        return $this->constantClass;
    }
    /**
     * @return array<string, string>
     */
    public function getValuesToConstantsMap() : array
    {
        return $this->valuesToConstantsMap;
    }
}
