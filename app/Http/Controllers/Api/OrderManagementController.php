<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Deliveryman;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\OrderIdentity;
use App\Models\OrderNotification;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'discount'            => $request->discount??0,
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
                'details'    => $cart->details,
            ]);
        }

        OrderNotification::create([
            'order_id' => $order->id,
            'city_id'  => $request->city_id,
            'area_id'  => $request->area_id,
        ]);

        return response()->json(['status' => true]);

    }

    public function orderList() {
        $data           = [];
        $data['orders'] = Order::where('user_id', Auth::id())->with('deliveryman', 'status')->orderBy('id', 'desc')->get();

        return $data;
    }

    public function invoice($id) {
        $data = [];

        $order = Order::where('id', $id)->with('orderIdentity', 'orderDetails', 'partner')->first();

        $data['order']       = $order;
        $data['deliveryman'] = Deliveryman::where('id', $order->deliveryman_id)->first();
        $data['partner']     = Partner::where('id', $order->partner_id)->first();

        return $data;
    }

}
