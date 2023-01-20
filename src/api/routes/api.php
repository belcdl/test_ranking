<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\CalculateScoreController;
use App\Http\Controllers\QualityListingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
|
*/

Route::put('calculate', [CalculateScoreController::class, 'calculate']);
Route::get('ads/irrelevant', [QualityListingController::class, 'getIrrelevantAds']);
Route::get('ads/list', [AdController::class, 'getPublicList']);
