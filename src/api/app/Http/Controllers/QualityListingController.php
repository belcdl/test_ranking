<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\GetData;
use App\Models\Ad;
use App\Traits\GetAds;
use Illuminate\Http\Response;

class QualityListingController extends Controller
{
    use GetAds;
    public function getIrrelevantAds() {
        $ads = $this->getQualityData();
        return response()->json($ads);
    }
    
}
