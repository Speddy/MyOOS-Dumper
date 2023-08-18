<?php

declare (strict_types=1);
namespace Rector\Php80\ValueObject;

use PhpParser\Node\Expr;
use Rector\Php80\Enum\MatchKind;
final readonly class CondAndExpr
{
    /**
     * @param Expr[]|null $condExprs
     * @param MatchKind::* $matchKind
     */
    public function __construct(
        /**
         * @readonly
         */
        private ?array $condExprs,
        /**
         * @readonly
         */
        private Expr $expr,
        /**
         * @readonly
         */
        private string $matchKind
    )
    {
    }
    public function getExpr() : Expr
    {
        return $this->expr;
    }
    /**
     * @return Expr[]|null
     */
    public function getCondExprs() : ?array
    {
        // internally checked by PHPStan, cannot be empty array
        if ($this->condExprs === []) {
            return null;
        }
        return $this->condExprs;
    }
    /**
     * @return MatchKind::*
     */
    public function getMatchKind() : string
    {
        return $this->matchKind;
    }
    /**
     * @param MatchKind::* $matchKind
     */
    public function equalsMatchKind(string $matchKind) : bool
    {
        return $this->matchKind === $matchKind;
    }
}
