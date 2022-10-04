<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\City;
use Illuminate\Http\Request;

class AreaController extends Controller {
    public function index() {
        $areas = Area::with('city')->get();

        return view('backend.area.index', compact('areas'));
    }

    public function create() {
        $cities = City::where('status', 1)->get();

        return view('backend.area.create', compact('cities'));
    }

    public function store(Request $request) {
        Area::create($request->all());

        return back()->withToastSuccess('Area added successfully');
    }

    public function edit(Area $area) {
        $cities = City::where('status', 1)->get();

        return view('backend.area.edit', compact('cities', 'area'));
    }

    public function update(Request $request, Area $area) {
        $area->update($request->all());

        return back()->withToastSuccess('Area updated successfully');
    }

    public function active(Request $request, Area $area) {
        $area->status = 1;
        $area->save();

        return back()->withToastSuccess('Area active successfully');
    }

    public function inactive(Request $request, Area $area) {
        $area->status = 0;
        $area->save();

        return back()->withToastSuccess('Area inactive successfully');
    }
}
