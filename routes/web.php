<?php

use App\Http\Controllers\Backend\AdminAuthController;
use App\Http\Controllers\Backend\AdminForgotPasswordController;
use App\Http\Controllers\Backend\AdminResetPasswordController;
use App\Http\Controllers\Backend\AreaController;
use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\CompanyInfoController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DeliverymanController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\PartnerManagementController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\WorkingProcessController;
use App\Http\Controllers\Deliveryman\DeliverymanAurhController;
use App\Http\Controllers\Deliveryman\DeliverymanDashboardController;
use App\Http\Controllers\Deliveryman\DeliverymanForgotPasswordController;
use App\Http\Controllers\Deliveryman\DeliverymanResetPasswordController;
use App\Http\Controllers\GeneralHelperController;
use App\Http\Controllers\Partner\PartnerAuthController;
use App\Http\Controllers\Partner\PartnerDashboardController;
use App\Http\Controllers\Partner\PartnerForgotPasswordController;
use App\Http\Controllers\Partner\PartnerResetPasswordController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/cc', function () {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('config:cache');

    return '<h1>All Config cleared</h1>';
});
/**
 * frontend
 * route
 * starts
 */
Route::get('/', function () {
    return view('welcome');
});

/**
 * frontend
 * route
 * ends
 */

///////////////////////////////////////////////////

/**
 * Partner
 * route
 * starts
 */
Route::prefix('/partner')->name('partner.auth.')->middleware('guest:partner')->group(function () {
    Route::get('/login', [PartnerAuthController::class, 'login'])->name('login');
    Route::post('/store-login', [PartnerAuthController::class, 'storeLogin'])->name('storeLogin');
    Route::get('/create-partner', [PartnerAuthController::class, 'createPartner'])->name('createPartner');
    Route::post('/store-partner', [PartnerAuthController::class, 'storePartner'])->name('storePartner');

    Route::get('/forgot-password', [PartnerForgotPasswordController::class, 'forgotPassword'])->name('forgotPassword');
    Route::post('/forgot-password', [PartnerForgotPasswordController::class, 'storeForgotPassword'])->name('storeForgotPassword');

    Route::get('/reset-password/{token}', [PartnerResetPasswordController::class, 'resetPassword'])->name('resetPassword');
    Route::post('/reset-password', [PartnerResetPasswordController::class, 'storeForgotPassword'])->name('storeResetPassword');
});

Route::prefix('/partner')->name('partner.')->middleware('auth:partner')->group(function () {
    Route::post('/logout', [PartnerAuthController::class, 'logout'])->name('auth.logout');

    Route::get('/dashboard', [PartnerDashboardController::class, 'dashboard'])->name('dashboard');

});

/**
 * Partner
 * route
 * ends
 */

//////////////////////////////////////////////////////////

/**
 * deliveryman
 * route
 * starts
 */

Route::prefix('/deliveryman')->name('deliveryman.auth.')->middleware('guest:deliveryman')->group(function () {
    Route::get('/login', [DeliverymanAurhController::class, 'login'])->name('login');
    Route::post('/store-login', [DeliverymanAurhController::class, 'storeLogin'])->name('storeLogin');

    Route::get('/forgot-password', [DeliverymanForgotPasswordController::class, 'forgotPassword'])->name('forgotPassword');
    Route::post('/forgot-password', [DeliverymanForgotPasswordController::class, 'storeForgotPassword'])->name('storeForgotPassword');

    Route::get('/reset-password/{token}', [DeliverymanResetPasswordController::class, 'resetPassword'])->name('resetPassword');
    Route::post('/reset-password', [DeliverymanResetPasswordController::class, 'storeForgotPassword'])->name('storeResetPassword');
});

Route::prefix('/deliveryman')->name('deliveryman.')->middleware('auth:deliveryman')->group(function () {
    Route::post('/logout', [DeliverymanAurhController::class, 'logout'])->name('auth.logout');

    Route::get('/dashboard', [DeliverymanDashboardController::class, 'dashboard'])->name('dashboard');
});

/**
 * deliveryman
 * route
 * ends
 */

////////////////////////////////////////////////////////

/**
 * admin
 * route
 * starts
 */

