<?php

declare (strict_types=1);
namespace Rector\Php70\ValueObject;

use PhpParser\Node\Expr;
final readonly class ComparedExprs
{
    public function __construct(
        /**
         * @readonly
         */
        private Expr $firstExpr,
        /**
         * @readonly
         */
        private Expr $secondExpr
    )
    {
    }
    public function getFirstExpr() : Expr
    {
        return $this->firstExpr;
    }
    public function getSecondExpr() : Expr
    {
        return $this->secondExpr;
    }
}
