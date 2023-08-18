<?php

declare (strict_types=1);
namespace PhpParser\Node\Expr;

use PhpParser\Node\Expr;
class Ternary extends Expr
{
    /** @var Expr Condition */
    public $cond;
    /** @var Expr Expression for false */
    public $else;
    /**
     * Constructs a ternary operator node.
     *
     * @param Expr      $cond       Condition
     * @param null|Expr $if         Expression for true
     * @param Expr      $else       Expression for false
     * @param array                    $attributes Additional attributes
     */
    public function __construct(Expr $cond, public $if, Expr $else, array $attributes = [])
    {
        $this->attributes = $attributes;
        $this->cond = $cond;
        $this->else = $else;
    }
    public function getSubNodeNames() : array
    {
        return ['cond', 'if', 'else'];
    }
    public function getType() : string
    {
        return 'Expr_Ternary';
    }
}
