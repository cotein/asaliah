<?php

namespace App\Http\Controllers\Web;

use App\Src\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\PublicationHere\BrandTransformer;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('name')->get();

        $transformated_brans = fractal($brands, new BrandTransformer())->toArray()['data'];

        return response()->json($transformated_brans, 200);
    }
}
