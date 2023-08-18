<?php

declare (strict_types=1);
namespace Rector\Transform\ValueObject;

use PHPStan\Type\ObjectType;
use Rector\Core\Validation\RectorAssert;
final readonly class WrapReturn
{
    public function __construct(/**
     * @readonly
     */
    private string $type, /**
     * @readonly
     */
    private string $method, /**
     * @readonly
     */
    private bool $isArrayWrap)
    {
        RectorAssert::className($type);
    }
    public function getObjectType() : ObjectType
    {
        return new ObjectType($this->type);
    }
    public function getMethod() : string
    {
        return $this->method;
    }
    public function isArrayWrap() : bool
    {
        return $this->isArrayWrap;
    }
}
