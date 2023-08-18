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

final class MatchAllWithOffsetsResult
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
     * @param array<int|string, list<array{string|null, int}>> $matches
     * @phpstan-param array<int|string, list<array{string|null, int<-1, max>}>> $matches
     */
    public function __construct(int $count, /**
     * An array of match group => list of matches, every match being a pair of string matched + offset in bytes (or -1 if no match)
     *
     * @readonly
     * @phpstan-var
     */
    public array $matches)
    {
        $this->matched = (bool) $count;
        $this->count = $count;
    }
}
