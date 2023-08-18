<?php

declare (strict_types=1);
namespace Rector\Transform\ValueObject;

use Rector\Core\Validation\RectorAssert;
final readonly class StaticCallToNew
{
    public function __construct(/**
     * @readonly
     */
    private string $class, /**
     * @readonly
     */
    private string $method)
    {
        RectorAssert::className($class);
        RectorAssert::methodName($method);
    }
    public function getClass() : string
    {
        return $this->class;
    }
    public function getMethod() : string
    {
        return $this->method;
    }
}
