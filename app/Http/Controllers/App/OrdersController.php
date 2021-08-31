<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function pedidos()
    {
        return view('app.pedidos.list')->with(['view_name' => "Listado de Órdenes de Compra"]);
    }
}
