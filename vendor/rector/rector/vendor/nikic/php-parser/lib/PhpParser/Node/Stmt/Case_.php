<?php

declare (strict_types=1);
namespace PhpParser\Node\Stmt;

use PhpParser\Node;
use Rector\Core\Contract\PhpParser\Node\StmtsAwareInterface;
class Case_ extends Node\Stmt implements StmtsAwareInterface
{
    /** @var Node\Stmt[] Statements */
    public $stmts;
    /**
     * Constructs a case node.
     *
     * @param null|Node\Expr $cond       Condition (null for default)
     * @param Node\Stmt[]    $stmts      Statements
     * @param array          $attributes Additional attributes
     */
    public function __construct(public $cond, array $stmts = [], array $attributes = [])
    {
        $this->attributes = $attributes;
        $this->stmts = $stmts;
    }
    public function getSubNodeNames() : array
    {
        return ['cond', 'stmts'];
    }
    public function getType() : string
    {
        return 'Stmt_Case';
    }
}
