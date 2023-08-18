<?php

namespace RectorPrefix202308\Illuminate\Contracts\Queue;

interface Monitor
{
    /**
     * Register a callback to be executed on every iteration through the queue loop.
     *
     * @return void
     */
    public function looping(mixed $callback);
    /**
     * Register a callback to be executed when a job fails after the maximum number of retries.
     *
     * @return void
     */
    public function failing(mixed $callback);
    /**
     * Register a callback to be executed when a daemon queue is stopping.
     *
     * @return void
     */
    public function stopping(mixed $callback);
}
