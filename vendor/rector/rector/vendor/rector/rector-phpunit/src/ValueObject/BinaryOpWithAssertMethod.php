<?php

declare (strict_types=1);
namespace Rector\PHPUnit\ValueObject;

final readonly class BinaryOpWithAssertMethod
{
    public function __construct(
        /**
         * @readonly
         */
        private string $binaryOpClass,
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
    public function getBinaryOpClass() : string
    {
        return $this->binaryOpClass;
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
