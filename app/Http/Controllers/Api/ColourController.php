<?php

namespace App\Http\Controllers\Api;

use App\Src\Models\Colour;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColourController extends Controller
{
    public function index()
    {
        $colours = Colour::all();
        
        return response()->json($colours, 200);
    }
}
