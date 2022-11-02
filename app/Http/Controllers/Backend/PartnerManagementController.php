<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\City;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PartnerManagementController extends Controller {
    public function list() {
        $partners = Partner::orderBy('id', 'DESC')->get();

        return view('backend.partner.list', compact('partners'));
    }

    public function create() {
        $cities = City::where('status', 1)->get();
        $areas  = Area::where('status', 1)->get();

        return view('backend.partner.create', compact('cities', 'areas'));
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'phone'    => 'required|numeric',
            'email'    => 'required|email|unique:partners',
            'password' => 'required',
            'address'  => 'required',
            'image'    => 'required|image|mimes:jpeg,png,jpg,gif',
            'nid'      => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all())->withInput();
        }

        if ($request->hasFile('image')) {

            $image_file = $request->file('image');

            if ($image_file) {

                $img_gen   = hexdec(uniqid());
                $image_url = 'images/partner/';
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
                $image_url = 'images/partner/';
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
                $image_url = 'images/partner/';
                $image_ext = strtolower($image_file->getClientOriginalExtension());

                $img_name = $img_gen . '.' . $image_ext;
                $e_nid    = $image_url . $img_gen . '.' . $image_ext;

                $image_file->move($image_url, $img_name);
            }

        }

        $partner             = new Partner();
        $partner->name       = $request->name;
        $partner->phone      = $request->phone;
        $partner->e_phone    = $request->e_phone;
        $partner->email      = $request->email;
        $partner->password   = bcrypt($request->password);
        $partner->commission = $request->commission;
        $partner->j_from     = $request->j_from;
        $partner->c_to       = $request->c_to;
        $partner->city_id    = $request->city_id;
        $partner->area_id    = $request->area_id;
        $partner->address    = $request->address;
        $partner->image      = $final_name1 ?? 'Profile';
        $partner->nid        = $nid ?? 'NID';
        $partner->e_nid      = $e_nid ?? 'E_NID';
        $partner->status     = 1;
        $partner->save();

        return back()->withToastSuccess('New partner created successfully!');
    }

    public function editCommission(Partner $partner) {
        return view('backend.partner.edit', compact('partner'));
    }

    public function updateCommission(Request $request, Partner $partner) {
        $validator = Validator::make($request->all(), [
            'commission' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all())->withInput();
        }

        $partner->commission = $request->commission;
        $partner->save();

        return to_route('admin.partner.list')
            ->withToastSuccess('Partner profile updated successfully!!');
    }

    public function active(Request $request, Partner $partner) {
        $partner->status = 1;
        $partner->save();

        return redirect()->back()->withToastSuccess('The partner activated successfully!!');
    }

    public function inactive(Request $request, Partner $partner) {
        $partner->status = 0;
        $partner->save();

        return redirect()->back()->withToastSuccess('The partner inactivated successfully!!');
    }

    public function delete(Request $request, Partner $partner) {
        $image_path = public_path($partner->image);

        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $partner->delete();

        return to_route('admin.partner.list')->withToastSuccess('partner deleted successfully.');
    }

}
