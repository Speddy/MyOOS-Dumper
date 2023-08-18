<?php

declare (strict_types=1);
namespace Rector\TypeDeclaration\NodeAnalyzer\ReturnTypeAnalyzer;

use PhpParser\Node\Expr\CallLike;
use PhpParser\Node\Expr\Closure;
use PhpParser\Node\Expr\Yield_;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Function_;
use PhpParser\Node\Stmt\Return_;
use Rector\Core\PhpParser\Node\BetterNodeFinder;
use Rector\TypeDeclaration\NodeAnalyzer\ReturnAnalyzer;
use Rector\TypeDeclaration\NodeAnalyzer\ReturnFilter\ExclusiveNativeCallLikeReturnMatcher;
final readonly class StrictNativeFunctionReturnTypeAnalyzer
{
    public function __construct(
        /**
         * @readonly
         */
        private BetterNodeFinder $betterNodeFinder,
        /**
         * @readonly
         */
        private ExclusiveNativeCallLikeReturnMatcher $exclusiveNativeCallLikeReturnMatcher,
        /**
         * @readonly
         */
        private ReturnAnalyzer $returnAnalyzer
    )
    {
    }
    /**
     * @return CallLike[]|null
     * @param \PhpParser\Node\Stmt\ClassMethod|\PhpParser\Node\Expr\Closure|\PhpParser\Node\Stmt\Function_ $functionLike
     */
    public function matchAlwaysReturnNativeCallLikes($functionLike) : ?array
    {
        if ($functionLike->stmts === null) {
            return null;
        }
        if ($this->betterNodeFinder->hasInstancesOfInFunctionLikeScoped($functionLike, [Yield_::class])) {
            return null;
        }
        /** @var Return_[] $returns */
        $returns = $this->betterNodeFinder->findInstancesOfInFunctionLikeScoped($functionLike, Return_::class);
        if ($returns === []) {
            return null;
        }
        // is one statement depth 3?
        if (!$this->returnAnalyzer->areExclusiveExprReturns($returns)) {
            return null;
        }
        // has root return?
        if (!$this->returnAnalyzer->hasClassMethodRootReturn($functionLike)) {
            return null;
        }
        return $this->exclusiveNativeCallLikeReturnMatcher->match($returns);
    }
}
