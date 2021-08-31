<?php

namespace App\Src\Afip\WS\Responses;

use App\Src\Afip\WS\Responses\AfipResponse;
use App\Src\Afip\WS\Responses\AfipResponseContract;

class WSFEUltimoAutorizadoResponse extends AfipResponse implements AfipResponseContract
{
    /** 
     * @return bool 
     */
    public function hasErrors()
    {
        if (array_key_exists('Errors', $this->response['FECompUltimoAutorizadoResult'])) {
            
            return true;
        }

        return false;
    }

    public function hasEvents()
    {
        if (array_key_exists('Events', $this->response['FECompUltimoAutorizadoResult'])) {
            
            return true;
        }

        return false;
    }

    public function hasObservaciones()
    {
        if (array_key_exists('Observaciones', $this->response['FECompUltimoAutorizadoResult'])) {
            
            return true;
        }

        return false;
    }

    public function getErrors()
    {
        return collect($this->response['FECompUltimoAutorizadoResult']['Errors']);
    }

    public function getEvents()
    {
        return collect($this->response['FECompUltimoAutorizadoResult']['Events']);
    }

    public function getObservaciones()
    {
        return collect($this->response['FECompUltimoAutorizadoResult']['Observaciones']);
    }

    public function getUltimoAutorizado()
    {
        return [
            'PtoVta' => $this->response['FECompUltimoAutorizadoResult']['PtoVta'],
            'CbteTipo' => $this->response['FECompUltimoAutorizadoResult']['CbteTipo'],
            'CbteNro' => $this->response['FECompUltimoAutorizadoResult']['CbteNro'],
        ];
    }
}
