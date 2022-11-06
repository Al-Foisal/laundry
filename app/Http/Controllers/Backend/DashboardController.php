<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderStatus;

class DashboardController extends Controller {
    public function dashboard() {
        $data                = [];
        $data['next_status'] = OrderStatus::get();

        $_q = Order::query();

        $date_from = request()->date_from;
        $date_to   = request()->date_to;

// dd(gettype($date_from),gettype($date_to));
        if ($date_from && $date_to) {
            $data['order_received']   = Order::whereDate('updated_at','>=',$date_from)->whereDate('updated_at','<=',$date_to)->where('status', 2)->count();
            $data['pickup_pending']   = Order::whereDate('updated_at','>=',$date_from)->whereDate('updated_at','<=',$date_to)->where('status', 1)->count();
            $data['delivery_pending'] = Order::whereDate('updated_at','>=',$date_from)->whereDate('updated_at','<=',$date_to)->where('status', 5)->count();

            //Cloths received- total quantity for Iron, wash, dry clean
            $cloth_received = Order::whereDate('updated_at','>=',$date_from)->whereDate('updated_at','<=',$date_to)->where('status', 2)->with('orderDetails')->get();
            $cr_iron        = 0;
            $cr_wash        = 0;
            $cr_dry         = 0;

            foreach ($cloth_received as $received) {

                foreach ($received->orderDetails as $details) {

                    if ($details->service == 'Iron') {
                        $cr_iron = $cr_iron + $details->quantity;
                    } elseif ($details->service == 'Wash') {
                        $cr_wash = $cr_wash + $details->quantity;
                    } else {
                        $cr_dry = $cr_dry + $details->quantity;
                    }

                }

            }

            $data['crt_iron'] = $cr_iron;
            $data['crt_wash'] = $cr_wash;
            $data['crt_dry']  = $cr_dry;

            //end

            //Pending delivery by laundry partner
            $data['pending_delivery_laundry']       = $pdl       = Order::whereDate('updated_at','>=',$date_from)->whereDate('updated_at','<=',$date_to)->where('status', 3)->with('orderDetails')->get();
            $data['pending_delivery_laundry_count'] = Order::whereDate('updated_at','>=',$date_from)->whereDate('updated_at','<=',$date_to)->select('partner_id')->where('status', 3)->distinct()->count('partner_id');

            $total_cloths = 0;

            foreach ($pdl as $details) {

                foreach ($details->orderDetails as $d) {
                    $total_cloths = $total_cloths + $d->quantity;
                }

            }

            $data['pdl_total_cloths'] = $total_cloths;

            //end

            //Ready to deliver by Laundry partner
            $data['ready_to_delivery_by_laundry']       = $rtdbl       = Order::whereDate('updated_at','>=',$date_from)->whereDate('updated_at','<=',$date_to)->where('status', 4)->with('orderDetails')->get();
            $data['ready_to_delivery_by_laundry_count'] = Order::whereDate('updated_at','>=',$date_from)->whereDate('updated_at','<=',$date_to)->select('partner_id')->where('status', 4)->distinct()->count('partner_id');

            $total_rtdbl_cloths = 0;

            foreach ($rtdbl as $r_details) {

                foreach ($r_details->orderDetails as $d) {
                    $total_rtdbl_cloths = $total_rtdbl_cloths + $d->quantity;
                }

            }

            $data['rtdbl_total_cloths'] = $total_rtdbl_cloths;

            //end

            //Delivered by Laundry Partner
            $data['delivered_by_laundry']       = $dbl       = Order::whereDate('updated_at','>=',$date_from)->whereDate('updated_at','<=',$date_to)->where('status', 5)->with('orderDetails')->get();
            $data['delivered_by_laundry_count'] = Order::whereDate('updated_at','>=',$date_from)->whereDate('updated_at','<=',$date_to)->select('partner_id')->where('status', 5)->distinct()->count('partner_id');

            $total_dbl_cloths = 0;

            foreach ($dbl as $d_details) {

                foreach ($d_details->orderDetails as $d) {
                    $total_dbl_cloths = $total_dbl_cloths + $d->quantity;
                }

            }

            $data['dbl_total_cloths'] = $total_dbl_cloths;

            //end

            //Successfully delivered by deliveryman man
            $data['successfully_delivered']       = $sd       = Order::whereDate('updated_at','>=',$date_from)->whereDate('updated_at','<=',$date_to)->where('status', 6)->with('orderDetails')->get();
            $data['successfully_delivered_count'] = Order::whereDate('updated_at','>=',$date_from)->whereDate('updated_at','<=',$date_to)->select('partner_id')->where('status', 6)->distinct()->count('partner_id');

            $total_sd_cloths = 0;

            foreach ($sd as $d_details) {

                foreach ($d_details->orderDetails as $d) {
                    $total_sd_cloths = $total_sd_cloths + $d->quantity;
                }

            }

            $data['sd_total_cloths'] = $total_sd_cloths;
            //end
        } elseif (request()->selected === 'today') {
            $data['order_received']   = Order::whereDay('updated_at','=',date("d"))->where('status', 2)->count();
            $data['pickup_pending']   = Order::whereDay('updated_at','=',date("d"))->where('status', 1)->count();
            $data['delivery_pending'] = Order::whereDay('updated_at','=',date("d"))->where('status', 5)->count();

            //Cloths received- total quantity for Iron, wash, dry clean
            $cloth_received = Order::whereDay('updated_at','=',date("d"))->where('status', 2)->with('orderDetails')->get();
            $cr_iron        = 0;
            $cr_wash        = 0;
            $cr_dry         = 0;

            foreach ($cloth_received as $received) {

                foreach ($received->orderDetails as $details) {

                    if ($details->service == 'Iron') {
                        $cr_iron = $cr_iron + $details->quantity;
                    } elseif ($details->service == 'Wash') {
                        $cr_wash = $cr_wash + $details->quantity;
                    } else {
                        $cr_dry = $cr_dry + $details->quantity;
                    }

                }

            }

            $data['crt_iron'] = $cr_iron;
            $data['crt_wash'] = $cr_wash;
            $data['crt_dry']  = $cr_dry;

            //end

            //Pending delivery by laundry partner
            $data['pending_delivery_laundry']       = $pdl       = Order::whereDay('updated_at','=',date("d"))->where('status', 3)->with('orderDetails')->get();
            $data['pending_delivery_laundry_count'] = Order::whereDay('updated_at','=',date("d"))->select('partner_id')->where('status', 3)->distinct()->count('partner_id');

            $total_cloths = 0;

            foreach ($pdl as $details) {

                foreach ($details->orderDetails as $d) {
                    $total_cloths = $total_cloths + $d->quantity;
                }

            }

            $data['pdl_total_cloths'] = $total_cloths;

            //end

            //Ready to deliver by Laundry partner
            $data['ready_to_delivery_by_laundry']       = $rtdbl       = Order::whereDay('updated_at','=',date("d"))->where('status', 4)->with('orderDetails')->get();
            $data['ready_to_delivery_by_laundry_count'] = Order::whereDay('updated_at','=',date("d"))->select('partner_id')->where('status', 4)->distinct()->count('partner_id');

            $total_rtdbl_cloths = 0;

            foreach ($rtdbl as $r_details) {

                foreach ($r_details->orderDetails as $d) {
                    $total_rtdbl_cloths = $total_rtdbl_cloths + $d->quantity;
                }

            }

            $data['rtdbl_total_cloths'] = $total_rtdbl_cloths;

            //end

            //Delivered by Laundry Partner
            $data['delivered_by_laundry']       = $dbl       = Order::whereDay('updated_at','=',date("d"))->where('status', 5)->with('orderDetails')->get();
            $data['delivered_by_laundry_count'] = Order::whereDay('updated_at','=',date("d"))->select('partner_id')->where('status', 5)->distinct()->count('partner_id');

            $total_dbl_cloths = 0;

            foreach ($dbl as $d_details) {

                foreach ($d_details->orderDetails as $d) {
                    $total_dbl_cloths = $total_dbl_cloths + $d->quantity;
                }

            }

            $data['dbl_total_cloths'] = $total_dbl_cloths;

            //end

            //Successfully delivered by laundry man
            $data['successfully_delivered']       = $sd       = Order::whereDay('updated_at','=',date("d"))->where('status', 6)->with('orderDetails')->get();
            $data['successfully_delivered_count'] = Order::whereDay('updated_at','=',date("d"))->select('partner_id')->where('status', 6)->distinct()->count('partner_id');

            $total_sd_cloths = 0;

            foreach ($sd as $d_details) {

                foreach ($d_details->orderDetails as $d) {
                    $total_sd_cloths = $total_sd_cloths + $d->quantity;
                }

            }

            $data['sd_total_cloths'] = $total_sd_cloths;
            //end
        } elseif(request()->selected === 'month'){
            $data['order_received']   = Order::whereMonth('updated_at','=',date("m"))->whereYear('updated_at','=',date("Y"))->where('status', 2)->count();
            $data['pickup_pending']   = Order::whereMonth('updated_at','=',date("m"))->whereYear('updated_at','=',date("Y"))->where('status', 1)->count();
            $data['delivery_pending'] = Order::whereMonth('updated_at','=',date("m"))->whereYear('updated_at','=',date("Y"))->where('status', 5)->count();

            //Cloths received- total quantity for Iron, wash, dry clean
            $cloth_received = Order::whereMonth('updated_at','=',date("m"))->whereYear('updated_at','=',date("Y"))->where('status', 2)->with('orderDetails')->get();
            $cr_iron        = 0;
            $cr_wash        = 0;
            $cr_dry         = 0;

            foreach ($cloth_received as $received) {

                foreach ($received->orderDetails as $details) {

                    if ($details->service == 'Iron') {
                        $cr_iron = $cr_iron + $details->quantity;
                    } elseif ($details->service == 'Wash') {
                        $cr_wash = $cr_wash + $details->quantity;
                    } else {
                        $cr_dry = $cr_dry + $details->quantity;
                    }

                }

            }

            $data['crt_iron'] = $cr_iron;
            $data['crt_wash'] = $cr_wash;
            $data['crt_dry']  = $cr_dry;

            //end

            //Pending delivery by laundry partner
            $data['pending_delivery_laundry']       = $pdl       = Order::whereMonth('updated_at','=',date("m"))->whereYear('updated_at','=',date("Y"))->where('status', 3)->with('orderDetails')->get();
            $data['pending_delivery_laundry_count'] = Order::whereMonth('updated_at','=',date("m"))->whereYear('updated_at','=',date("Y"))->select('partner_id')->where('status', 3)->distinct()->count('partner_id');

            $total_cloths = 0;

            foreach ($pdl as $details) {

                foreach ($details->orderDetails as $d) {
                    $total_cloths = $total_cloths + $d->quantity;
                }

            }

            $data['pdl_total_cloths'] = $total_cloths;

            //end

            //Ready to deliver by Laundry partner
            $data['ready_to_delivery_by_laundry']       = $rtdbl       = Order::whereMonth('updated_at','=',date("m"))->whereYear('updated_at','=',date("Y"))->where('status', 4)->with('orderDetails')->get();
            $data['ready_to_delivery_by_laundry_count'] = Order::whereMonth('updated_at','=',date("m"))->whereYear('updated_at','=',date("Y"))->select('partner_id')->where('status', 4)->distinct()->count('partner_id');

            $total_rtdbl_cloths = 0;

            foreach ($rtdbl as $r_details) {

                foreach ($r_details->orderDetails as $d) {
                    $total_rtdbl_cloths = $total_rtdbl_cloths + $d->quantity;
                }

            }

            $data['rtdbl_total_cloths'] = $total_rtdbl_cloths;

            //end

            //Delivered by Laundry Partner
            $data['delivered_by_laundry']       = $dbl       = Order::whereMonth('updated_at','=',date("m"))->whereYear('updated_at','=',date("Y"))->where('status', 5)->with('orderDetails')->get();
            $data['delivered_by_laundry_count'] = Order::whereMonth('updated_at','=',date("m"))->whereYear('updated_at','=',date("Y"))->select('partner_id')->where('status', 5)->distinct()->count('partner_id');

            $total_dbl_cloths = 0;

            foreach ($dbl as $d_details) {

                foreach ($d_details->orderDetails as $d) {
                    $total_dbl_cloths = $total_dbl_cloths + $d->quantity;
                }

            }

            $data['dbl_total_cloths'] = $total_dbl_cloths;

            //end

            //Successfully delivered by deliveryman man
            $data['successfully_delivered']       = $sd       = Order::whereMonth('updated_at','=',date("m"))->whereYear('updated_at','=',date("Y"))->where('status', 6)->with('orderDetails')->get();
            $data['successfully_delivered_count'] = Order::whereMonth('updated_at','=',date("m"))->whereYear('updated_at','=',date("Y"))->select('partner_id')->where('status', 6)->distinct()->count('partner_id');

            $total_sd_cloths = 0;

            foreach ($sd as $d_details) {

                foreach ($d_details->orderDetails as $d) {
                    $total_sd_cloths = $total_sd_cloths + $d->quantity;
                }

            }

            $data['sd_total_cloths'] = $total_sd_cloths;
            //end
        } elseif(request()->selected === 'year'){
            $data['order_received']   = Order::whereYear('updated_at','=',date("Y"))->where('status', 2)->count();
            $data['pickup_pending']   = Order::whereYear('updated_at','=',date("Y"))->where('status', 1)->count();
            $data['delivery_pending'] = Order::whereYear('updated_at','=',date("Y"))->where('status', 5)->count();

            //Cloths received- total quantity for Iron, wash, dry clean
            $cloth_received = Order::whereYear('updated_at','=',date("Y"))->where('status', 2)->with('orderDetails')->get();
            $cr_iron        = 0;
            $cr_wash        = 0;
            $cr_dry         = 0;

            foreach ($cloth_received as $received) {

                foreach ($received->orderDetails as $details) {

                    if ($details->service == 'Iron') {
                        $cr_iron = $cr_iron + $details->quantity;
                    } elseif ($details->service == 'Wash') {
                        $cr_wash = $cr_wash + $details->quantity;
                    } else {
                        $cr_dry = $cr_dry + $details->quantity;
                    }

                }

            }

            $data['crt_iron'] = $cr_iron;
            $data['crt_wash'] = $cr_wash;
            $data['crt_dry']  = $cr_dry;

            //end

            //Pending delivery by laundry partner
            $data['pending_delivery_laundry']       = $pdl       = Order::whereYear('updated_at','=',date("Y"))->where('status', 3)->with('orderDetails')->get();
            $data['pending_delivery_laundry_count'] = Order::whereYear('updated_at','=',date("Y"))->select('partner_id')->where('status', 3)->distinct()->count('partner_id');

            $total_cloths = 0;

            foreach ($pdl as $details) {

                foreach ($details->orderDetails as $d) {
                    $total_cloths = $total_cloths + $d->quantity;
                }

            }

            $data['pdl_total_cloths'] = $total_cloths;

            //end

            //Ready to deliver by Laundry partner
            $data['ready_to_delivery_by_laundry']       = $rtdbl       = Order::whereYear('updated_at','=',date("Y"))->where('status', 4)->with('orderDetails')->get();
            $data['ready_to_delivery_by_laundry_count'] = Order::whereYear('updated_at','=',date("Y"))->select('partner_id')->where('status', 4)->distinct()->count('partner_id');

            $total_rtdbl_cloths = 0;

            foreach ($rtdbl as $r_details) {

                foreach ($r_details->orderDetails as $d) {
                    $total_rtdbl_cloths = $total_rtdbl_cloths + $d->quantity;
                }

            }

            $data['rtdbl_total_cloths'] = $total_rtdbl_cloths;

            //end

            //Delivered by Laundry Partner
            $data['delivered_by_laundry']       = $dbl       = Order::whereYear('updated_at','=',date("Y"))->where('status', 5)->with('orderDetails')->get();
            $data['delivered_by_laundry_count'] = Order::whereYear('updated_at','=',date("Y"))->select('partner_id')->where('status', 5)->distinct()->count('partner_id');

            $total_dbl_cloths = 0;

            foreach ($dbl as $d_details) {

                foreach ($d_details->orderDetails as $d) {
                    $total_dbl_cloths = $total_dbl_cloths + $d->quantity;
                }

            }

            $data['dbl_total_cloths'] = $total_dbl_cloths;

            //end

            //Successfully delivered by deliveryman man
            $data['successfully_delivered']       = $sd       = Order::whereYear('updated_at','=',date("Y"))->where('status', 6)->with('orderDetails')->get();
            $data['successfully_delivered_count'] = Order::whereYear('updated_at','=',date("Y"))->select('partner_id')->where('status', 6)->distinct()->count('partner_id');

            $total_sd_cloths = 0;

            foreach ($sd as $d_details) {

                foreach ($d_details->orderDetails as $d) {
                    $total_sd_cloths = $total_sd_cloths + $d->quantity;
                }

            }

            $data['sd_total_cloths'] = $total_sd_cloths;
            //end
        } else {
            // dd('');
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
                        $cr_iron = $cr_iron + $details->quantity;
                    } elseif ($details->service == 'Wash') {
                        $cr_wash = $cr_wash + $details->quantity;
                    } else {
                        $cr_dry = $cr_dry + $details->quantity;
                    }

                }

            }

            $data['crt_iron'] = $cr_iron;
            $data['crt_wash'] = $cr_wash;
            $data['crt_dry']  = $cr_dry;