Route::prefix('/admin')->name('admin.auth.')->middleware('guest:admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'login'])->name('login');
    Route::post('/store-login', [AdminAuthController::class, 'storeLogin'])->name('storeLogin');

    Route::get('/forgot-password', [AdminForgotPasswordController::class, 'forgotPassword'])->name('forgotPassword');
    Route::post('/forgot-password', [AdminForgotPasswordController::class, 'storeForgotPassword'])->name('storeForgotPassword');

    Route::get('/reset-password/{token}', [AdminResetPasswordController::class, 'resetPassword'])->name('resetPassword');
    Route::post('/reset-password', [AdminResetPasswordController::class, 'storeForgotPassword'])->name('storeResetPassword');
});

Route::prefix('/admin')->name('admin.')->middleware('auth:admin')->group(function () {
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('auth.logout');

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    //admin management
    Route::controller(AdminAuthController::class)->name('auth.')->group(function () {
        Route::get('/admin-list', 'adminList')->name('adminList');
        Route::get('/create-admin', 'createAdmin')->name('createAdmin');
        Route::post('/store-admin', 'storeAdmin')->name('storeAdmin');
        Route::get('/edit-admin/{admin}', 'editAdmin')->name('editAdmin');
        Route::post('/update-admin/{admin}', 'updateAdmin')->name('updateAdmin');
        Route::post('/active-admin/{admin}', 'activeAdmin')->name('activeAdmin');
        Route::post('/inactive-admin/{admin}', 'inactiveAdmin')->name('inactiveAdmin');
        Route::delete('/delete-admin/{admin}', 'deleteAdmin')->name('deleteAdmin');

        Route::get('/customer-list', 'customerList')->name('customerList');
    });

    Route::controller(CityController::class)->prefix('/city')->name('city.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{city}', 'edit')->name('edit');
        Route::put('/update/{city}', 'update')->name('update');
        Route::post('/active/{city}', 'active')->name('active');
        Route::post('/inactive/{city}', 'inactive')->name('inactive');
    });

    Route::controller(PartnerManagementController::class)->prefix('/partner')->as('partner.')->group(function () {
        Route::get('/list', 'list')->name('list');
        Route::get('/edit_commission/{partner}', 'editCommission')->name('edit_commission');
        Route::patch('/update_commission/{partner}', 'updateCommission')->name('update_commission');
        Route::post('/active/{partner}', 'active')->name('active');
        Route::post('/inactive/{partner}', 'inactive')->name('inactive');
        Route::delete('/delete/{partner}', 'delete')->name('delete');
    });

    Route::controller(DeliverymanController::class)->prefix('/deliveryman')->name('deliveryman.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{deliveryman}', 'edit')->name('edit');
        Route::put('/update/{deliveryman}', 'update')->name('update');
        Route::post('/active/{deliveryman}', 'active')->name('active');
        Route::post('/inactive/{deliveryman}', 'inactive')->name('inactive');
    });

    Route::controller(AreaController::class)->prefix('/area')->name('area.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{area}', 'edit')->name('edit');
        Route::put('/update/{area}', 'update')->name('update');
        Route::post('/active/{area}', 'active')->name('active');
        Route::post('/inactive/{area}', 'inactive')->name('inactive');
    });

    Route::resources([
        'services'          => ServiceController::class,
        'working_processes' => WorkingProcessController::class,
    ]);

    //company info
    Route::controller(CompanyInfoController::class)->group(function () {
        Route::get('/company-info', 'showCompanyInfo')->name('showCompanyInfo');
        Route::post('/store-company-info', 'storeCompanyInfo')->name('storeCompanyInfo');
    });
    //pages
    Route::controller(PageController::class)->prefix('/pages')->name('pages.')->group(function () {
        Route::get('/pages', 'pageList')->name('pageList');
        Route::get('/create-pages', 'pageCreate')->name('pageCreate');
        Route::post('/store-pages', 'pageStore')->name('pageStore');
        Route::get('/edit-pages/{page}', 'pageEdit')->name('pageEdit');
        Route::put('/update-pages/{page}', 'pageUpdate')->name('pageUpdate');
        Route::delete('/delete-pages/{page}', 'pageDelete')->name('pageDelete');
        Route::post('/active-pages/{page}', 'pageActive')->name('pageActive');
        Route::post('/inactive-pages/{page}', 'pageInactive')->name('pageInactive');
    });
});

/**
 * admin
 * route
 * ends
 */

Route::controller(GeneralHelperController::class)->prefix('/g')->group(function () {
    Route::get('/get-area/{id}', 'getArea');
});