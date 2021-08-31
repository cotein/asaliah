<?php

namespace App\Src\Afip\WS\Responses;

use App\Src\Afip\WS\Responses\AfipResponse;
use App\Src\Afip\WS\Responses\AfipResponseContract;

class WSFEGetCaeOnAfipResponse extends AfipResponse implements AfipResponseContract
{
    public function isRejected()
    {
        if ($this->response['FECAESolicitarResult']['FeCabResp']['Resultado'] == 'R') {
            return true;
        }

        return false;
    }

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

    public function getMessages()
    {
        $messages = [];

        if ($this->hasErrors()) array_push($messages, $this->getErrors());
        if ($this->hasEvents()) array_push($messages, $this->getEvents());
        if ($this->hasObservaciones()) array_push($messages, $this->getObservaciones());

        return $messages;
    }
}

