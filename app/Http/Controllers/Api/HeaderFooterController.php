<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CompanyInfo;
use App\Models\Page;
use App\Models\Service;
use Illuminate\Http\Request;

class HeaderFooterController extends Controller {
    public function companyInfo() {
        return CompanyInfo::find(1);
    }

    public function services() {
        return Service::all();
    }

    public function pages() {
        return Page::where('status', 1)->get();
    }

    public function storeVisitorCount(Request $request)
    {
        $company = CompanyInfo::find(1);
        $company->visitor = $company->visitor + 1;
        $company->save();

        return true;
    }
}
