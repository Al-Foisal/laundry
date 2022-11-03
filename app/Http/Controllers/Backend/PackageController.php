<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PackageController extends Controller {
    public function index() {
        $packages = Package::with('service')->get();

        return view('backend.package.index', compact('packages'));
    }

    public function create() {
        $services = Service::all();

        return view('backend.package.create', compact('services'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'    => 'required',
            'price'   => 'required',
            'details' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all())->withInput();
        }

        if ($request->hasFile('image')) {

            $image_file = $request->file('image');

            if ($image_file) {

                $img_gen   = hexdec(uniqid());
                $image_url = 'images/package/';
                $image_ext = strtolower($image_file->getClientOriginalExtension());

                $img_name    = $img_gen . '.' . $image_ext;
                $final_name1 = $image_url . $img_gen . '.' . $image_ext;

                $image_file->move($image_url, $img_name);
            }

        }

        $discount_price = ($request->price * $request->discount) / 100;

        Package::create([
            'service_id'     => $request->service_id,
            'name'           => $request->name,
            'price'          => $request->price,
            'discount'       => $request->discount,
            'discount_price' => ($request->price - $discount_price),
            'j_from'         => $request->j_from,
            'c_to'           => $request->c_to,
            'details'        => $request->details,
            'image'          => $final_name1 ?? null,
        ]);

        return to_route('admin.package.index')->withToastSuccess('Package added successfully!!');

    }

    public function edit(Package $package) {
        $services = Service::all();

        return view('backend.package.edit', compact('package', 'services'));
    }

    public function update(Request $request, Package $package) {

        $validator = Validator::make($request->all(), [
            'name'    => 'required',
            'price'   => 'required',
            'details' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all())->withInput();
        }

        if ($request->hasFile('image')) {

            $image_file = $request->file('image');

            if ($image_file) {

                $image_path = public_path($package->image);

                if (File::exists($image_path)) {
                    File::delete($image_path);
                }

                $img_gen   = hexdec(uniqid());
                $image_url = 'images/package/';
                $image_ext = strtolower($image_file->getClientOriginalExtension());

                $img_name    = $img_gen . '.' . $image_ext;
                $final_name1 = $image_url . $img_gen . '.' . $image_ext;

                $image_file->move($image_url, $img_name);
                $package->image = $final_name1;
                $package->save();
            }

        }

        $discount_price = ($request->price * $request->discount) / 100;

        $package->service_id     = $request->service_id;
        $package->name           = $request->name;
        $package->price          = $request->price;
        $package->discount       = $request->discount;
        $package->discount_price = ($request->price - $discount_price);
        $package->j_from         = $request->j_from;
        $package->c_to           = $request->c_to;
        $package->details        = $request->details;

        $package->save();

        return to_route('admin.package.index')->withToastSuccess('Package updated successfully!!');
    }

    public function active(Request $request, Package $package) {
        $package->status = 1;
        $package->save();

        return to_route('admin.package.index')->withToastSuccess('Package activated successfully!!');
    }

    public function inactive(Request $request, Package $package) {
        $package->status = 0;
        $package->save();

        return to_route('admin.package.index')->withToastSuccess('Package inactivated successfully!!');
    }

    public function keepFront(Request $request, Package $package) {
        $package->on_front = 1;
        $package->save();

        return to_route('admin.package.index')->withToastSuccess('Package will show front page successfully!!');
    }

    public function removeFront(Request $request, Package $package) {
        $package->on_front = 0;
        $package->save();

        return to_route('admin.package.index')->withToastSuccess('Package remove front page successfully!!');
    }

}
