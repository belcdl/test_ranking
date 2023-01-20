<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class CountWordsChalet implements InvokableRule
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
        if (str_word_count($value, 0) > 50) {
            $fail(20);
        } 
    }
}
