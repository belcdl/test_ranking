<?php

namespace App\Http\Controllers;

use App\Traits\GetAds;
use Illuminate\Http\Request;

class AdController extends Controller
{
    use GetAds;

    public function getPublicList() {
        return response()->json($this->getAdsPublicList());
    }
}
