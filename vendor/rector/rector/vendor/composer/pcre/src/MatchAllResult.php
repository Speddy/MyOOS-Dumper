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

final class MatchAllResult
{
    /**
     * @readonly
     * @var 0|positive-int
     */
    public $count;
    /**
     * @readonly
     * @var bool
     */
    public $matched;
    /**
     * @param 0|positive-int $count
     * @param array<int|string, array<string|null>> $matches
     */
    public function __construct(int $count, /**
     * An array of match group => list of matched strings
     *
     * @readonly
     */
    public array $matches)
    {
        $this->matched = (bool) $count;
        $this->count = $count;
    }
}
