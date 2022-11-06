<?php

namespace App\Http\Controllers\Deliveryman;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\City;
use App\Models\Deliveryman;
use App\Models\Order;
use App\Models\OrderNotification;
use App\Models\OrderStatus;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DeliverymanOrderController extends Controller {
    public function orderAccept($id) {
        $d_man = auth()->guard('deliveryman')->user();
        $order = Order::findOrFail($id);

        if ($order->deliveryman_id) {
            return to_route('deliveryman.dashboard')->withToastInfo('OOP!! Deliveryman has been assigned.');
        }

        $order->deliveryman_id     = $d_man->id;
        $order->deliveryman_amount = $d_man->commission;
        $order->deliveryman_due    = $order->paid_amount;
        $order->save();

        $dn                      = OrderNotification::where('order_id', $order->id)->first();
        $dn->deliveryman_id      = $d_man->id;
        $dn->is_deliveryman_seen = 1;
        $dn->save();

        return to_route('deliveryman.dashboard')->withToastSuccess('The order assign to you successfully.');

    }

    public function statusOrder($slug) {

        $data                 = [];
        $data['order_status'] = $status = OrderStatus::where('slug', $slug)->first();
        $data['orders']       = Order::where([
            'deliveryman_id' => auth()->guard('deliveryman')->user()->id,
            'status'         => $status->id,
        ])->with(['orderIdentity', 'orderDetails', 'partner' => function ($query) {
            return $query->select(['id', 'name', 'phone', 'address']);
        },
        ])->get();
        $data['partners'] = Partner::where('status', 1)
            ->where('area_id', auth()->guard('deliveryman')->user()->area_id)
            ->where('c_to', '>=', today())
            ->get();

        $data['next_status'] = OrderStatus::where('deliveryman', 1)->get();

        return view('deliveryman.order.status_order', $data);
    }

    public function orderInvoice($order_id) {
        $order       = Order::where('id', $order_id)->with('orderIdentity', 'orderDetails', 'partner')->first();
        $deliveryman = Deliveryman::where('id', $order->deliveryman_id)->first()->name;

        return view('deliveryman.order.invoice', compact('order', 'deliveryman'));
    }

    public function updateOrderStatus(Request $request) {
        $order         = Order::findOrFail($request->order_id);
        $order->status = $request->order_status_id;
        $order->save();

        $pn                  = OrderNotification::where('order_id', $order->id)->first();
        $pn->order_status_id = $request->order_status_id;
        $pn->is_partner_seen = 0;
        $pn->save();

        return back()->withToastSuccess('Order status updated successfully.');
    }

    public function assignPartner(Request $request) {
        $partner               = Partner::find($request->partner_id);
        $order                 = Order::find($request->order_id);
        $order->partner_id     = $request->partner_id;
        $order->partner_amount = $order->total - $partner->commission;
        $order->save();

        $pn             = OrderNotification::where('order_id', $order->id)->first();
        $pn->partner_id = $partner->id;
        $pn->save();

        return back()->withToastSuccess('Partner assign successfully.');
    }

    public function payToCompany() {
        $orders = Order::where([
            'deliveryman_id'         => auth()->guard('deliveryman')->user()->id,
            'status'                 => 6,
            'user_payment_status'    => 0,
            'deliveryman_due_status' => 0,
        ])->with(['orderIdentity', 'partner' => function ($query) {
            return $query->select(['id', 'name']);
        },
        ])->get();

        return view('deliveryman.order.pay_to_company', compact('orders'));
    }

    public function payCompanyDue(Request $request) {
        $validator = Validator::make($request->all(), [
            'order_id' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all())->withInput();
        }

        foreach ($request->order_id as $item) {
            $order                         = Order::find($item);
            $order->user_payment_status    = 1;
            $order->deliveryman_due_status = 1;
            $order->deliveryman_due        = 0;
            $order->save();
        }

        return back()->withToastSuccess('Company due paid successfully');
    }

    public function profile() {
        $deliveryman = Deliveryman::find(auth()->guard('deliveryman')->user()->id);
        $areas       = Area::where('city_id', $deliveryman->city_id)->get();
        $cities      = City::all();

        $due_from_company     = Order::where('deliveryman_id', auth()->guard('deliveryman')->user()->id)->where('status', 6)->where('deliveryman_payment_status', 0)->sum('deliveryman_amount');
        $payment_from_company = Order::where('deliveryman_id', auth()->guard('deliveryman')->user()->id)->where('status', 6)->where('deliveryman_payment_status', 1)->sum('deliveryman_amount');

        return view('deliveryman.profile', compact('deliveryman', 'areas', 'cities','due_from_company','payment_from_company'));
    }

}
