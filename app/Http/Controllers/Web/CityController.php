<?php

namespace App\Http\Controllers\Web;

use App\Src\Models\City;
use Illuminate\Http\Request;
use App\Src\Meli\MeliShipments;
use App\Http\Controllers\Controller;
use App\Transformers\CityTransformer;

class CityController extends Controller
{
    public function get_cities_per_province(Request $request)
    {
        $state_id = $request->city['id'];

        $cities = City::where('state_id', $state_id)->orderBy('name')->get();
        
        $c = fractal($cities, new CityTransformer())->toArray()['data'];

        return response()->json($c, 200);
        
    }

    public function shipping(Request $request)
    {
        $post_code = $request->city['cp'];

        $sh = new MeliShipments();

        $shpping_price = $sh->calculate_shipment($post_code);

        return response()->json($shpping_price, 200);
    }
}
