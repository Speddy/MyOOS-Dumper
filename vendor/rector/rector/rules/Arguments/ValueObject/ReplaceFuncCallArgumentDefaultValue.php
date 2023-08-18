<?php

declare (strict_types=1);
namespace Rector\Arguments\ValueObject;

use Rector\Arguments\Contract\ReplaceArgumentDefaultValueInterface;
final readonly class ReplaceFuncCallArgumentDefaultValue implements ReplaceArgumentDefaultValueInterface
{
    public function __construct(
        /**
         * @readonly
         */
        private string $function,
        /**
         * @readonly
         */
        private int $position,
        private mixed $valueBefore,
        private mixed $valueAfter
    )
    {
    }
    public function getFunction() : string
    {
        return $this->function;
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
