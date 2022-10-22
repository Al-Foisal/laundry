<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\City;
use App\Models\OrderStatus;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PartnerDashboardController extends Controller {
    public function dashboard() {
        $data = [];
        $data['next_status'] = OrderStatus::where('partner', 1)->get();
        return view('partner.dashboard', $data);
    }

    public function profile() {
        $partner = Partner::find(auth()->guard('partner')->user()->id);
        $areas = Area::where('city_id',$partner->city_id)->get();
        $cities = City::all();

        return view('partner.profile', compact('partner','areas','cities'));
    }

    public function profileUpdate(Request $request, Partner $partner) {
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'phone'    => 'required',
            'password' => 'nullable|min:8',
            'email'    => 'required|email|unique:partners,email,' . $partner->id,
            'address'  => 'required',
            'image'    => 'nullable|image|mimes:jpeg,png,jpg,gif',
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

        if ($request->password) {

            $partner->password = bcrypt($request->password);
            $partner->save();

        }

        $partner->name    = $request->name;
        $partner->phone   = $request->phone;
        $partner->email   = $request->email;
        $partner->address = $request->address;
        $partner->city_id = $request->city_id;
        $partner->area_id = $request->area_id;
        $partner->save();

        return back();
    }
}
