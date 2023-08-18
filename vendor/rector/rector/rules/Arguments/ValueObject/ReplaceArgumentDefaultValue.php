<?php

declare (strict_types=1);
namespace Rector\Arguments\ValueObject;

use PHPStan\Type\ObjectType;
use Rector\Arguments\Contract\ReplaceArgumentDefaultValueInterface;
use Rector\Core\Validation\RectorAssert;
final readonly class ReplaceArgumentDefaultValue implements ReplaceArgumentDefaultValueInterface
{
    /**
     * @var string
     */
    public const ANY_VALUE_BEFORE = '*ANY_VALUE_BEFORE*';
    /**
     * @param int<0, max> $position
     */
    public function __construct(/**
     * @readonly
     */
    private string $class, /**
     * @readonly
     */
    private string $method, /**
     * @readonly
     */
    private int $position, private mixed $valueBefore, private mixed $valueAfter)
    {
        RectorAssert::className($class);
    }
    public function getObjectType() : ObjectType
    {
        return new ObjectType($this->class);
    }
    public function getMethod() : string
    {
        return $this->method;
    }
    public function getPosition() : int
    {
        return $this->position;
    }
    /**
     * @return mixed
     */
    public function getValueBefore()
    {
        return $this->valueBefore;
    }
    /**
     * @return mixed
     */
    public function getValueAfter()
    {
        return $this->valueAfter;
    }
}
