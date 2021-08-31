<?php namespace App\Src\Afip\WS\Source;

use App\Src\Afip\WS\Source\WSBase;
use Illuminate\Support\Facades\Log;
use App\Src\Afip\Traits\WSPadronTrait;

class WSPUC05 extends WSBase{

    const NAME = 'ws_sr_padron_a5';

    use WSPadronTrait;
    
    public function __construct($environment) 
    {
        if ($environment === 'testing' || $environment === 't') {
            $this->web_services = self::WSPUC5_TESTING;
        }
        
        if ($environment === 'production' || $environment === 'p'){
            $this->web_services = self::WSPUC5_PRODUCTION;
        }
        Log::error('WSPUC05->__construct ' . $environment . ' - ' . self::NAME . ' - ' . $this->web_services);
        
        parent::__construct(self::NAME, $this->web_services);
    }
        
} 

?>
