<?php

declare (strict_types=1);
namespace Rector\Renaming\ValueObject;

use PHPStan\Type\ObjectType;
use Rector\Core\Validation\RectorAssert;
use Rector\Renaming\Contract\RenameClassConstFetchInterface;
final readonly class RenameClassAndConstFetch implements RenameClassConstFetchInterface
{
    public function __construct(/**
     * @readonly
     */
    private string $oldClass, /**
     * @readonly
     */
    private string $oldConstant, /**
     * @readonly
     */
    private string $newClass, /**
     * @readonly
     */
    private string $newConstant)
    {
        RectorAssert::className($oldClass);
        RectorAssert::constantName($oldConstant);
        RectorAssert::className($newClass);
        RectorAssert::constantName($newConstant);
    }
    public function getOldObjectType() : ObjectType
    {
        return new ObjectType($this->oldClass);
    }
    public function getOldConstant() : string
    {
        return $this->oldConstant;
    }
    public function getNewConstant() : string
    {
        return $this->newConstant;
    }
    public function getNewClass() : string
    {
        return $this->newClass;
    }
}
