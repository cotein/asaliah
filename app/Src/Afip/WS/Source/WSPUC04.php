<?php namespace App\Src\Afip\WS\Source;

use App\Src\Afip\WS\Source\WSBase;
use App\Src\Afip\Traits\WSPadronTrait;

class WSPUC04 extends WSBase{

    use WSPadronTrait;
    
    const NAME = 'ws_sr_padron_a4';
    /*
    * Constructor
    */
    public function __construct() 
    {
        parent::__construct(self::NAME, self::WSPUC4_TESTING);
    }
           
    public function isActive($result)
    {
        $persona = $result['personaReturn']['persona'];

        if($persona['estadoClave'] == 'ACTIVO'){
            return true;
        }

        return false;
    }

} // class

?>
