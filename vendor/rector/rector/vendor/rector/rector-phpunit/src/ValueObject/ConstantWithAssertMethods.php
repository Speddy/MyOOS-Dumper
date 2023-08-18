<?php

declare (strict_types=1);
namespace Rector\PHPUnit\ValueObject;

final readonly class ConstantWithAssertMethods
{
    public function __construct(
        /**
         * @readonly
         */
        private string $constant,
        /**
         * @readonly
         */
        private string $assetMethodName,
        /**
         * @readonly
         */
        private string $notAssertMethodName
    )
    {
    }
    public function getConstant() : string
    {
        return $this->constant;
    }
    public function getAssetMethodName() : string
    {
        return $this->assetMethodName;
    }
    public function getNotAssertMethodName() : string
    {
        return $this->notAssertMethodName;
    }
}
