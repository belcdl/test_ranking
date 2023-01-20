<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class PicturesRequired implements InvokableRule
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
        $points = 0;
        if(count($value) > 0){
            foreach ($value as $pic) {
                if($pic['quality'] == 'HD') {
                    $points += 20;
                } else {
                    $points += 10;
                }
            }
            $fail($points);
        } 
        
        
    }
}
