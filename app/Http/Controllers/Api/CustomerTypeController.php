<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Src\Models\CustomerType;
use App\Http\Controllers\Controller;

class CustomerTypeController extends Controller
{
    public function index()
    {
        $ct = CustomerType::all();

        return response()->json($ct, 200);
    }
}
