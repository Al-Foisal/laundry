<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CouponController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $coupons = Coupon::all();

        return view('backend.coupon.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $packages = Package::where('status', 1)->get();

        return view('backend.coupon.create', compact('packages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'code'        => 'required|unique:coupons',
            'percentage'  => 'required|numeric',
            'cart_amount' => 'required|numeric',
            'validity'    => 'required|after_or_equal:today',
            'coupon_type' => 'required',
            'package_id'  => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all())->withInput();
        }

        Coupon::create([
            'code'        => $request->code,
            'percentage'  => $request->percentage,
            'cart_amount' => $request->cart_amount,
            'validity'    => $request->validity,
            'coupon_type' => $request->coupon_type,
            'package_id'  => implode(" ", $request->package_id),
        ]);

        return redirect()->route('admin.coupons.index')->withToastSuccess('Coupon added successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon) {
        $coupon->delete();

        return redirect()->back()->withToastSuccess('Coupon deleted successfully!!');
    }

}
