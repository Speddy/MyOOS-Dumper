<?php

declare (strict_types=1);
namespace Rector\Php80\ValueObject;

use PhpParser\Node\Param;
use PhpParser\Node\Stmt\Expression;
use PhpParser\Node\Stmt\Property;
use Rector\NodeTypeResolver\Node\AttributeKey;
final readonly class PropertyPromotionCandidate
{
    public function __construct(
        /**
         * @readonly
         */
        private Property $property,
        /**
         * @readonly
         */
        private Param $param,
        /**
         * @readonly
         */
        private Expression $expression
    )
    {
    }
    public function getProperty() : Property
    {
        return $this->property;
    }
    public function getParam() : Param
    {
        return $this->param;
    }
    public function getStmtPosition() : int
    {
        return $this->expression->getAttribute(AttributeKey::STMT_KEY);
    }
}