//end

            //Pending delivery by laundry partner
            $data['pending_delivery_laundry']       = $pdl       = Order::where('status', 3)->with('orderDetails')->get();
            $data['pending_delivery_laundry_count'] = Order::select('partner_id')->where('status', 3)->distinct()->count('partner_id');

            $total_cloths = 0;

            foreach ($pdl as $details) {

                foreach ($details->orderDetails as $d) {
                    $total_cloths = $total_cloths + $d->quantity;
                }

            }

            $data['pdl_total_cloths'] = $total_cloths;

//end

            //Ready to deliver by Laundry partner
            $data['ready_to_delivery_by_laundry']       = $rtdbl       = Order::where('status', 4)->with('orderDetails')->get();
            $data['ready_to_delivery_by_laundry_count'] = Order::select('partner_id')->where('status', 4)->distinct()->count('partner_id');

            $total_rtdbl_cloths = 0;

            foreach ($rtdbl as $r_details) {

                foreach ($r_details->orderDetails as $d) {
                    $total_rtdbl_cloths = $total_rtdbl_cloths + $d->quantity;
                }

            }

            $data['rtdbl_total_cloths'] = $total_rtdbl_cloths;

//end

            //Delivered by Laundry Partner
            $data['delivered_by_laundry']       = $dbl       = Order::where('status', 5)->with('orderDetails')->get();
            $data['delivered_by_laundry_count'] = Order::select('partner_id')->where('status', 5)->distinct()->count('partner_id');

            $total_dbl_cloths = 0;

            foreach ($dbl as $d_details) {

                foreach ($d_details->orderDetails as $d) {
                    $total_dbl_cloths = $total_dbl_cloths + $d->quantity;
                }

            }

            $data['dbl_total_cloths'] = $total_dbl_cloths;

//end

            //Successfully delivered by deliveryman man
            $data['successfully_delivered']       = $sd       = Order::where('status', 6)->with('orderDetails')->get();
            $data['successfully_delivered_count'] = Order::select('partner_id')->where('status', 6)->distinct()->count('partner_id');

            $total_sd_cloths = 0;

            foreach ($sd as $d_details) {

                foreach ($d_details->orderDetails as $d) {
                    $total_sd_cloths = $total_sd_cloths + $d->quantity;
                }

            }

            $data['sd_total_cloths'] = $total_sd_cloths;
            //end
        }

        return view('backend.dashboard', $data);
    }

}
