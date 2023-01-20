<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class CountWordsFlat implements InvokableRule
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

        if ( str_word_count($value, 0) >= 20 && str_word_count($value, 0) <=49) {
            $fail(10);

        } else if (str_word_count($value, 0) > 49) {
            $fail(30);
        }
    }
}
