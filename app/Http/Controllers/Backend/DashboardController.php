<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\OrderStatus;

class DashboardController extends Controller {
    public function dashboard() {
        $data                = [];
        $data['next_status'] = OrderStatus::get();

        return view('backend.dashboard', $data);
    }
}
