<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function create()
    {
        return view('app.customers.create')->with(['view_name' => "Alta de Clientes"]);
    }

    public function generate_voucher()
    {
        return view('app.customers.generate_voucher')->with(['view_name' => "Comprobantes de Venta"]);
    }

    public function invoices_list()
    {
        return view('app.customers.invoices_list')->with(['view_name' => "Listado de comprobantes de Venta"]);
    }

    public function customer_list()
    {
        return view('app.customers.list')->with(['view_name' => "Listado de Clientes"]);
    }

    public function edit($id)
    {
        return view('app.customers.edit')->with(['view_name' => "Datos del Cliente", 'id' => $id]);
    }

    public function generate_recibo()
    {
        return view('app.customers.add_recibo')->with(['view_name' => "Clientes - Ingreso de Recibos"]);
    }
}
