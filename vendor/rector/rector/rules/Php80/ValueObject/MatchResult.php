<?php

declare (strict_types=1);
namespace Rector\Php80\ValueObject;

use PhpParser\Node\Expr\Match_;
final readonly class MatchResult
{
    public function __construct(
        /**
         * @readonly
         */
        private Match_ $match,
        /**
         * @readonly
         */
        private bool $shouldRemoveNextStmt
    )
    {
    }
    public function getMatch() : Match_
    {
        return $this->match;
    }
    public function shouldRemoveNextStmt() : bool
    {
        return $this->shouldRemoveNextStmt;
    }
}
