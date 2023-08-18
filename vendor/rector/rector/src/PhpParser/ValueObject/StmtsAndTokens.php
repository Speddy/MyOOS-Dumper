<?php

declare (strict_types=1);
namespace Rector\Core\PhpParser\ValueObject;

use PhpParser\Node\Stmt;
final readonly class StmtsAndTokens
{
    /**
     * @param Stmt[] $stmts
     * @param mixed[] $tokens
     */
    public function __construct(
        /**
         * @readonly
         */
        private array $stmts,
        /**
         * @readonly
         */
        private array $tokens
    )
    {
    }
    /**
     * @return Stmt[]
     */
    public function getStmts() : array
    {
        return $this->stmts;
    }
    /**
     * @return mixed[]
     */
    public function getTokens() : array
    {
        return $this->tokens;
    }
}
