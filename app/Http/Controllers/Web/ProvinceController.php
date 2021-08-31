<?php

namespace App\Http\Controllers\Web;

use App\Src\Models\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\StateTransformer;

class ProvinceController extends Controller
{
    public function index()
    {
        $provinces = State::all();

        $states = fractal($provinces, new StateTransformer())->toArray()['data'];

        return response()->json($states, 200);
    }
}
