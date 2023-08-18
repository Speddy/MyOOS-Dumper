<?php

/*
 * This file is part of composer/pcre.
 *
 * (c) Composer <https://github.com/composer>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */
namespace RectorPrefix202308\Composer\Pcre;

final class ReplaceResult
{
    /**
     * @readonly
     * @var bool
     */
    public $matched;
    /**
     * @param 0|positive-int $count
     */
    public function __construct(public int $count, /**
     * @readonly
     */
    public string $result)
    {
        $this->matched = (bool) $count;
    }
}
