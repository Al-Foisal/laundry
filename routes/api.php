<?php

use App\Http\Controllers\Api\FrontendController;
use App\Http\Controllers\Api\HeaderFooterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(HeaderFooterController::class)->prefix('/hf')->group(function () {
    Route::get('/company-info', 'companyInfo');
    Route::get('/services', 'services');
    Route::get('/pages', 'pages');
});

Route::controller(FrontendController::class)->prefix('/front')->group(function () {
    Route::get('/cities', 'cities');
    Route::get('/city-area/{id}', 'cityArea');
    Route::get('/services', 'services');
    Route::get('/front-pricing', 'frontPricing');
    Route::get('/working-process', 'workingProcess');
    Route::get('/why-bests', 'whyBests');
});
