<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function new()
    {
        return view('app.categories.new-category')->with(['view_name' => 'Categorias de productos']);
    }

    public function list()
    {
        return view('app.categories.list')->with(['view_name' => 'Listado de categorias']);
    }
}
