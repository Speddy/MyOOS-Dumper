<?php

declare (strict_types=1);
namespace RectorPrefix202308\Doctrine\Inflector\Rules;

class Word
{
    public function __construct(private readonly string $word)
    {
    }
    public function getWord() : string
    {
        return $this->word;
    }
}
