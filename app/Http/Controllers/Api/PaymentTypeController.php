<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Src\Models\PaymentType;
use App\Http\Controllers\Controller;

class PaymentTypeController extends Controller
{
    public function index()
    {
        $pay_methods = PaymentType::all();

        return response()->json($pay_methods, 200);
    }
}
