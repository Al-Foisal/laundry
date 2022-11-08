<?php

namespace App\Http\Controllers\Deliveryman;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliverymanDashboardController extends Controller {
    public function dashboard() {
        $data = [];

        $data['pickup_pending'] = Order::where('deliveryman_id', auth()->guard('deliveryman')->user()->id)->where('status', 1)->count();

        $data['pickup_done'] = Order::where('deliveryman_id', auth()->guard('deliveryman')->user()->id)->where('status', 2)->count();

        $data['handover_to_laundry_partner'] = Order::where('deliveryman_id', auth()->guard('deliveryman')->user()->id)->where('status', 3)->count();

        $data['pending_at_laundry_partner'] = Order::where('deliveryman_id', auth()->guard('deliveryman')->user()->id)->where('status', 4)->count();

        $data['received_from_laundry_partner'] = Order::where('deliveryman_id', auth()->guard('deliveryman')->user()->id)->where('status', 5)->count();

        $data['delivered_to_customer'] = Order::where('deliveryman_id', auth()->guard('deliveryman')->user()->id)->where('status', 6)->count();

        $data['delivery_pending'] = Order::where('deliveryman_id', auth()->guard('deliveryman')->user()->id)->where('status', 5)->count();

        $data['cancel_from_customer'] = Order::where('deliveryman_id', auth()->guard('deliveryman')->user()->id)->where('status', 7)->count();

        $data['return'] = Order::where('deliveryman_id', auth()->guard('deliveryman')->user()->id)->where('status', 9)->count();

        return view('deliveryman.dashboard', $data);
    }

    public function orderPlace() {
        $orders = OrderNotification::where('deliveryman_id', auth()->guard('deliveryman')->user()->id)->orwhere('deliveryman_id', null)->orderBy('id', 'DESC')->get();

        foreach ($orders as $order) {

            if ($order->deliveryman_id) {
                $order->is_deliveryman_seen = 1;
                $order->save();
            }

        }

        return view('deliveryman.notification', compact('orders'));
    }

    public function logout(Request $request) {
        Auth::guard('deliveryman')->logout();

        return redirect()
            ->route('deliveryman.auth.login')
            ->withToastSuccess('Logout Successful!!');
    }

}
