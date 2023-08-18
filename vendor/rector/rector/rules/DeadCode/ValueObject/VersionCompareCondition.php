<?php

declare (strict_types=1);
namespace Rector\DeadCode\ValueObject;

use Rector\DeadCode\Contract\ConditionInterface;
final readonly class VersionCompareCondition implements ConditionInterface
{
    public function __construct(
        /**
         * @readonly
         */
        private int $firstVersion,
        /**
         * @readonly
         */
        private int $secondVersion,
        /**
         * @readonly
         */
        private ?string $compareSign
    )
    {
    }
    public function getFirstVersion() : int
    {
        return $this->firstVersion;
    }
    public function getSecondVersion() : int
    {
        return $this->secondVersion;
    }
    public function getCompareSign() : ?string
    {
        return $this->compareSign;
    }
}
