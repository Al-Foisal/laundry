<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SellerManagementController extends Controller {
    public function list() {
        $sellers = Seller::orderBy('id', 'DESC')->get();

        return view('backend.seller.list', compact('sellers'));
    }

    public function active(Request $request, Seller $seller) {
        $seller->status = 1;
        $seller->save();

        return redirect()->back()->withToastSuccess('The seller activated successfully!!');
    }

    public function inactive(Request $request, Seller $seller) {
        $seller->status = 0;
        $seller->save();

        return redirect()->back()->withToastSuccess('The seller inactivated successfully!!');
    }

    public function delete(Request $request, Seller $seller) {
        $image_path = public_path($seller->image);

        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $seller->delete();

        return to_route('admin.seller.list')->withToastSuccess('Seller deleted successfully.');
    }

}
