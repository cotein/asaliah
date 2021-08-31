<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Src\Models\AddressType;
use App\Http\Controllers\Controller;

class AddressTypeController extends Controller
{
    public function index()
    {
        $address_type = AddressType::all();

        return response()->json($address_type, 200);
    }
}
