<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PartnerManagementController extends Controller {
    public function list() {
        $partners = Partner::orderBy('id', 'DESC')->get();

        return view('backend.partner.list', compact('partners'));
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
