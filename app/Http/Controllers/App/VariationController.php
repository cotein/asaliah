<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VariationController extends Controller
{
    public function create()
    {
        return view('app.variations.new')->with(['view_name' => "Crear variación para un producto existente"]);
    }
}
