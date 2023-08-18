<?php

namespace RectorPrefix202308\Illuminate\Contracts\Validation;

use Closure;
/**
 * @deprecated see ValidationRule
 */
interface InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke(string $attribute, mixed $value, Closure $fail);
}
