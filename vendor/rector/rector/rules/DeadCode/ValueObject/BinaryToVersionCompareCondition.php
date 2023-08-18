<?php

declare (strict_types=1);
namespace Rector\DeadCode\ValueObject;

use Rector\DeadCode\Contract\ConditionInterface;
final readonly class BinaryToVersionCompareCondition implements ConditionInterface
{
    public function __construct(
        /**
         * @readonly
         */
        private \Rector\DeadCode\ValueObject\VersionCompareCondition $versionCompareCondition,
        /**
         * @readonly
         */
        private string $binaryClass,
        private mixed $expectedValue
    )
    {
    }
    public function getVersionCompareCondition() : \Rector\DeadCode\ValueObject\VersionCompareCondition
    {
        return $this->versionCompareCondition;
    }
    public function getBinaryClass() : string
    {
        return $this->binaryClass;
    }
    /**
     * @return mixed
     */
    public function getExpectedValue()
    {
        return $this->expectedValue;
    }
}
