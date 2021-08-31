<?php

namespace App\Http\Controllers\Api\Afip;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exceptions\Afip\NotFoundPerson;
use App\Src\Afip\WS\Source\WSPUCManager;
use App\Src\Afip\WS\Responses\WSPUCResponse;
use App\Exceptions\Afip\AfipResponseException;

class WSPUCController extends Controller
{
    protected $wsPucManager;

    public function getPersona()
    {
        $this->wsPucManager = new WSPUCManager(ltrim(request()->cuit, '0'));

        $person = $this->wsPucManager->getPersona();

        //dd($person);
        /* $response = new WSPUCResponse($person);

        if ($response->hasErrorConstancia() || $response->hasErrorRegimenGeneral()){

            $err = collect([
                'Code' => 0,
                'Msg' => $response->getMsgError(),
            ]);

            throw new AfipResponseException($err->toJson(), 444);
        } */  

        return response()->json($person, 200);
    }
}
