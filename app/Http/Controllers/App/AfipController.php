<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AfipController extends Controller
{
    public function afip_data()
    {
        return view('app.afip.company-data')->with(['view_name' => 'Datos de Inscripción - AFIP']);
    }
}
