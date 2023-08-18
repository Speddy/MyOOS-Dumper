<?php

namespace RectorPrefix202308\Illuminate\Contracts\Database\Eloquent;

interface DeviatesCastableAttributes
{
    /**
     * Increment the attribute.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return mixed
     */
    public function increment($model, string $key, mixed $value, array $attributes);
    /**
     * Decrement the attribute.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return mixed
     */
    public function decrement($model, string $key, mixed $value, array $attributes);
}
