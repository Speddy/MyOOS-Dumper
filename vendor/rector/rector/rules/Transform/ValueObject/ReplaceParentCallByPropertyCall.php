<?php

declare (strict_types=1);
namespace Rector\Transform\ValueObject;

use PHPStan\Type\ObjectType;
use Rector\Core\Validation\RectorAssert;
final readonly class ReplaceParentCallByPropertyCall
{
    public function __construct(/**
     * @readonly
     */
    private string $class, /**
     * @readonly
     */
    private string $method, /**
     * @readonly
     */
    private string $property)
    {
        RectorAssert::className($class);
        RectorAssert::methodName($method);
        RectorAssert::propertyName($property);
    }
    public function getObjectType() : ObjectType
    {
        return new ObjectType($this->class);
    }
    public function getMethod() : string
    {
        return $this->method;
    }
    public function getProperty() : string
    {
        return $this->property;
    }
}
