<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PartnerAuthController extends Controller {
    public function login() {
        return view('partner.auth.login');
    }

    public function storeLogin(Request $request) {
        $validator = Validator::make($request->all(), [
            'email'    => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all())->withInput();
        }

        if (Auth::guard('partner')->attempt([
            'email'    => $request->email,
            'password' => $request->password,
        ])) {
            return redirect()->route('partner.dashboard');
        }

        return redirect()->route('partner.auth.login')->withToastError('Invalid Credentitials!!');

    }

    public function partnerList() {
        $partners = Partner::orderBy('status', 'desc')->get();

        return view('partner.auth.partner-list', compact('partners'));
    }

    public function createPartner() {
        $cities = City::where('status', 1)->get();

        return view('partner.auth.create-partner', compact('cities'));
    }

    public function storePartner(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'phone'    => 'required|numeric',
            'email'    => 'required|email|unique:partners',
            'password' => 'required',
            'address'  => 'required',
            'image'    => 'required|image|mimes:jpeg,png,jpg,gif',
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

        $partner           = new Partner();
        $partner->name     = $request->name;
        $partner->phone    = $request->phone;
        $partner->email    = $request->email;
        $partner->password = bcrypt($request->password);
        $partner->city_id  = $request->city_id;
        $partner->area_id  = $request->area_id;
        $partner->address  = $request->address;
        $partner->image    = $final_name1 ?? '';
        $partner->status   = 0;
        $partner->save();

        return to_route('partner.auth.login')
        ->withToastSuccess('Registration successfull! An admin will contact you within 24 hours.');
    }

    public function editPartner(Partner $partner) {
        return view('partner.auth.edit-partner', compact('partner'));
    }

    public function updatePartner(Request $request, Partner $partner) {
        $validator = Validator::make($request->all(), [
            'name'    => 'required',
            'phone'   => 'required',
            'email'   => 'required|email|unique:partners,email,' . $partner->id,
            'address' => 'required',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif',
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

        $partner->name    = $request->name;
        $partner->phone   = $request->phone;
        $partner->email   = $request->email;
        $partner->address = $request->address;
        $partner->update();

        return redirect()->route('partner.auth.partnerList')->withToastSuccess('The partner updated successfully!!');
    }

    public function activePartner(Request $request, Partner $partner) {
        $partner->status = 1;
        $partner->save();

        return redirect()->back()->withToastSuccess('The partner activated successfully!!');
    }

    public function inactivePartner(Request $request, Partner $partner) {
        $partner->status = 0;
        $partner->save();

        return redirect()->back()->withToastSuccess('The partner inactivated successfully!!');
    }

    public function deletePartner(Request $request, Partner $partner) {
        $image_path = public_path($partner->image);

        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $partner->delete();

        return redirect()->back()->withToastSuccess('The partner deleted successfully!!');
    }

    public function logout(Request $request) {
        Auth::guard('partner')->logout();

        return redirect()
            ->route('partner.auth.login')
            ->withToastSuccess('Logout Successful!!');
    }

}
