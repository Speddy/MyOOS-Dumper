<?php

namespace RectorPrefix202308\Illuminate\Contracts\Queue;

use InvalidArgumentException;
class EntityNotFoundException extends InvalidArgumentException
{
    /**
     * Create a new exception instance.
     *
     * @param  string  $type
     * @return void
     */
    public function __construct($type, mixed $id)
    {
        $id = (string) $id;
        parent::__construct("Queueable entity [{$type}] not found for ID [{$id}].");
    }
}
