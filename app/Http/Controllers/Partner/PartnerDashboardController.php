<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\City;
use App\Models\OrderNotification;
use App\Models\OrderStatus;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PartnerDashboardController extends Controller {
    public function dashboard() {
        $data                = [];
        $data['next_status'] = OrderStatus::where('partner', 1)->get();

        return view('partner.dashboard', $data);
    }

    public function profile() {
        $partner = Partner::find(auth()->guard('partner')->user()->id);
        $areas   = Area::where('city_id', $partner->city_id)->get();
        $cities  = City::all();

        return view('partner.profile', compact('partner', 'areas', 'cities'));
    }

    public function profileUpdate(Request $request, Partner $partner) {
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'phone'    => 'required',
            'e_phone'  => 'required',
            'email'    => 'required|email|unique:partners,email,' . $partner->id,
            'password' => 'nullable|min:8',
            'address'  => 'required',
            'image'    => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'nid'      => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all())->withInput();
        }

        if ($request->hasFile('image')) {

            $image_file = $request->file('image');

            if ($image_file) {

                $image_path = public_path($partner->image);

                if (File::exists($image_path)) {
                    File::delete($image_path);
                }

                $img_gen   = hexdec(uniqid());
                $image_url = 'images/partner/';
                $image_ext = strtolower($image_file->getClientOriginalExtension());

                $img_name    = $img_gen . '.' . $image_ext;
                $final_name1 = $image_url . $img_gen . '.' . $image_ext;

                $image_file->move($image_url, $img_name);
                $partner->image = $final_name1;
                $partner->save();

            }

        }

        if ($request->hasFile('nid')) {

            $image_file = $request->file('nid');

            if ($image_file) {

                $image_path = public_path($partner->image);

                if (File::exists($image_path)) {
                    File::delete($image_path);
                }

                $img_gen   = hexdec(uniqid());
                $image_url = 'images/partner/';
                $image_ext = strtolower($image_file->getClientOriginalExtension());

                $img_name = $img_gen . '.' . $image_ext;
                $nid      = $image_url . $img_gen . '.' . $image_ext;

                $image_file->move($image_url, $img_name);
                $partner->nid = $nid;
                $partner->save();

            }

        }

        if ($request->hasFile('e_nid')) {

            $image_file = $request->file('e_nid');

            if ($image_file) {

                $image_path = public_path($partner->image);

                if (File::exists($image_path)) {
                    File::delete($image_path);
                }

                $img_gen   = hexdec(uniqid());
                $image_url = 'images/partner/';
                $image_ext = strtolower($image_file->getClientOriginalExtension());

                $img_name = $img_gen . '.' . $image_ext;
                $e_nid    = $image_url . $img_gen . '.' . $image_ext;

                $image_file->move($image_url, $img_name);
                $partner->e_nid = $e_nid;
                $partner->save();

            }

        }

        if ($request->password) {
            $partner->password = bcrypt($request->password);
        }

        $partner->name    = $request->name;
        $partner->phone   = $request->phone;
        $partner->e_phone = $request->e_phone;
        $partner->c_to    = $request->c_to;
        $partner->email   = $request->email;
        $partner->address = $request->address;
        $partner->update();

        return back()->withToastSuccess('Your profile updated successfully!!');
    }

    public function orderPlace() {
        $orders = OrderNotification::where('partner_id', auth()->guard('partner')->user()->id)->orderBy('id', 'DESC')->get();

        foreach ($orders as $order) {

            if ($order->partner_id) {
                $order->is_partner_seen = 1;
                $order->save();
            }

        }

        return view('partner.notification', compact('orders'));
    }

}
