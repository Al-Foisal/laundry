<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\OrderIdentity;
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

    public function orderSave(Request $request) {

        $order = Order::create([
            'user_id'             => auth()->user()->id,
            'user_payment_method' => $request->user_payment_method,
            'user_payment_status' => 0,
            'coupon_code'         => $request->coupon_code,
            'coupon_percentage'   => $request->coupon_percentage,
            'total'               => $request->total,
            'discount'            => $request->discount,
            'shipping_charge'     => $request->shipping_charge,
            'paid_amount'         => $request->paid_amount,
            'status'              => 1,
        ]);

        OrderIdentity::create([
            'order_id' => $order->id,
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'address'  => $request->address,
            'city_id'  => $request->city_id,
            'area_id'  => $request->area_id,
        ]);
        $carts = json_decode(request('cart'));

        foreach ($carts as $cart) {
            OrderDetails::create([
                'order_id' => $order->id,
                'name'     => $cart->name,
                'service'  => $cart->service,
                'quantity' => $cart->quantity,
                'price'    => $cart->price,
            ]);
        }

        return response()->json(['status' => true]);

    }

}
