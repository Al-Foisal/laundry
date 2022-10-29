<?php

namespace App\Http\Controllers\Deliveryman;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DeliverymanAurhController extends Controller {
    public function login() {
        return view('deliveryman.auth.login');
    }

    public function storeLogin(Request $request) {
        $validator = Validator::make($request->all(), [
            'email'    => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all())->withInput();
        }

        if (Auth::guard('deliveryman')->attempt([
            'email'    => $request->email,
            'password' => $request->password,
            'status'   => 1,
        ])) {
            return redirect()->route('deliveryman.dashboard');
        }

        return redirect()->route('deliveryman.auth.login')->withToastError('Invalid Credentitials!!');

    }

}
