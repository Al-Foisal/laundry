<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class OrderManagementController extends Controller {
    public function applyCoupon(Request $request) {
        $coupon_code = $request->coupon_code;
        $check       = Coupon::where('code', $coupon_code)->first();

        if (!$check || $check->validity <= today()) {
            return response()->json(['status' => false, 'message' => 'Invalid or expired coupon code.']);
        }

        return response()->json(['status' => true, 'coupon' => $check]);

    }

}
