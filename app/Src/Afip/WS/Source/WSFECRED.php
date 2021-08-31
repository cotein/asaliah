<?php

namespace App\Src\Afip\WS\Source;

use App\Src\Afip\WS\Source\WSBase;
use App\Src\Afip\Traits\WSFECREDTrait;

class WSFECRED  extends WSBase
{
    public $montoDesde;
    
    use WSFECREDTrait;

    const NAME = 'wsfecred';

    public function __construct($environment) 
    {
        if ($environment === 'testing' || $environment === 't') {
            $WSFECRED = self::WSFECRED_TESTING;
        }

        if ($environment === 'production' || $environment === 'p'){
            $WSFECRED = self::WSFECRED_PRODUCTION;
        }

        parent::__construct(self::NAME, $WSFECRED);

        $this->afip_params = [
            'authRequest' => [
                'token' => $this->token,
                'sign' => $this->sign,
                'cuitRepresentada' => $this->cuitRepresentada
            ],
        ];
    }

    public function consultarMontoObligadoRecepcion($cuit, $date)
    {
        $this->afip_params['cuitConsultada'] = $cuit;
        $this->afip_params['fechaEmision'] = $date;

        return $this->client->consultarMontoObligadoRecepcion($this->afip_params);
    }
}
