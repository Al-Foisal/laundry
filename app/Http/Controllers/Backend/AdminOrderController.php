<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Deliveryman;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Partner;
use Illuminate\Http\Request;

class AdminOrderController extends Controller {
    public function statusOrder($slug) {

        $data                 = [];
        $data['order_status'] = $status = OrderStatus::where('slug', $slug)->first();
        $data['orders']       = Order::where([
            'status' => $status->id,
        ])->with(['orderIdentity', 'orderDetails', 'partner', 'deliveryman',
        ])->get();
        $data['partners'] = Partner::where('status', 1)->get();
        $data['deliveryman'] = Deliveryman::where('status', 1)->get();
        $data['next_status'] = OrderStatus::where('deliveryman', 1)->get();

        return view('backend.order.status_order', $data);
    }

    public function orderInvoice($order_id) {
        $order       = Order::where('id', $order_id)->with('orderIdentity', 'orderDetails', 'partner')->first();
        $deliveryman = Deliveryman::where('id', $order->deliveryman_id)->first()->name;
        $partner = Partner::where('id', $order->partner_id)->first()->name;

        return view('backend.order.invoice', compact('order', 'deliveryman','partner'));
    }

    public function updateOrderStatus(Request $request) {
        $order         = Order::findOrFail($request->order_id);
        $order->status = $request->order_status_id;
        $order->save();

        return back()->withToastSuccess('Order status updated successfully.');
    }

    public function assignPartner(Request $request) {
        $partner               = Partner::find($request->partner_id);
        $order                 = Order::find($request->order_id);
        $order->partner_id     = $request->partner_id;
        $order->partner_amount = $order->total - (($order->total * $partner->commission) / 100);
        $order->save();

        return back()->withToastSuccess('Partner assign successfully.');
    }

    public function assignDeliveryman(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        $d_man = Deliveryman::find($request->deliveryman_id);

        $order->deliveryman_id     = $d_man->id;
        $order->deliveryman_amount = ($order->total * $d_man->commission) / 100;
        $order->deliveryman_due    = $order->paid_amount;
        $order->save();

        return back()->withToastSuccess('The order assign to you successfully.');
    }
}
