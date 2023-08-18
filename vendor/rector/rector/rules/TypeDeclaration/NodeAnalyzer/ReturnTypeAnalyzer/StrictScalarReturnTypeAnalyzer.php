<?php

declare (strict_types=1);
namespace Rector\TypeDeclaration\NodeAnalyzer\ReturnTypeAnalyzer;

use PhpParser\Node\Expr;
use PhpParser\Node\Expr\Closure;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Function_;
use PHPStan\Analyser\Scope;
use PHPStan\Type\Type;
use Rector\NodeTypeResolver\PHPStan\Type\TypeFactory;
use Rector\TypeDeclaration\TypeAnalyzer\AlwaysStrictScalarExprAnalyzer;
final readonly class StrictScalarReturnTypeAnalyzer
{
    public function __construct(
        /**
         * @readonly
         */
        private \Rector\TypeDeclaration\NodeAnalyzer\ReturnTypeAnalyzer\AlwaysStrictReturnAnalyzer $alwaysStrictReturnAnalyzer,
        /**
         * @readonly
         */
        private AlwaysStrictScalarExprAnalyzer $alwaysStrictScalarExprAnalyzer,
        /**
         * @readonly
         */
        private TypeFactory $typeFactory
    )
    {
    }
    /**
     * @param \PhpParser\Node\Stmt\ClassMethod|\PhpParser\Node\Expr\Closure|\PhpParser\Node\Stmt\Function_ $functionLike
     */
    public function matchAlwaysScalarReturnType($functionLike, Scope $scope) : ?Type
    {
        $returns = $this->alwaysStrictReturnAnalyzer->matchAlwaysStrictReturns($functionLike);
        if ($returns === null) {
            return null;
        }
        $scalarTypes = [];
        foreach ($returns as $return) {
            // we need exact expr return
            if (!$return->expr instanceof Expr) {
                return null;
            }
            $scalarType = $this->alwaysStrictScalarExprAnalyzer->matchStrictScalarExpr($return->expr, $scope);
            if (!$scalarType instanceof Type) {
                return null;
            }
            $scalarTypes[] = $scalarType;
        }
        return $this->typeFactory->createMixedPassedOrUnionType($scalarTypes);
    }
}
