<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MercadoPagoController extends Controller
{
    public function mercadopago_payments()
    {
        return view('app.mercadopago.payment-list')->with(['view_name' => "Listado de Pagos en MercadoPago"]);
    }
}
