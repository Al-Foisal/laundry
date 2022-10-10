<?php

namespace App\Http\Controllers;

use App\Models\Area;

class GeneralHelperController extends Controller {
    public function getArea($id) {
        $area = Area::where('city_id', $id)->get();

        return json_encode($area);
    }
}
