<?php

namespace App\Src\Afip\WS\Responses;

use App\Src\Afip\WS\Responses\AfipResponse;
use App\Src\Afip\WS\Responses\AfipResponseContract;

class WSFEResponse extends AfipResponse implements AfipResponseContract
{
    public function hasErrors()
    {
        if (array_key_exists('Errors', $this->response['FECAESolicitarResult'])) {
            
            return true;
        }

        return false;
    }

    public function hasEvents()
    {
        if (array_key_exists('Events', $this->response['FECAESolicitarResult'])) {
            
            return true;
        }

        return false;
    }

    public function hasObservaciones()
    {
        if (array_key_exists('Observaciones', $this->response['FECAESolicitarResult']['FeDetResp']['FECAEDetResponse'])) {
            
            return true;
        }

        return false;
    }

    public function getErrors()
    {
       return collect($this->response['FECAESolicitarResult']['Errors']);
    }

    public function getEvents()
    {
       return collect($this->response['FECAESolicitarResult']['Events']);
    }

    public function getObservaciones()
    {
       return collect($this->response['FECAESolicitarResult']['FeDetResp']['FECAEDetResponse']['Observaciones']['Obs']);
    }
}

