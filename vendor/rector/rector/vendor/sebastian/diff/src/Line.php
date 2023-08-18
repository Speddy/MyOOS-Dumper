<?php

declare (strict_types=1);
/*
 * This file is part of sebastian/diff.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace RectorPrefix202308\SebastianBergmann\Diff;

final readonly class Line
{
    public const ADDED = 1;
    public const REMOVED = 2;
    public const UNCHANGED = 3;
    public function __construct(private int $type = self::UNCHANGED, private string $content = '')
    {
    }
    public function getContent() : string
    {
        return $this->content;
    }
    public function getType() : int
    {
        return $this->type;
    }
}
