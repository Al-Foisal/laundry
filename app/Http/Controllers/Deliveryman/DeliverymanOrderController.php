<?php

namespace App\Http\Controllers\Deliveryman;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderStatus;

class DeliverymanOrderController extends Controller {
    public function orderAccept($id) {
        $d_man = auth()->guard('deliveryman')->user();
        $order = Order::findOrFail($id);

        if ($order->deliveryman_id) {
            return to_route('deliveryman.dashboard')->withToastInfo('OOP!! Deliveryman has been assigned.');
        }

        $order->deliveryman_id     = $d_man->id;
        $order->deliveryman_amount = ($order->total * $d_man->commission) / 100;
        $order->deliveryman_due    = $order->paid_amount;
        $order->save();

        return to_route('deliveryman.dashboard')->withToastSuccess('The order assign to you successfully.');

    }

    public function statusOrder($slug)
    {
        
        $data = [];
        $data['order_status'] = $status = OrderStatus::where('slug',$slug)->first();
        $data['orders'] = Order::where(['
                deliveryman_id'=>auth()->guard('deliveryman')->user()->id,
                'status'=>$status->id
            ])->with('orderIdentity','orderDetails')->get();

        return view();
    }

}
