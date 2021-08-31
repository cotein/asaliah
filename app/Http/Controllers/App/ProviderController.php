<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProviderController extends Controller
{
    public function create()
    {
        return view('app.provider.new')->with(['view_name' => "Alta de Proveedores"]);
    }

    public function list()
    {
        return view('app.provider.list')->with(['view_name' => "Listado de comprobantes"]);
    }
}
