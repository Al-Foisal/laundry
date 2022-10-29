<?php

namespace App\Http\Controllers\Deliveryman;

use App\Http\Controllers\Controller;
use App\Models\OrderNotification;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliverymanDashboardController extends Controller {
    public function dashboard() {
        $data                = [];
        $data['next_status'] = OrderStatus::where('deliveryman', 1)->get();

        return view('deliveryman.dashboard', $data);
    }

    public function orderPlace() {
        $orders = OrderNotification::where('deliveryman_id',auth()->guard('deliveryman')->user()->id)->orwhere('deliveryman_id',null)->orderBy('id','DESC')->get();

        foreach($orders as $order){
            if($order->deliveryman_id){
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
