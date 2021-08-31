<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderPaymentController extends Controller
{
    public function list()
    {
        return view('app.purchaser.order_list')->with(['view_name' => "Listado de órdenes de pago"]);
    }
}
