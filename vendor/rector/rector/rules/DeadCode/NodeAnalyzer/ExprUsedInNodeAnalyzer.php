<?php

declare (strict_types=1);
namespace Rector\DeadCode\NodeAnalyzer;

use PhpParser\Node;
use PhpParser\Node\Expr\FuncCall;
use PhpParser\Node\Expr\Include_;
use PhpParser\Node\Expr\Variable;
use Rector\Core\NodeAnalyzer\CompactFuncCallAnalyzer;
use Rector\Core\PhpParser\Printer\BetterStandardPrinter;
final readonly class ExprUsedInNodeAnalyzer
{
    public function __construct(
        /**
         * @readonly
         */
        private \Rector\DeadCode\NodeAnalyzer\UsedVariableNameAnalyzer $usedVariableNameAnalyzer,
        /**
         * @readonly
         */
        private CompactFuncCallAnalyzer $compactFuncCallAnalyzer,
        /**
         * @readonly
         */
        private BetterStandardPrinter $betterStandardPrinter
    )
    {
    }
    public function isUsed(Node $node, Variable $variable) : bool
    {
        if ($node instanceof Include_) {
            return \true;
        }
        // variable as variable variable need mark as used
        if ($node instanceof Variable) {
            $print = $this->betterStandardPrinter->print($node);
            if (str_starts_with($print, '${$')) {
                return \true;
            }
        }
        if ($node instanceof FuncCall) {
            return $this->compactFuncCallAnalyzer->isInCompact($node, $variable);
        }
        return $this->usedVariableNameAnalyzer->isVariableNamed($node, $variable);
    }
}
