<?php

namespace App\Src\Afip\WS\Source;

use App\Src\Tools\StdClassTool;


class WSPUCManager
{
    const CUIT_LENGHT = 11;

    protected $wspuc05;
    
    protected $wspuc13;

    protected $dni;

    public function __construct($dni)
    {
        $this->dni = $dni;
        
        $this->wspuc05 = new WSPUC05(env('WSPUC_05_AFIP_ENVIRONMENT'));

        $this->wspuc13 = new WSPUC13(env('WSPUC_13_AFIP_ENVIRONMENT'));

    }

    public function isCUITorCUIL()
    {
        $dni = (string) $this->dni;

        if (strlen($dni) == self::CUIT_LENGHT) {
            return true;
        }

        return false;
    }

    public function getPersona()
    {
        if ($this->isCUITorCUIL()) {

            $result = $this->wspuc05->getPersona($this->dni);

            return $result;
        }

        $result = $this->wspuc13->getPersonaByDocumento($this->dni);

        return $result;
    }
}
