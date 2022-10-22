<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\Deliveryman;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerOrderController extends Controller
{
    public function statusOrder($slug) {

        $data                 = [];
        $data['order_status'] = $status = OrderStatus::where('slug', $slug)->first();
        $data['orders']       = Order::where([
            'partner_id' => auth()->guard('partner')->user()->id,
            'status'         => $status->id,
        ])->with(['orderIdentity', 'orderDetails', 'deliveryman' => function ($query) {
            return $query->select(['id', 'name', 'phone', 'address']);
        },
        ])->get();

        $data['next_status'] = OrderStatus::where('partner', 1)->get();

        return view('partner.order.status_order', $data);
    }

    public function orderInvoice($order_id) {
        $order       = Order::where('id', $order_id)->with('orderIdentity', 'orderDetails', 'partner')->first();
        $deliveryman = Deliveryman::where('id', $order->deliveryman_id)->first()->name;

        return view('partner.order.invoice', compact('order', 'deliveryman'));
    }

    public function updateOrderStatus(Request $request) {
        $order         = Order::findOrFail($request->order_id);
        $order->status = $request->order_status_id;
        $order->save();

        return back()->withToastSuccess('Order status updated successfully.');
    }
}
