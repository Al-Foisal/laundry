<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\City;
use App\Models\FAQ;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\Package;
use App\Models\Service;
use App\Models\WhyBest;
use App\Models\WorkingProcess;
use Illuminate\Http\Request;

class FrontendController extends Controller {
    public function cities() {
        return City::where('status', 1)->get();
    }

    public function cityArea($id) {
        return Area::where('city_id', $id)->where('status', 1)->get();
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

    public function allPricing() {
        return Package::where('status', 1)->with('service')->orderBy('id', 'desc')->get();
    }

    public function whyBests() {
        return WhyBest::all();
    }

    public function servicePrice($slug) {
        $data            = [];
        $data['service'] = $service = Service::where('slug', $slug)->first();
        $data['price']   = Package::where('service_id', $service->id)->where('status', 1)->get();

        return $data;
    }

    public function faq() {
        return FAQ::all();
    }

    public function job() {
        return Job::where('dead_line', '>=', today())->get();
    }

    public function jobDetails($id) {
        return Job::where('id', $id)->where('dead_line', '>=', today())->first();
    }

    public function submitApplication(Request $request) {
        return $request->all();
        $fileUpload = new JobApplication();

        if ($request->file()) {
            $file_name = time() . '_' . $request->file->getClientOriginalName();
            $file_path = $request->file('file')->storeAs('uploads', $file_name, 'public');

            $fileUpload->name = time() . '_' . $request->file->getClientOriginalName();
            $fileUpload->path = '/storage/' . $file_path;
            $fileUpload->save();

            return response()->json(['success' => 'File uploaded successfully.']);
        }

    }

}
