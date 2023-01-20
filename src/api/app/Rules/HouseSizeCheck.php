<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class HouseSizeCheck implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        if (!empty($value) || !is_null($value)){
            $fail(0);
       }
    }
}