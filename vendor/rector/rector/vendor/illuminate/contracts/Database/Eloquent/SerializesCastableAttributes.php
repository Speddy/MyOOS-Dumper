<?php

namespace RectorPrefix202308\Illuminate\Contracts\Database\Eloquent;

use RectorPrefix202308\Illuminate\Database\Eloquent\Model;
interface SerializesCastableAttributes
{
    /**
     * Serialize the attribute when converting the model to an array.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return mixed
     */
    public function serialize(Model $model, string $key, mixed $value, array $attributes);
}
