<?php

declare (strict_types=1);
namespace Rector\Transform\ValueObject;

use PHPStan\Type\ObjectType;
use Rector\Core\Validation\RectorAssert;
final readonly class FuncCallToMethodCall
{
    public function __construct(/**
     * @readonly
     */
    private string $oldFuncName, /**
     * @readonly
     */
    private string $newClassName, /**
     * @readonly
     */
    private string $newMethodName)
    {
        RectorAssert::functionName($oldFuncName);
        RectorAssert::className($newClassName);
        RectorAssert::methodName($newMethodName);
    }
    public function getOldFuncName() : string
    {
        return $this->oldFuncName;
    }
    public function getNewObjectType() : ObjectType
    {
        return new ObjectType($this->newClassName);
    }
    public function getNewMethodName() : string
    {
        return $this->newMethodName;
    }
}
