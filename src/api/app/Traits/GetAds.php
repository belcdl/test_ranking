<?php

namespace App\Traits;
use App\Models\Ad;
use App\Models\Picture;


trait GetAds
{
   // protected $ads;
    public function getData()
    {
        $ads_data = Ad::all()->toArray();
        return $this->setPics($ads_data);
    }

    public function getQualityData() {        
        $ads_data = Ad::where('score', '<', 40)->get()->toArray();
        return $this->setPics($ads_data);
    }

    public function getAdsPublicList() {
        $ads_data = Ad::orderBy('score')->get()->toArray();
        return $this->setPics($ads_data);
    }

    private function setPics($ads_data) {
        $ads = [];
        foreach ($ads_data as $ad) {
            $pics = Picture::whereIn('id', $ad['pictures'])->get()->toArray();            
            $ad['pictures'] = $pics;
            array_push($ads, $ad);
        }
        return $ads;
    }


}