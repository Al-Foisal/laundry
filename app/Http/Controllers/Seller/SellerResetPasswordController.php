<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules;
class SellerResetPasswordController extends Controller
{
    public function resetPassword(Request $request) {
        return view('seller.auth.reset-password', ['request' => $request]);
    }

    public function storeForgotPassword(Request $request) {

        $validator = Validator::make($request->all(), [
            'token'    => 'required',
            'email'    => 'required|email',
            'password' => 'required|confirmed|min:8', Rules\Password::defaults(),
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all())->withInput();
        }

        $password = DB::table('password_resets')->where('email', $request->email)->where('token', $request->token)->first();

        if (!$password) {
            return redirect()->back()->withToastInfo('Something went wrong, Invalid token or email!!');
        }

        $seller = Seller::where('email', $request->email)->first();

        if ($seller && $password) {
            $seller->update(['password' => bcrypt($request->password)]);

            $password = DB::table('password_resets')->where('email', $request->email)->delete();

            return redirect()->route('seller.auth.login')->withToastSuccess('New password reset successfully!!');
        } else {
            return redirect()->back()->withToastError('The email is no longer our record!!');
        }

    }
}
