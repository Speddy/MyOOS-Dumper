<?php

namespace RectorPrefix202308\Illuminate\Contracts\Config;

interface Repository
{
    /**
     * Determine if the given configuration value exists.
     *
     * @param  string  $key
     * @return bool
     */
    public function has($key);
    /**
     * Get the specified configuration value.
     *
     * @param  array|string  $key
     * @return mixed
     */
    public function get($key, mixed $default = null);
    /**
     * Get all of the configuration items for the application.
     *
     * @return array
     */
    public function all();
    /**
     * Set a given configuration value.
     *
     * @param  array|string  $key
     * @return void
     */
    public function set($key, mixed $value = null);
    /**
     * Prepend a value onto an array configuration value.
     *
     * @param  string  $key
     * @return void
     */
    public function prepend($key, mixed $value);
    /**
     * Push a value onto an array configuration value.
     *
     * @param  string  $key
     * @return void
     */
    public function push($key, mixed $value);
}
