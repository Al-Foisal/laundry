<?php

namespace App\Http\Controllers\Deliveryman;

use App\Http\Controllers\Controller;
use App\Models\OrderStatus;

class DeliverymanDashboardController extends Controller {
    public function dashboard() {
        $data                = [];
        $data['next_status'] = OrderStatus::where('deliveryman', 1)->get();

        return view('deliveryman.dashboard', $data);
    }
}
