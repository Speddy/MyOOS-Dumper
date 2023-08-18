<?php

declare (strict_types=1);
namespace PhpParser\Node\Stmt;

use PhpParser\Node;
use Rector\Core\Contract\PhpParser\Node\StmtsAwareInterface;
class Namespace_ extends Node\Stmt implements StmtsAwareInterface
{
    /* For use in the "kind" attribute */
    final public const KIND_SEMICOLON = 1;
    final public const KIND_BRACED = 2;
    /** @var null|Node\Name Name */
    public $name;
    /**
     * Constructs a namespace node.
     *
     * @param null|Node\Name   $name       Name
     * @param null|Node\Stmt[] $stmts      Statements
     * @param array            $attributes Additional attributes
     */
    public function __construct(Node\Name $name = null, public $stmts = [], array $attributes = [])
    {
        $this->attributes = $attributes;
        $this->name = $name;
    }
    public function getSubNodeNames() : array
    {
        return ['name', 'stmts'];
    }
    public function getType() : string
    {
        return 'Stmt_Namespace';
    }
}
