<?php

declare (strict_types=1);
namespace Rector\Arguments\ValueObject;

final readonly class SwapFuncCallArguments
{
    /**
     * @param array<int, int> $order
     */
    public function __construct(
        /**
         * @readonly
         */
        private string $function,
        /**
         * @readonly
         */
        private array $order
    )
    {
    }
    public function getFunction() : string
    {
        return $this->function;
    }
    /**
     * @return array<int, int>
     */
    public function getOrder() : array
    {
        return $this->order;
    }
}
