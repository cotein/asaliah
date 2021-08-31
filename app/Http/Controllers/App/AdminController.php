<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function activate_user()
    {
        return view('app.admin.activate-user')->with(['view_name' => 'Activación de Usuarios y Roles']);
    }

    public function taxes()
    {
        return view('app.admin.taxes')->with(['view_name' => 'Gestión de Impuestos en comprobantes de compras']);
    }

    public function last_voucher_on_afip()
    {
        return view('app.admin.last_voucher')->with(['view_name' => 'Comprobantes en AFIP']);
    }

    public function products()
    {
        return view('app.admin.products')->with(['view_name' => 'Ingreso de productos']);
    }

    public function priceList()
    {
        return view('app.admin.price-list.new')->with(['view_name' => 'Ingreso de Lista de Precios']);
    }
}
