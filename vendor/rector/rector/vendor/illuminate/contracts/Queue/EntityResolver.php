<?php

namespace RectorPrefix202308\Illuminate\Contracts\Queue;

interface EntityResolver
{
    /**
     * Resolve the entity for the given ID.
     *
     * @param  string  $type
     * @return mixed
     */
    public function resolve($type, mixed $id);
}
