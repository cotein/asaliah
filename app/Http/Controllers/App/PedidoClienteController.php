<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PedidoClienteController extends Controller
{
    public function list()
    {
        return view('app.pedidosClientes.list')->with(['view_name' => "Listado de pedidos"]);
    }

    public function create()
    {
        return view('app.pedidosClientes.new')->with(['view_name' => "Crear pedido"]);
    }

    public function edit($code)
    {
        return view('app.pedidosClientes.edit')->with(['view_name' => "Editar pedido", 'code'=>$code]);
    }

    public function comanda()
    {
        return view('app.pedidosClientes.comanda')->with(['view_name' => "Imprimir comanda de pedidos"]);
    }
}
