<?php

declare (strict_types=1);
namespace PHPStan\PhpDocParser\Printer;

/**
 * Inspired by https://github.com/nikic/PHP-Parser/tree/36a6dcd04e7b0285e8f0868f44bd4927802f7df1
 *
 * Copyright (c) 2011, Nikita Popov
 * All rights reserved.
 *
 * Implements the Myers diff algorithm.
 *
 * @internal
 */
class DiffElem
{
    final public const TYPE_KEEP = 0;
    final public const TYPE_REMOVE = 1;
    final public const TYPE_ADD = 2;
    final public const TYPE_REPLACE = 3;
    /** @var self::TYPE_* */
    public $type;
    /**
     * @param self::TYPE_* $type
     * @param mixed $old Is null for add operations
     * @param mixed $new Is null for remove operations
     */
    public function __construct(int $type, public mixed $old, public mixed $new)
    {
        $this->type = $type;
    }
}
