<?php

namespace App\Providers;

use App\Models\CompanyInfo;
use App\Models\OrderNotification;
use App\Models\OrderStatus;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        $company = CompanyInfo::find(1);
        view()->share('company', $company);

        $partner_order_status = OrderStatus::where('partner', 1)->get();
        view()->share('partner_order_status', $partner_order_status);

        $deliveryman_order_status = OrderStatus::all();
        view()->share('deliveryman_order_status', $deliveryman_order_status);

        
    }
}
