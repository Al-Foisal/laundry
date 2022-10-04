<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller {
    public function index() {
        $cities = City::all();

        return view('backend.city.index', compact('cities'));
    }

    public function create() {
        return view('backend.city.create');
    }

    public function store(Request $request) {
        City::create($request->all());

        return back()->withToastSuccess('City added successfully');
    }

    public function edit(City $city) {
        return view('backend.city.edit', compact('city'));
    }

    public function update(Request $request, City $city) {
        $city->update($request->all());

        return back()->withToastSuccess('City updated successfully');
    }

    public function active(Request $request, City $city) {
        $city->status = 1;
        $city->save();

        return back()->withToastSuccess('City active successfully');
    }

    public function inactive(Request $request, City $city) {
        $city->status = 0;
        $city->save();

        return back()->withToastSuccess('City inactive successfully');
    }
}
