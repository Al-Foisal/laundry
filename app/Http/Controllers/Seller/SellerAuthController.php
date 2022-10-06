<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SellerAuthController extends Controller {
    public function login() {
        return view('seller.auth.login');
    }

    public function storeLogin(Request $request) {
        $validator = Validator::make($request->all(), [
            'email'    => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all())->withInput();
        }

        if (Auth::guard('seller')->attempt([
            'email'    => $request->email,
            'password' => $request->password,
            'status'   => 1,
        ])) {
            return redirect()->route('seller.dashboard');
        }

        return redirect()->route('seller.auth.login')->withToastError('Invalid Credentitials!!');

    }

    public function sellerList() {
        $sellers = Seller::orderBy('status','desc')->get();

        return view('seller.auth.seller-list', compact('sellers'));
    }

    public function createSeller() {
        return view('seller.auth.create-seller');
    }

    public function storeSeller(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'phone'    => 'required|numeric',
            'email'    => 'required|email|unique:sellers',
            'password' => 'required',
            'address'  => 'required',
            'image'    => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all())->withInput();
        }

        if ($request->hasFile('image')) {

            $image_file = $request->file('image');

            if ($image_file) {

                $img_gen   = hexdec(uniqid());
                $image_url = 'images/seller/';
                $image_ext = strtolower($image_file->getClientOriginalExtension());

                $img_name    = $img_gen . '.' . $image_ext;
                $final_name1 = $image_url . $img_gen . '.' . $image_ext;

                $image_file->move($image_url, $img_name);
            }

        }

        $seller           = new Seller();
        $seller->name     = $request->name;
        $seller->phone    = $request->phone;
        $seller->email    = $request->email;
        $seller->password = bcrypt($request->password);
        $seller->address  = $request->address;
        $seller->image    = $final_name1 ?? '';
        $seller->status   = 1;
        $seller->save();

        return redirect()->route('seller.auth.login')->withToastSuccess('New Seller Registered Successfully!!');
    }

    public function editseller(seller $seller) {
        return view('seller.auth.edit-seller', compact('seller'));
    }

    public function updateseller(Request $request, seller $seller) {
        $validator = Validator::make($request->all(), [
            'name'    => 'required',
            'phone'   => 'required',
            'email'   => 'required|email|unique:sellers,email,' . $seller->id,
            'address' => 'required',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all())->withInput();
        }

        if ($request->hasFile('image')) {

            $image_file = $request->file('image');

            if ($image_file) {

                $image_path = public_path($seller->image);

                if (File::exists($image_path)) {
                    File::delete($image_path);
                }

                $img_gen   = hexdec(uniqid());
                $image_url = 'images/seller/';
                $image_ext = strtolower($image_file->getClientOriginalExtension());

                $img_name    = $img_gen . '.' . $image_ext;
                $final_name1 = $image_url . $img_gen . '.' . $image_ext;

                $image_file->move($image_url, $img_name);
                $seller->image = $final_name1;
                $seller->save();

            }

        }

        $seller->name    = $request->name;
        $seller->phone   = $request->phone;
        $seller->email   = $request->email;
        $seller->address = $request->address;
        $seller->update();

        return redirect()->route('seller.auth.sellerList')->withToastSuccess('The seller updated successfully!!');
    }

    public function activeSeller(Request $request, seller $seller) {
        $seller->status = 1;
        $seller->save();

        return redirect()->back()->withToastSuccess('The seller activated successfully!!');
    }

    public function inactiveSeller(Request $request, seller $seller) {
        $seller->status = 0;
        $seller->save();

        return redirect()->back()->withToastSuccess('The seller inactivated successfully!!');
    }

    public function deleteSeller(Request $request, seller $seller) {
        $image_path = public_path($seller->image);

        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $seller->delete();

        return redirect()->back()->withToastSuccess('The seller deleted successfully!!');
    }

    public function logout(Request $request) {
        Auth::guard('seller')->logout();

        return redirect()
            ->route('seller.auth.login')
            ->withToastSuccess('Logout Successful!!');
    }

}
