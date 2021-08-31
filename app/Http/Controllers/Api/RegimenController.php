<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Src\Models\ProviderRegimen;
use App\Http\Controllers\Controller;
use App\Transformers\Provider\RegimenTransformer;

class RegimenController extends Controller
{
    public function index()
    {
        $reg = ProviderRegimen::orderBy('code')->get();

        $regimenes = fractal($reg, new RegimenTransformer())->toArray()['data'];

        return response()->json($regimenes, 200);
    }
}
