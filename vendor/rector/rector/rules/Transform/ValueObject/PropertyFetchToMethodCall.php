<?php

declare (strict_types=1);
namespace Rector\Transform\ValueObject;

use PHPStan\Type\ObjectType;
use Rector\Core\Validation\RectorAssert;
final readonly class PropertyFetchToMethodCall
{
    /**
     * @param mixed[] $newGetArguments
     */
    public function __construct(/**
     * @readonly
     */
    private string $oldType, /**
     * @readonly
     */
    private string $oldProperty, /**
     * @readonly
     */
    private string $newGetMethod, /**
     * @readonly
     */
    private ?string $newSetMethod = null, /**
     * @readonly
     */
    private array $newGetArguments = [])
    {
        RectorAssert::className($oldType);
        RectorAssert::propertyName($oldProperty);
        RectorAssert::methodName($newGetMethod);
        if (\is_string($newSetMethod)) {
            RectorAssert::methodName($newSetMethod);
        }
    }
    public function getOldObjectType() : ObjectType
    {
        return new ObjectType($this->oldType);
    }
    public function getOldProperty() : string
    {
        return $this->oldProperty;
    }
    public function getNewGetMethod() : string
    {
        return $this->newGetMethod;
    }
    public function getNewSetMethod() : ?string
    {
        return $this->newSetMethod;
    }
    /**
     * @return mixed[]
     */
    public function getNewGetArguments() : array
    {
        return $this->newGetArguments;
    }
}
