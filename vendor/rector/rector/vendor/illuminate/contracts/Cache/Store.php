<?php

namespace RectorPrefix202308\Illuminate\Contracts\Cache;

interface Store
{
    /**
     * Retrieve an item from the cache by key.
     *
     * @param  string|array  $key
     * @return mixed
     */
    public function get($key);
    /**
     * Retrieve multiple items from the cache by key.
     *
     * Items not found in the cache will have a null value.
     *
     * @return array
     */
    public function many(array $keys);
    /**
     * Store an item in the cache for a given number of seconds.
     *
     * @param  string  $key
     * @param  int  $seconds
     * @return bool
     */
    public function put($key, mixed $value, $seconds);
    /**
     * Store multiple items in the cache for a given number of seconds.
     *
     * @param  int  $seconds
     * @return bool
     */
    public function putMany(array $values, $seconds);
    /**
     * Increment the value of an item in the cache.
     *
     * @param  string  $key
     * @return int|bool
     */
    public function increment($key, mixed $value = 1);
    /**
     * Decrement the value of an item in the cache.
     *
     * @param  string  $key
     * @return int|bool
     */
    public function decrement($key, mixed $value = 1);
    /**
     * Store an item in the cache indefinitely.
     *
     * @param  string  $key
     * @return bool
     */
    public function forever($key, mixed $value);
    /**
     * Remove an item from the cache.
     *
     * @param  string  $key
     * @return bool
     */
    public function forget($key);
    /**
     * Remove all items from the cache.
     *
     * @return bool
     */
    public function flush();
    /**
     * Get the cache key prefix.
     *
     * @return string
     */
    public function getPrefix();
}
