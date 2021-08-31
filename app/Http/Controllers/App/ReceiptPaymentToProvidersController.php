<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReceiptPaymentToProvidersController extends Controller
{
    public function create()
    {
        return view('app.provider.receipts.new')->with(['view_name' => "Nuevo pago a proveedores"]);
    }
    public function list()
    {
        return view('app.provider.receipts.list')->with(['view_name' => "Recibos de Pago"]);
    }
}
