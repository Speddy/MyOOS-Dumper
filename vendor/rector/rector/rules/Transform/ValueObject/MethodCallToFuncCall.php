<?php

declare (strict_types=1);
namespace Rector\Transform\ValueObject;

final readonly class MethodCallToFuncCall
{
    public function __construct(
        /**
         * @readonly
         */
        private string $objectType,
        /**
         * @readonly
         */
        private string $methodName,
        /**
         * @readonly
         */
        private string $functionName
    )
    {
    }
    public function getObjectType() : string
    {
        return $this->objectType;
    }
    public function getMethodName() : string
    {
        return $this->methodName;
    }
    public function getFunctionName() : string
    {
        return $this->functionName;
    }
}
