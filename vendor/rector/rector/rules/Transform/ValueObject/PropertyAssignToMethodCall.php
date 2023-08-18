<?php

declare (strict_types=1);
namespace Rector\Transform\ValueObject;

use PHPStan\Type\ObjectType;
use Rector\Core\Validation\RectorAssert;
final readonly class PropertyAssignToMethodCall
{
    public function __construct(/**
     * @readonly
     */
    private string $class, /**
     * @readonly
     */
    private string $oldPropertyName, /**
     * @readonly
     */
    private string $newMethodName)
    {
        RectorAssert::className($class);
        RectorAssert::propertyName($oldPropertyName);
        RectorAssert::methodName($newMethodName);
    }
    public function getObjectType() : ObjectType
    {
        return new ObjectType($this->class);
    }
    public function getOldPropertyName() : string
    {
        return $this->oldPropertyName;
    }
    public function getNewMethodName() : string
    {
        return $this->newMethodName;
    }
}
