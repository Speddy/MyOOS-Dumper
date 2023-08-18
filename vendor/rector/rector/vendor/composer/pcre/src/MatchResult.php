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

final class MatchResult
{
    /**
     * @readonly
     * @var bool
     */
    public $matched;
    /**
     * @param 0|positive-int $count
     * @param array<string|null> $matches
     */
    public function __construct(int $count, /**
     * An array of match group => string matched
     *
     * @readonly
     */
    public array $matches)
    {
        $this->matched = (bool) $count;
    }
}
