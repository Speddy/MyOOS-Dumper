<?php

declare (strict_types=1);
namespace Rector\Php80\ValueObject;

use PhpParser\Node\Expr;
use PhpParser\Node\Expr\FuncCall;
final readonly class StrStartsWith
{
    public function __construct(
        /**
         * @readonly
         */
        private FuncCall $funcCall,
        /**
         * @readonly
         */
        private Expr $haystackExpr,
        /**
         * @readonly
         */
        private Expr $needleExpr,
        /**
         * @readonly
         */
        private bool $isPositive
    )
    {
    }
    public function getFuncCall() : FuncCall
    {
        return $this->funcCall;
    }
    public function getHaystackExpr() : Expr
    {
        return $this->haystackExpr;
    }
    public function isPositive() : bool
    {
        return $this->isPositive;
    }
    public function getNeedleExpr() : Expr
    {
        return $this->needleExpr;
    }
}
