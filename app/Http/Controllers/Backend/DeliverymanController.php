<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
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

        return view('backend.deliveryman.create', compact('cities'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'    => 'required',
            'phone'   => 'required',
            'email'   => 'required|email|unique:deliverymen',
            'address' => 'required',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif',
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

        Deliveryman::create([
            'name'     => $request->name,
            'phone'    => $request->phone,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
            'address'  => $request->address,
            'image'    => $final_name1 ?? '',
        ]);

        return to_route('admin.deliveryman.index')->withToastSuccess('Deliveryman added successfully');
    }

    public function edit(Deliveryman $deliveryman) {
        $cities = City::where('status', 1)->get();
        return view('backend.deliveryman.edit', compact('deliveryman','cities'));
    }

    public function update(Request $request, Deliveryman $deliveryman) {
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'phone'    => 'required',
            'password' => 'nullable|min:8',
            'email'    => 'required|email|unique:deliverymen,email,' . $deliveryman->id,
            'address'  => 'required',
            'image'    => 'nullable|image|mimes:jpeg,png,jpg,gif',
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

        if ($request->password) {

            $deliveryman->password = bcrypt($request->password);
            $deliveryman->save();

        }

        $deliveryman->name    = $request->name;
        $deliveryman->phone   = $request->phone;
        $deliveryman->email   = $request->email;
        $deliveryman->address = $request->address;
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
