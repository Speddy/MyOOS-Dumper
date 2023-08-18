<?php

namespace RectorPrefix202308\Illuminate\Contracts\Pipeline;

interface Hub
{
    /**
     * Send an object through one of the available pipelines.
     *
     * @param  string|null  $pipeline
     * @return mixed
     */
    public function pipe(mixed $object, $pipeline = null);
}
