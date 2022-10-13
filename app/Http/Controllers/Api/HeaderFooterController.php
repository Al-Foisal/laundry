<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CompanyInfo;
use App\Models\Page;
use App\Models\Service;

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
}
