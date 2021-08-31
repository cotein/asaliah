<?php

namespace App\Http\Controllers\Api\Arba;

use RuntimeException;
use App\Src\Arba\Arba;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArbaController extends Controller
{
    public function alicuota_por_sujeto()
    {
        $arba = new Arba();

        $cuit = request()->cuit;
        //$cuit = 'puto';
        
        try {
            $alicuota = $arba->alicuota_sujeto($cuit);
        } catch (\Exception $e) {

            return response()->json($e->getMessage(), 431);
        }
        return response()->json($alicuota, 200);
    }
}
