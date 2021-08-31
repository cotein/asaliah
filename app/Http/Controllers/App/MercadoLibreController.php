<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MercadoLibreController extends Controller
{
    public function list()
    {
        return view('app.mercadolibre.list')->with(['view_name' => "Publicaciones en Mercado Libre"]);
    }

    public function edit($meli_id)
    {

        return view('app.mercadolibre.edit')->with([
                'view_name' => "Editar publicación",
                'meli_id' => $meli_id
            ]);
    }


    public function syncro()
    {
        return view('app.mercadolibre.account-syncro')->with([
                'view_name' => "Sincronizar cuenta con Mercado Libre",
            ]);
    }
}
