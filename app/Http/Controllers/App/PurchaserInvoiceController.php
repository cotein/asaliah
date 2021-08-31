<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PurchaserInvoiceController extends Controller
{
    public function create()
    {
        return view('app.purchaser.new')->with(['view_name' => "Ingreso comprobantes de compras"]);
    }

    public function to_pay()
    {
        return view('app.purchaser.to_pay')->with(['view_name' => "Comprobantes a pagar"]);
    }
}
