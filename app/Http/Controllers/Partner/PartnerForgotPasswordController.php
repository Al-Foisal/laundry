<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordLink;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class PartnerForgotPasswordController extends Controller
{
    public function forgotPassword() {
        return view('partner.auth.forgot-password');
    }

    public function storeForgotPassword(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all())->withInput();
        }

        $partner = Partner::where('email', $request->email)->first();

        if (!$partner) {
            return redirect()->back()->withToastError('This email is no longer with our records!!');
        }

        $url = route('partner.auth.resetPassword', [$request->_token, 'email' => $request->email]);

        Mail::to($request->email)->send(new ResetPasswordLink($url));

        DB::table('password_resets')->insert([
            'token'      => $request->_token,
            'email'      => $request->email,
            'created_at' => now(),
        ]);

        return redirect()->back()->withToastSuccess('We have sent a fresh reset password link!!');
    }
}
