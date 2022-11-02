<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\City;
use App\Models\Deliveryman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class DeliverymanController extends Controller {
    public function index() {
        $deliverymen = Deliveryman::all();

        return view('backend.deliveryman.index', compact('deliverymen'));
    }

    public function create() {
        $cities = City::where('status', 1)->get();
        $areas  = Area::where('status', 1)->get();

        return view('backend.deliveryman.create', compact('cities', 'areas'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'       => 'required',
            'phone'      => 'required',
            'city_id'    => 'required',
            'area_id'    => 'required',
            'commission' => 'required',
            'password'   => 'required|min:8',
            'email'      => 'required|email|unique:deliverymen',
            'address'    => 'required',
            'image'      => 'required|image|mimes:jpeg,png,jpg,gif',
            'nid'        => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all())->withInput();
        }

        if ($request->hasFile('image')) {

            $image_file = $request->file('image');

            if ($image_file) {

                $img_gen   = hexdec(uniqid());
                $image_url = 'images/deliveryman/';
                $image_ext = strtolower($image_file->getClientOriginalExtension());

                $img_name    = $img_gen . '.' . $image_ext;
                $final_name1 = $image_url . $img_gen . '.' . $image_ext;

                $image_file->move($image_url, $img_name);
            }

        }

        if ($request->hasFile('nid')) {

            $image_file = $request->file('nid');

            if ($image_file) {

                $img_gen   = hexdec(uniqid());
                $image_url = 'images/deliveryman/';
                $image_ext = strtolower($image_file->getClientOriginalExtension());

                $img_name = $img_gen . '.' . $image_ext;
                $nid      = $image_url . $img_gen . '.' . $image_ext;

                $image_file->move($image_url, $img_name);
            }

        }

        if ($request->hasFile('e_nid')) {

            $image_file = $request->file('e_nid');

            if ($image_file) {

                $img_gen   = hexdec(uniqid());
                $image_url = 'images/deliveryman/';
                $image_ext = strtolower($image_file->getClientOriginalExtension());

                $img_name = $img_gen . '.' . $image_ext;
                $e_nid    = $image_url . $img_gen . '.' . $image_ext;

                $image_file->move($image_url, $img_name);
            }

        }

        $deliveryman = new Deliveryman();

        $deliveryman->name       = $request->name;
        $deliveryman->phone      = $request->phone;
        $deliveryman->e_phone    = $request->e_phone;
        $deliveryman->email      = $request->email;
        $deliveryman->password   = bcrypt($request->password);
        $deliveryman->image      = $final_name1 ?? 'Profile';
        $deliveryman->nid        = $nid ?? 'nid';
        $deliveryman->e_nid      = $e_nid ?? 'e_nid';
        $deliveryman->address    = $request->address;
        $deliveryman->city_id    = $request->city_id;
        $deliveryman->area_id    = $request->area_id;
        $deliveryman->commission = $request->commission;
        $deliveryman->save();

        return to_route('admin.deliveryman.index')->withToastSuccess('Deliveryman added successfully');
    }

    public function edit(Deliveryman $deliveryman) {
        $cities = City::where('status', 1)->get();
        $areas  = Area::where('status', 1)->get();

        return view('backend.deliveryman.edit', compact('deliveryman', 'cities', 'areas'));
    }

    public function update(Request $request, Deliveryman $deliveryman) {
        $validator = Validator::make($request->all(), [
            'name'       => 'required',
            'phone'      => 'required',
            'city_id'    => 'required',
            'area_id'    => 'required',
            'commission' => 'required',
            'password'   => 'nullable|min:8',
            'email'      => 'required|email|unique:deliverymen,email,' . $deliveryman->id,
            'address'    => 'required',
            'image'      => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all())->withInput();
        }

        if ($request->hasFile('image')) {

            $image_file = $request->file('image');

            if ($image_file) {

                $image_path = public_path($deliveryman->image);

                if (File::exists($image_path)) {
                    File::delete($image_path);
                }

                $img_gen   = hexdec(uniqid());
                $image_url = 'images/deliveryman/';
                $image_ext = strtolower($image_file->getClientOriginalExtension());

                $img_name    = $img_gen . '.' . $image_ext;
                $final_name1 = $image_url . $img_gen . '.' . $image_ext;

                $image_file->move($image_url, $img_name);
                $deliveryman->image = $final_name1;
                $deliveryman->save();

            }

        }

        if ($request->hasFile('nid')) {

            $image_file = $request->file('nid');

            if ($image_file) {

                $image_path = public_path($deliveryman->image);

                if (File::exists($image_path)) {
                    File::delete($image_path);
                }

                $img_gen   = hexdec(uniqid());
                $image_url = 'images/deliveryman/';
                $image_ext = strtolower($image_file->getClientOriginalExtension());

                $img_name = $img_gen . '.' . $image_ext;
                $nid      = $image_url . $img_gen . '.' . $image_ext;

                $image_file->move($image_url, $img_name);
                $deliveryman->nid = $nid;
                $deliveryman->save();

            }

        }

        if ($request->hasFile('e_nid')) {

            $image_file = $request->file('e_nid');

            if ($image_file) {

                $image_path = public_path($deliveryman->image);

                if (File::exists($image_path)) {
                    File::delete($image_path);
                }

                $img_gen   = hexdec(uniqid());
                $image_url = 'images/deliveryman/';
                $image_ext = strtolower($image_file->getClientOriginalExtension());

                $img_name = $img_gen . '.' . $image_ext;
                $e_nid    = $image_url . $img_gen . '.' . $image_ext;

                $image_file->move($image_url, $img_name);
                $deliveryman->e_nid = $e_nid;
                $deliveryman->save();

            }

        }

        if ($request->password) {

            $deliveryman->password = bcrypt($request->password);
            $deliveryman->save();

        }

        $deliveryman->name       = $request->name;
        $deliveryman->phone      = $request->phone;
        $deliveryman->e_phone    = $request->e_phone;
        $deliveryman->email      = $request->email;
        $deliveryman->address    = $request->address;
        $deliveryman->city_id    = $request->city_id;
        $deliveryman->area_id    = $request->area_id;
        $deliveryman->commission = $request->commission;
        $deliveryman->save();

        return to_route('admin.deliveryman.index')->withToastSuccess('Deliveryman updated successfully');
    }

    public function active(Request $request, Deliveryman $deliveryman) {
        $deliveryman->status = 1;
        $deliveryman->save();

        return to_route('admin.deliveryman.index')->withToastSuccess('Deliveryman active successfully');
    }

    public function inactive(Request $request, Deliveryman $deliveryman) {
        $deliveryman->status = 0;
        $deliveryman->save();

        return to_route('admin.deliveryman.index')->withToastSuccess('Deliveryman inactive successfully');
    }

}
