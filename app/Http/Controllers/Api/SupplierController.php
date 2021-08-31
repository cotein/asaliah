<?php

namespace App\Http\Controllers\Api;

use App\Src\Models\Brand;
use App\Src\Models\Provider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupplierController extends Controller
{
    public function index()
    {
        return response()->json(Provider::all(), 200);
    }

    public function brands(Request $request)
    {
        $id = $request->id; //supplier

        /* $brands = Brand::whereHas('suppliers', function($q) use($id){
            $q->where('supplier_id', $id);
        })->get(); */

        $brands = Brand::where('id', 1) ->get();
        
        return response()->json($brands, 200);
    }
}
