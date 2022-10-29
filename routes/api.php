<?php

use App\Http\Controllers\Api\FrontendController;
use App\Http\Controllers\Api\HeaderFooterController;
use App\Http\Controllers\Api\OrderManagementController;
use App\Http\Controllers\Api\UserAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    Route::get('/service-price/{slug}', 'servicePrice');
    Route::get('/front-pricing', 'frontPricing');
    Route::get('/all-pricing', 'allPricing');
    Route::get('/working-process', 'workingProcess');
    Route::get('/why-bests', 'whyBests');
    Route::get('/faq', 'faq');
    Route::get('/job', 'job');
    Route::get('/job-details/{id}', 'jobDetails');
    Route::post('/submit-application', 'submitApplication');
});

Route::controller(OrderManagementController::class)->group(function () {
    Route::post('/cart/apply-coupon', 'applyCoupon');
    Route::post('/order/save', 'orderSave');
    Route::get('/order-list', 'orderList');
    Route::get('/order-invoice/{id}', 'invoice');
});

Route::post('/login', [UserAuthController::class, 'login']);
Route::middleware('auth:sanctum')->get('/logout', function (Request $request) {
    $user = $request->user();
    $user->tokens()->delete();
    Auth::guard('web')->logout();

    return ['status' => 'ok', 'message' => 'Logout Successful!'];
});