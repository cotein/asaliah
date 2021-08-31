<?php namespace App\Src\Afip\WS\Source;

use App\Src\Models\Cliente;
use App\Src\Afip\WS\Source\WSBase;
use App\Src\Afip\WS\Source\WSFEV1Manager;
use App\Src\Comprobantes\ComprobanteVenta;

use App\Src\Afip\Traits\WSFETrait;

class WSFEV1 extends WSBase {

    use WSFETrait;
    
    const NAME = 'wsfe';

    const CANT_REG = 1;
    
    /**
     * PTO_VTA
     * //TODO poner en ddbb
     * Luego se configurará del AdminDashBoard
     */
    const PTO_VTA = 1;

    const FACTURA_B = 6;
    
    protected $wsfev1_manager;

    public function __construct($environment) 
    {
        if ($environment === 'testing' || $environment === 't') {
            $WSFEV1 = self::WSFEV1_TESTING;
        }

        if ($environment === 'production' || $environment === 'p'){
            $WSFEV1 = self::WSFEV1_PRODUCTION;
        }

        parent::__construct(self::NAME, $WSFEV1);
    }
  
}

?>
