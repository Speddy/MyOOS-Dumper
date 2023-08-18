<?php

declare (strict_types=1);
namespace PHPStan\PhpDocParser\Ast;

use function array_key_exists;
trait NodeAttributes
{
    /** @var array<string, mixed> */
    private $attributes = [];
    public function setAttribute(string $key, mixed $value) : void
    {
        $this->attributes[$key] = $value;
    }
    public function hasAttribute(string $key) : bool
    {
        return array_key_exists($key, $this->attributes);
    }
    /**
     * @return mixed
     */
    public function getAttribute(string $key)
    {
        if ($this->hasAttribute($key)) {
            return $this->attributes[$key];
        }
        return null;
    }
}
