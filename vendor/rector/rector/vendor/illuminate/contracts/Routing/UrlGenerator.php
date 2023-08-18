<?php

namespace RectorPrefix202308\Illuminate\Contracts\Routing;

interface UrlGenerator
{
    /**
     * Get the current URL for the request.
     *
     * @return string
     */
    public function current();
    /**
     * Get the URL for the previous request.
     *
     * @return string
     */
    public function previous(mixed $fallback = \false);
    /**
     * Generate an absolute URL to the given path.
     *
     * @param  string  $path
     * @param  bool|null  $secure
     * @return string
     */
    public function to($path, mixed $extra = [], $secure = null);
    /**
     * Generate a secure, absolute URL to the given path.
     *
     * @param  string  $path
     * @param  array  $parameters
     * @return string
     */
    public function secure($path, $parameters = []);
    /**
     * Generate the URL to an application asset.
     *
     * @param  string  $path
     * @param  bool|null  $secure
     * @return string
     */
    public function asset($path, $secure = null);
    /**
     * Get the URL to a named route.
     *
     * @param  string  $name
     * @param  bool  $absolute
     * @return string
     *
     * @throws \InvalidArgumentException
     */
    public function route($name, mixed $parameters = [], $absolute = \true);
    /**
     * Get the URL to a controller action.
     *
     * @param  string|array  $action
     * @param  bool  $absolute
     * @return string
     */
    public function action($action, mixed $parameters = [], $absolute = \true);
    /**
     * Get the root controller namespace.
     *
     * @return string
     */
    public function getRootControllerNamespace();
    /**
     * Set the root controller namespace.
     *
     * @param  string  $rootNamespace
     * @return $this
     */
    public function setRootControllerNamespace($rootNamespace);
}
