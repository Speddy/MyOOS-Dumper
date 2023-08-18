<?php

namespace RectorPrefix202308\Illuminate\Contracts\Database\Eloquent;

use RectorPrefix202308\Illuminate\Database\Eloquent\Model;
interface CastsInboundAttributes
{
    /**
     * Transform the attribute to its underlying model values.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return mixed
     */
    public function set(Model $model, string $key, mixed $value, array $attributes);
}
