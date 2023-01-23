<?php

namespace App\Http\Controllers;

use App\GetData;
use App\Models\Ad;
use App\Models\Picture;
use App\Rules\CountWordsChalet;
use App\Rules\CountWordsFlat;
use App\Rules\DescriptionContains;
use App\Rules\DescriptionRequired;
use App\Rules\GardenSizeCheck;
use App\Rules\HouseSizeCheck;
use App\Rules\PicturesRequired;
use App\Traits\GetAds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CalculateScoreController extends Controller
{
    use GetAds;
   
    public function calculate() {
        
        foreach ($this->getData() as $ad) {           

            $validator = $this->validateData($ad);         
            $suma = array_sum($validator->errors()->all());

            //resta si no hay fotos
            //el anuncio no esta completo
            if (empty($ad['pictures'])) {
                $suma += -10;                
            } else {
                $is_complete = $this->isComplete($validator->errors()->keys(), $ad['typology']);
                $suma += $is_complete;                             
            }

            $suma = $suma > 100 ? 100 : $suma;
            
            Ad::where('id',$ad['id'])->update(['score'=> $suma, 'updated_at' => now()]);

            //duda de si el anuncio se actualiza. Por comprobar si el score ha cambiado
            if ($suma <= 40) {
                Ad::where('id',$ad['id'])->update(['irrelevant_since'=> $suma]);
            }               
        }
        return response()->json($this->getData());
    }

    public function validateData($ad) {
        $rules =  [
            'description' =>  [new DescriptionRequired, new DescriptionContains,  
                               Rule::when( $ad['typology'] == 'CHALET', new CountWordsChalet),Rule::when( $ad['typology'] == 'FLAT',new CountWordsFlat)],
            'pictures' =>  [new PicturesRequired],
            'house_size' =>  [new HouseSizeCheck],
            'garden_size' =>  [new GardenSizeCheck],
        ];

        $validator = Validator::make($ad, $rules);
        
        return $validator;
    }

    public function isComplete($keys, $typology) {
        if(count($keys) >= 3 && $typology == 'FLAT') {
            return 40;
        }
        if(count($keys) >= 4 && $typology == 'CHALET') {
            return 40;
        }
        if(in_array('house_size',$keys) && $typology == 'GARAGE') {
            return 40;
        }
    }    

}
