<?php

namespace App\Http\Controllers\App;

use App\Src\Models\Iva;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IvaController extends Controller
{
    public function index()
    {
        $ivas = Iva::all();

        return response()->json($ivas, 200);
    }
}
