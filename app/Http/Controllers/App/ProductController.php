<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function create()
    {
        return view('app.products.new')->with(['view_name' => "Ingreso de Productos"]);
    }

    public function list()
    {
        return view('app.products.list')->with(['view_name' => "Listado de Productos"]);
    }

    public function edit($id)
    {
        return view('app.products.edit')->with(['view_name' => "Edición de Producto", 'id' => $id]);
    }
}
