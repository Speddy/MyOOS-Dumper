<?php

declare (strict_types=1);
namespace Rector\Symfony\ValueObject;

use PhpParser\Node\Expr;
final readonly class ReplaceServiceArgument
{
    public function __construct(
        private mixed $oldValue,
        /**
         * @readonly
         */
        private Expr $newValueExpr
    )
    {
    }
    /**
     * @return mixed
     */
    public function getOldValue()
    {
        return $this->oldValue;
    }
    public function getNewValueExpr() : Expr
    {
        return $this->newValueExpr;
    }
}
