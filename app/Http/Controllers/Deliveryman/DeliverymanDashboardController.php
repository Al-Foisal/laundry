<?php

namespace App\Http\Controllers\Deliveryman;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeliverymanDashboardController extends Controller
{
    public function dashboard()
    {
        $data = [];
        return view('deliveryman.dashboard',$data);
    }
}
