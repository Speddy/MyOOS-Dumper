<?php

declare (strict_types=1);
namespace Rector\Transform\ValueObject;

use PHPStan\Type\ObjectType;
use Rector\Core\Validation\RectorAssert;
final readonly class MethodCallToPropertyFetch
{
    public function __construct(/**
     * @readonly
     */
    private string $oldType, /**
     * @readonly
     */
    private string $oldMethod, /**
     * @readonly
     */
    private string $newProperty)
    {
        RectorAssert::className($oldType);
        RectorAssert::methodName($oldMethod);
        RectorAssert::propertyName($newProperty);
    }
    public function getOldObjectType() : ObjectType
    {
        return new ObjectType($this->oldType);
    }
    public function getNewProperty() : string
    {
        return $this->newProperty;
    }
    public function getOldMethod() : string
    {
        return $this->oldMethod;
    }
}
