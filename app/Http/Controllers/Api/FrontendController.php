<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\City;
use App\Models\Package;
use App\Models\Service;
use App\Models\WhyBest;
use App\Models\WorkingProcess;

class FrontendController extends Controller {
    public function cities() {
        return City::where('status', 1)->get();
    }

    public function cityArea($id) {
        return Area::where('id', $id)->where('status', 1)->get();
    }

    public function workingProcess() {
        return WorkingProcess::all();
    }

    public function services() {
        return Service::all();
    }

    public function frontPricing() {
        return Package::where('on_front', 1)->where('status', 1)->with('service')->get();
    }

    public function whyBests() {
        return WhyBest::all();
    }
}
