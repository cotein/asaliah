<?php

namespace App\Http\Controllers\Api\Afip;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Src\Afip\WS\Source\WSFECRED;

class WSFECREDController extends Controller
{
    private $wsfecred;

    public function __construct()
    {
        $this->wsfecred = new WSFECRED(env('WSFECRED_AFIP_ENVIRONMENT'));
    }

    public function consultarMontoObligadoRecepcion($cuit, $date)
    {
        # code...
    }
}
