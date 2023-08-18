<?php

namespace RectorPrefix202308\Illuminate\Contracts\Validation;

/**
 * @deprecated see ValidationRule
 */
interface Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @return bool
     */
    public function passes($attribute, mixed $value);
    /**
     * Get the validation error message.
     *
     * @return string|array
     */
    public function message();
}
