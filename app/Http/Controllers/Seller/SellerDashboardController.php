<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SellerDashboardController extends Controller
{
    public function dashboard()
    {
        $data = [];
        return view('seller.dashboard',$data);
    }
}
