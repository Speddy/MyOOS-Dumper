<?php

declare (strict_types=1);
namespace Rector\DeadCode\ValueObject;

use PhpParser\Node\Expr\PropertyFetch;
use PhpParser\Node\Expr\Variable;
final readonly class VariableAndPropertyFetchAssign
{
    public function __construct(
        /**
         * @readonly
         */
        private Variable $variable,
        /**
         * @readonly
         */
        private PropertyFetch $propertyFetch
    )
    {
    }
    public function getVariable() : Variable
    {
        return $this->variable;
    }
    public function getPropertyFetch() : PropertyFetch
    {
        return $this->propertyFetch;
    }
}
