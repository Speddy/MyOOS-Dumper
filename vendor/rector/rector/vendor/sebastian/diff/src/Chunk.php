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

final class Chunk
{
    /**
     * @param mixed[] $lines
     */
    public function __construct(private readonly int $start = 0, private readonly int $startRange = 1, private readonly int $end = 0, private readonly int $endRange = 1, private array $lines = [])
    {
    }
    public function getStart() : int
    {
        return $this->start;
    }
    public function getStartRange() : int
    {
        return $this->startRange;
    }
    public function getEnd() : int
    {
        return $this->end;
    }
    public function getEndRange() : int
    {
        return $this->endRange;
    }
    /**
     * @psalm-return list<Line>
     */
    public function getLines() : array
    {
        return $this->lines;
    }
    /**
     * @psalm-param list<Line> $lines
     */
    public function setLines(array $lines) : void
    {
        foreach ($lines as $line) {
            if (!$line instanceof Line) {
                throw new InvalidArgumentException();
            }
        }
        $this->lines = $lines;
    }
}
