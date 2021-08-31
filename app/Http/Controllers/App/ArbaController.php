<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArbaController extends Controller
{
    public function create()
    {
        return view('app.arba.consulta_por_sujeto')->with(['view_name' => 'Consulta de alícuota por sujeto - ARBA']);
    }
}
