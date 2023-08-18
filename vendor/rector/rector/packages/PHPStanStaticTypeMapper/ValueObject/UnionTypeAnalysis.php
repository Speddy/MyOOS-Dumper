<?php

declare (strict_types=1);
namespace Rector\PHPStanStaticTypeMapper\ValueObject;

final readonly class UnionTypeAnalysis
{
    public function __construct(
        /**
         * @readonly
         */
        private bool $isNullableType,
        /**
         * @readonly
         */
        private bool $hasIterable,
        /**
         * @readonly
         */
        private bool $hasArray
    )
    {
    }
    public function isNullableType() : bool
    {
        return $this->isNullableType;
    }
    public function hasIterable() : bool
    {
        return $this->hasIterable;
    }
    public function hasArray() : bool
    {
        return $this->hasArray;
    }
}
