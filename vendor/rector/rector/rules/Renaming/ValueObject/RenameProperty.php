<?php

declare (strict_types=1);
namespace Rector\Renaming\ValueObject;

use PHPStan\Type\ObjectType;
use Rector\Core\Validation\RectorAssert;
final readonly class RenameProperty
{
    public function __construct(/**
     * @readonly
     */
    private string $type, /**
     * @readonly
     */
    private string $oldProperty, /**
     * @readonly
     */
    private string $newProperty)
    {
        RectorAssert::className($type);
        RectorAssert::propertyName($oldProperty);
        RectorAssert::propertyName($newProperty);
    }
    public function getObjectType() : ObjectType
    {
        return new ObjectType($this->type);
    }
    public function getOldProperty() : string
    {
        return $this->oldProperty;
    }
    public function getNewProperty() : string
    {
        return $this->newProperty;
    }
}
