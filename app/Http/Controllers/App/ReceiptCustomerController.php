<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReceiptCustomerController extends Controller
{
    public function list()
    {
        return view('app.customers.receipt.list')->with(['view_name' => "Recibos clientes"]);
    }
}
