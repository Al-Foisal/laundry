<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderStatus;

class DashboardController extends Controller {
    public function dashboard() {
        $data                = [];
        $data['next_status'] = OrderStatus::get();

        $data['order_received']   = Order::where('status', 2)->count();
        $data['pickup_pending']   = Order::where('status', 1)->count();
        $data['delivery_pending'] = Order::orWhere('status', 4)->orWhere('status', 5)->count();

        //Cloths received- total quantity for Iron, wash, dry clean
        $cloth_received = Order::where('status', 2)->with('orderDetails')->get();
        $cr_iron        = 0;
        $cr_wash        = 0;
        $cr_dry         = 0;

        foreach ($cloth_received as $received) {

            foreach ($received->orderDetails as $details) {

                if ($details->service == 'Iron') {
                    $cr_iron = $cr_iron + 1;
                } elseif ($details->service == 'Wash') {
                    $cr_wash = $cr_wash + 1;
                } else {
                    $cr_dry = $cr_dry + 1;
                }

            }

        }

        $data['crt_iron'] = $cr_iron;
        $data['crt_wash'] = $cr_wash;
        $data['crt_dry']  = $cr_dry;

//==//

        //Pending delivery by laundry partner
        $data['pending_delivery_laundry']       = $pdl       = Order::where('status', 3)->with('orderDetails')->get();
        $data['pending_delivery_laundry_count'] = Order::select('partner_id')->where('status', 3)->distinct()->count('partner_id');

        $total_cloths = 0;

        foreach ($pdl as $details) {

            foreach ($details->orderDetails as $d) {
                $total_cloths = $total_cloths + 1;
            }

        }

        $data['pdl_total_cloths'] = $total_cloths;

        //==//

        //Ready to deliver by Laundry partner
        $data['ready_to_delivery_by_laundry']       = $rtdbl       = Order::where('status', 4)->with('orderDetails')->get();
        $data['ready_to_delivery_by_laundry_count'] = Order::select('partner_id')->where('status', 4)->distinct()->count('partner_id');

        $total_rtdbl_cloths = 0;

        foreach ($rtdbl as $r_details) {

            foreach ($r_details->orderDetails as $d) {
                $total_rtdbl_cloths = $total_rtdbl_cloths + 1;
            }

        }

        $data['rtdbl_total_cloths'] = $total_rtdbl_cloths;
        //==//

        //Delivered by Laundry Partner
        $data['delivered_by_laundry']       = $dbl       = Order::where('status', 5)->with('orderDetails')->get();
        $data['delivered_by_laundry_count'] = Order::select('partner_id')->where('status', 5)->distinct()->count('partner_id');

        $total_dbl_cloths = 0;

        foreach ($dbl as $d_details) {

            foreach ($d_details->orderDetails as $d) {
                $total_dbl_cloths = $total_dbl_cloths + 1;
            }

        }

        $data['dbl_total_cloths'] = $total_dbl_cloths;
        //==//

        //Successfully delivered by laundry man
        $data['successfully_delivered']       = $sd       = Order::where('status', 5)->with('orderDetails')->get();
        $data['successfully_delivered_count'] = Order::select('partner_id')->where('status', 5)->distinct()->count('partner_id');

        $total_sd_cloths = 0;

        foreach ($sd as $d_details) {

            foreach ($d_details->orderDetails as $d) {
                $total_sd_cloths = $total_sd_cloths + 1;
            }

        }

        $data['sd_total_cloths'] = $total_sd_cloths;
        //==//

        return view('backend.dashboard', $data);
    }

}
