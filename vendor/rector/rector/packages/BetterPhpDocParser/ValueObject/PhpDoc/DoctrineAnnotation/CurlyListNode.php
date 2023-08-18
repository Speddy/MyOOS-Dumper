<?php

declare (strict_types=1);
namespace Rector\BetterPhpDocParser\ValueObject\PhpDoc\DoctrineAnnotation;

use Rector\BetterPhpDocParser\PhpDoc\ArrayItemNode;
use Stringable;
use RectorPrefix202308\Webmozart\Assert\Assert;
final class CurlyListNode extends \Rector\BetterPhpDocParser\ValueObject\PhpDoc\DoctrineAnnotation\AbstractValuesAwareNode implements \Stringable
{
    /**
     * @param ArrayItemNode[] $arrayItemNodes
     */
    public function __construct(/**
     * @readonly
     */
    private readonly array $arrayItemNodes = [])
    {
        Assert::allIsInstanceOf($this->arrayItemNodes, ArrayItemNode::class);
        parent::__construct($this->arrayItemNodes);
    }
    public function __toString() : string
    {
        // possibly list items
        return $this->implode($this->values);
    }
    /**
     * @param mixed[] $array
     */
    private function implode(array $array) : string
    {
        $itemContents = '';
        $lastItemKey = array_key_last($array);
        foreach ($array as $key => $value) {
            if (\is_int($key)) {
                $itemContents .= (string) $value;
            } else {
                $itemContents .= $key . '=' . $value;
            }
            if ($lastItemKey !== $key) {
                $itemContents .= ', ';
            }
        }
        return '{' . $itemContents . '}';
    }
}
