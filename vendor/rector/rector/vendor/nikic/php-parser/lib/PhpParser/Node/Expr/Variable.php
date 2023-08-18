<?php

declare (strict_types=1);
namespace PhpParser\Node\Expr;

use PhpParser\Node\Expr;
class Variable extends Expr
{
    /**
     * Constructs a variable node.
     *
     * @param string|Expr $name       Name
     * @param array       $attributes Additional attributes
     */
    public function __construct(public $name, array $attributes = [])
    {
        $this->attributes = $attributes;
    }
    public function getSubNodeNames() : array
    {
        return ['name'];
    }
    public function getType() : string
    {
        return 'Expr_Variable';
    }
}
