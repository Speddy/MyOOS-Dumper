<?php

declare (strict_types=1);
namespace Rector\Transform\ValueObject;

use PHPStan\Type\ObjectType;
use Rector\Core\Validation\RectorAssert;
final readonly class MethodCallToStaticCall
{
    public function __construct(/**
     * @readonly
     */
    private string $oldClass, /**
     * @readonly
     */
    private string $oldMethod, /**
     * @readonly
     */
    private string $newClass, /**
     * @readonly
     */
    private string $newMethod)
    {
        RectorAssert::className($oldClass);
        RectorAssert::className($oldMethod);
        RectorAssert::className($newClass);
        RectorAssert::className($newMethod);
    }
    public function getOldObjectType() : ObjectType
    {
        return new ObjectType($this->oldClass);
    }
    public function getOldMethod() : string
    {
        return $this->oldMethod;
    }
    public function getNewClass() : string
    {
        return $this->newClass;
    }
    public function getNewMethod() : string
    {
        return $this->newMethod;
    }
}
