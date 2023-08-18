<?php

declare(strict_types=1);

namespace League\Flysystem;

use RuntimeException;

/**
 * @internal
 */
trait ProxyArrayAccessToProperties
{
    private function formatPropertyName(string $offset): string
    {
        return str_replace('_', '', lcfirst(ucwords($offset, '_')));
    }

    /**
     *
     * @return bool
     */
    public function offsetExists(mixed $offset): bool
    {
        $property = $this->formatPropertyName((string) $offset);

        return isset($this->{$property});
    }

    /**
     *
     * @return mixed
     */
    #[\ReturnTypeWillChange]
    public function offsetGet(mixed $offset)
    {
        $property = $this->formatPropertyName((string) $offset);

        return $this->{$property};
    }

    #[\ReturnTypeWillChange]
    public function offsetSet(mixed $offset, mixed $value): never
    {
        throw new RuntimeException('Properties can not be manipulated');
    }

    #[\ReturnTypeWillChange]
    public function offsetUnset(mixed $offset): never
    {
        throw new RuntimeException('Properties can not be manipulated');
    }
}
