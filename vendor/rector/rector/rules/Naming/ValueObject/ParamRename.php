<?php

declare (strict_types=1);
namespace Rector\Naming\ValueObject;

use PhpParser\Node\Expr\Variable;
use PhpParser\Node\FunctionLike;
use PhpParser\Node\Param;
use Rector\Naming\Contract\RenameParamValueObjectInterface;
final readonly class ParamRename implements RenameParamValueObjectInterface
{
    public function __construct(
        /**
         * @readonly
         */
        private string $currentName,
        /**
         * @readonly
         */
        private string $expectedName,
        /**
         * @readonly
         */
        private Param $param,
        /**
         * @readonly
         */
        private Variable $variable,
        /**
         * @readonly
         */
        private FunctionLike $functionLike
    )
    {
    }
    public function getCurrentName() : string
    {
        return $this->currentName;
    }
    public function getExpectedName() : string
    {
        return $this->expectedName;
    }
    public function getFunctionLike() : FunctionLike
    {
        return $this->functionLike;
    }
    public function getParam() : Param
    {
        return $this->param;
    }
    public function getVariable() : Variable
    {
        return $this->variable;
    }
}
