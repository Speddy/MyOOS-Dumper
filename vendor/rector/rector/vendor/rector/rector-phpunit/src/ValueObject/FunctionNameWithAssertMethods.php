<?php

declare (strict_types=1);
namespace Rector\PHPUnit\ValueObject;

final readonly class FunctionNameWithAssertMethods
{
    public function __construct(
        /**
         * @readonly
         */
        private string $functionName,
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
    public function getFunctionName() : string
    {
        return $this->functionName;
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
