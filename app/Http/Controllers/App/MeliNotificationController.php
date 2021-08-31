<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MeliNotificationController extends Controller
{
    public function list()
    {
        return view('app.orders.list')->with(['view_name' => "Ordenes de MercadoLibre"]);
    }

    public function show()
    {
        return view('app.orders.show')->with(['view_name' => 'Orden de Venta']);
    }
}
