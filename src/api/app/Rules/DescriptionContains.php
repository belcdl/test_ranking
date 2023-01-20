<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class DescriptionContains implements InvokableRule
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
        $key_words = ['luminoso', 'nuevo', 'céntrico', 'ático', 'reformado' ];

        $match = 0;
        foreach ($key_words as $valor) {
            if(substr_count(strtolower($value), $valor) !== false) {
                    $match += substr_count(strtolower($value), $valor);
            };
        }       
        if ($match>0) {
            $fail($match * 5);
        } else {
            $fail($match);
        }
        
    }
}
