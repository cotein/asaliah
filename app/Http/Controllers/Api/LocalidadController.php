<?php

namespace App\Http\Controllers\Api;

use App\Src\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocalidadController extends Controller
{
    public function find_by_name()
    {
        $cities = City::where('state_id', request()->province_id)
                ->where('name', 'like', '%' . request()->localidad . '%')->get();

        return response()->json($cities, 200);
    }
}
