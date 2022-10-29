<?php

namespace App\Http\Controllers;

use App\Models\Area;

class GeneralHelperController extends Controller {
    public function getArea($id) {
        $area = Area::where('city_id', $id)->where('status', 1)->get();

        return json_encode($area);
    }
}
