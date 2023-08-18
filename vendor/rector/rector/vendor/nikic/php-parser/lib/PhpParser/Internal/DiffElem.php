<?php

declare (strict_types=1);
namespace PhpParser\Internal;

/**
 * @internal
 */
class DiffElem
{
    final public const TYPE_KEEP = 0;
    final public const TYPE_REMOVE = 1;
    final public const TYPE_ADD = 2;
    final public const TYPE_REPLACE = 3;
    /** @var int One of the TYPE_* constants */
    public $type;
    public function __construct(int $type, /** @var mixed Is null for add operations */
    public mixed $old, /** @var mixed Is null for remove operations */
    public mixed $new)
    {
        $this->type = $type;
    }
}
