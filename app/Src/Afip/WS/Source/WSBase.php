<?php namespace App\Src\Afip\WS\Source;

use App\Src\Models\Afip;
use Jenssegers\Date\Date;
use Illuminate\Support\Facades\Log;
use App\Exceptions\Afip\OwnerSoapFaultException;


abstract class WSBase {

    #### WSAA ####
    const WSAA_TESTING = 'https://wsaahomo.afip.gov.ar/ws/services/LoginCms';
    const WSAA_PRODUCTION = 'https://wsaa.afip.gov.ar/ws/services/LoginCms';
    
    #### WSPUC4 ####
    const WSPUC4_TESTING = "https://awshomo.afip.gov.ar/sr-padron/webservices/personaServiceA4?WSDL";
    const WSPUC4_PRODUCTION = "https://aws.afip.gov.ar/sr-padron/webservices/personaServiceA4?WSDL";

    #### WSPUC5 ####
    const WSPUC5_TESTING = "https://awshomo.afip.gov.ar/sr-padron/webservices/personaServiceA5?WSDL";
    const WSPUC5_PRODUCTION = "https://aws.afip.gov.ar/sr-padron/webservices/personaServiceA5?WSDL";

    #### WSPUC13 ####
    const WSPUC13_TESTING = "https://awshomo.afip.gov.ar/sr-padron/webservices/personaServiceA13?WSDL";
    const WSPUC13_PRODUCTION = "https://aws.afip.gov.ar/sr-padron/webservices/personaServiceA13?WSDL";

    #### WSFEV1 ####
    const WSFEV1_TESTING = 'https://wswhomo.afip.gov.ar/wsfev1/service.asmx?WSDL';
    const WSFEV1_PRODUCTION = 'https://servicios1.afip.gov.ar/wsfev1/service.asmx?WSDL';
    
    #### WSFECRED ####
    const WSFECRED_TESTING = 'https://fwshomo.afip.gov.ar/wsfecred/FECredService?wsdl';
    const WSFECRED_PRODUCTION = 'https://serviciosjava.afip.gob.ar/wsfecred/FECredService?wsdl';

    public $client;

    /**
     * Le asigno el token que viene 
     * de wsaa get_token
     */
    public $token;

    /**
     * Le asigno el token que viene 
     * de wsaa get_sigm
     */
    public $sign;

    public $afip;
    
    public $afip_params;

    public $web_services;

    //protected $cuit = 27341817876; //MAGU
    //protected $cuit = 30714227803; //PIAMOND
    //protected $cuit = 20080767944; //PIAMOND
    //protected $cuit = 20080767944;
    protected $cuit;
    protected $cuitRepresentada;
    //protected $cuitRepresentada = 27341817876; //MAGU
    //protected $cuitRepresentada = 30714227803; //PIAMOND
    //protected $cuitRepresentada = 20080767944; //PIAMOND

    protected $testingOrProductionWSDL;

    protected $Auth;
    // MAGU PRODUCTION//
    /* protected $CertificadoProduction = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR. '..'.DIRECTORY_SEPARATOR.'Certificados'.DIRECTORY_SEPARATOR.'Produccion'.DIRECTORY_SEPARATOR.'27341817876_produccion.crt';
    protected $PrivadaKeyProduction = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Certificados'.DIRECTORY_SEPARATOR.'Testing'.DIRECTORY_SEPARATOR.'MaguPrivada.key';
      */
    // MAGU TESTING//
   /*  protected $CertificadoTesting = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR. '..'.DIRECTORY_SEPARATOR.'Certificados'.DIRECTORY_SEPARATOR.'Testing'.DIRECTORY_SEPARATOR.'Magu20200526';
    protected $PrivadaKeyTesting = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Certificados'.DIRECTORY_SEPARATOR.'Testing'.DIRECTORY_SEPARATOR.'MaguPrivada.key';
     */
    // PIAMOND PRODUCTION//
    protected $CertificadoProduction = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR. '..'.DIRECTORY_SEPARATOR.'Certificados'.DIRECTORY_SEPARATOR.'Produccion'.DIRECTORY_SEPARATOR.'30714227803_20200901.crt';
    protected $PrivadaKeyProduction = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Certificados'.DIRECTORY_SEPARATOR.'Produccion'.DIRECTORY_SEPARATOR.'Piamond_privada_20200901'; 
     
    //PIAMOND TESTING//
    protected $CertificadoTesting = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR. '..'.DIRECTORY_SEPARATOR.'Certificados'.DIRECTORY_SEPARATOR.'Testing'.DIRECTORY_SEPARATOR.'Piamond20200708.crt';
    protected $PrivadaKeyTesting = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Certificados'.DIRECTORY_SEPARATOR.'Testing'.DIRECTORY_SEPARATOR.'MiClavePrivada.key';
    
    protected $TA = __DIR__. DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Xml'.DIRECTORY_SEPARATOR.'TA.xml';

    protected $TRA = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR. '..' .DIRECTORY_SEPARATOR. 'Xml'.DIRECTORY_SEPARATOR.'TRA.xml';

    protected $TRA_TMP = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..' .DIRECTORY_SEPARATOR.'Xml'.DIRECTORY_SEPARATOR.'TRA.tmp';

    protected $WsaaWsdlProduction = __DIR__.DIRECTORY_SEPARATOR. '..' . DIRECTORY_SEPARATOR . 'Wsdl' . DIRECTORY_SEPARATOR . 'wsaa_produccion.wsdl';
    
    protected $WsaaWsdlTesting = __DIR__.DIRECTORY_SEPARATOR. '..' . DIRECTORY_SEPARATOR . 'Wsdl' . DIRECTORY_SEPARATOR . 'wsaa_homo.wsdl';
    
    protected $requestLoginCms = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..' .DIRECTORY_SEPARATOR.'Xml'.DIRECTORY_SEPARATOR.'request-loginCms.xml';

    protected $responseLoginCms = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..' .DIRECTORY_SEPARATOR.'Xml'.DIRECTORY_SEPARATOR.'response-loginCms.xml';
    
    public function __construct($service, $wsdl)
    {
        $this->cuit = env('WSBASE_CUIT');
        $this->cuitRepresentada = env('WSBASE_CUIT_REPRESENTADA');
        //dd($service, $wsdl);
        $this->testingOrProductionWSDL = self::testingOrProductionWSDL($wsdl);
        
        ini_set("soap.wsdl_cache_enabled", "0"); 
        ini_set('soap.wsdl_cache_ttl',0);
        
        Log::error("WSBASE  " . $service . ' - ' . $this->testingOrProductionWSDL );

        if (! Afip::where('ws', $service)
                ->where('active', true)
                ->where('environment', $this->testingOrProductionWSDL)
                ->exists()
            ) {
            
            $this->create_TA($service);

            sleep(1);

            $this->afip = new Afip;
            $this->afip->ws = $service;
            $this->afip->unique_id = $this->get_unique_id();
            $this->afip->generation_time = $this->get_generationTime();
            $this->afip->expiration_time = $this->get_expirationTime();
            $this->afip->token = $this->get_Token();
            $this->afip->sign = $this->get_sign();
            $this->afip->environment = $this->testingOrProductionWSDL;  
            $this->afip->active = true;
            $this->afip->save();

        }else{

            $this->afip = Afip::where('ws', $service)->where('environment', $this->testingOrProductionWSDL)->where('active', true)->get()->first();

            if (! $this->afip->isActive()) {

                $this->afip->active = false;
                $this->afip->save();

                $this->create_TA($service);

                sleep(1);

                $this->afip = new Afip;
                $this->afip->ws = $service;
                $this->afip->unique_id = $this->get_unique_id();
                $this->afip->generation_time = $this->get_generationTime();
                $this->afip->expiration_time = $this->get_expirationTime();
                $this->afip->token = $this->get_Token();
                $this->afip->sign = $this->get_sign();
                $this->afip->environment = $this->testingOrProductionWSDL;
                $this->afip->active = true;
                $this->afip->save();
            }
            
        }

        $this->token = $this->afip->token;

        $this->sign = $this->afip->sign;
        
        Log::info('#########################################');

        Log::info('$this->afip->token ' . $this->afip->token);

        Log::info('$this->afip->sign ' . $this->afip->sign);
        
        Log::info('WSDL :  ' . $wsdl);
        
        Log::info('#########################################');

        $this->Auth = [
            'Token' => $this->token,
            'Sign'  => $this->sign,        
            //'Cuit'  => ($this->testingOrProductionWSDL == 'TESTING') ? '20083103818'/* '20008721123' */ : $this->cuit,
            'Cuit'  => $this->cuit
        ];

        try {
            $this->client = new \SoapClient($wsdl);
        } catch (\Exception $e) {
            Log::error("Error en try catch WSBASE" . $e->getMessage() . ' - ' . $e->getCode() . ' WsbService : ' . $wsdl);
            activity("Error")->withProperties(
                [
                    'Message' => $e->getMessage(), 
                    'Code' => $e->getCode()
                ]
                )->log('WSBASE');
            return response()->json('Error en el constructor de WSBASE', 431);
        }
    }

    public static function testingOrProductionWSDL($i)
    {
        $class = new \ReflectionClass(__CLASS__);

        $constants = $class->getConstants();

        $constName = null;

        foreach ( $constants as $name => $value )
        {
            if ( $value == $i )
            {
                $constName = $name;
                break;
            }
        }
        
        $arr = explode ("_", $constName); 

        return $arr[1];
    }
   
    /**
     * Abre el archivo de TA xml,
     * si hay algun problema devuelve false
     */
    public function openTA()
    {
        $this->TA = simplexml_load_file($this->TA);

        return $this->TA == false ? false : true;
    }

    /**
     * Crea el archivo xml de TRA
     * $service - se reemplaza por el ws que se desea usar
     */
    public  function create_TRA($service)
    {
        $TRA = new \SimpleXMLElement(
            '<?xml version="1.0" encoding="UTF-8"?>' .
            '<loginTicketRequest version="1.0">'.
            '</loginTicketRequest>');
        $TRA->addChild('header');
        $TRA->header->addChild('uniqueId', date('U'));
        $TRA->header->addChild('generationTime', date('c',date('U')-60));
        $TRA->header->addChild('expirationTime', date('c',date('U')+60));
        $TRA->addChild('service', $service);
        $TRA->asXML($this->TRA);
    }

    public function get_service()
    {
        $TRA = simplexml_load_file($this->TRA);

        return $TRA->service;
    }
      
    public  function sign_TRA()
    {
        $STATUS = openssl_pkcs7_sign(
            $this->TRA,
            $this->TRA_TMP,
            file_get_contents(($this->testingOrProductionWSDL == 'PRODUCTION' ? $this->CertificadoProduction : $this->CertificadoTesting) ),
            [
                file_get_contents(($this->testingOrProductionWSDL == 'PRODUCTION' ? $this->PrivadaKeyProduction : $this->PrivadaKeyTesting)), ''
            ],
            [],
            !PKCS7_DETACHED
        );
        
        if (!$STATUS)
            throw new \Exception("ERROR generating PKCS#7 signature");
        
        $inf = fopen($this->TRA_TMP, "r");
        $i = 0;
        $CMS = "";
        while (!feof($inf)) { 
            $buffer = fgets($inf);
            if ( $i++ >= 4 ) $CMS .= $buffer;
        }
        fclose($inf);
        //---## BORRO EL TEMPORAL ##---//
        unlink($this->TRA_TMP);
        return $CMS;
    }
    
    
    public  function call_WSAA($cms)
    {
        $path= getcwd();
        $client = new \SoapClient(($this->testingOrProductionWSDL == 'PRODUCTION' 
            ? "file://".$this->WsaaWsdlProduction 
            : "file://".$this->WsaaWsdlTesting), 

            [
                'cache_wsdl'  => WSDL_CACHE_NONE,
                'soap_version'  => SOAP_1_2,
                'location'      => ($this->testingOrProductionWSDL == 'PRODUCTION' 
                                    ? self::WSAA_PRODUCTION 
                                    : self::WSAA_TESTING),
                'trace'         => 1,
                'exceptions'    => 0
            ]
        );     
        $results = $client->loginCms(array('in0' => $cms));

        file_put_contents(
            $this->requestLoginCms, 
            $client->__getLastRequest()
        );
        file_put_contents(
            $this->responseLoginCms,
            $client->__getLastResponse()
        );
    
        if (is_soap_fault($results)) 
            throw new OwnerSoapFaultException("SOAP Fault: ".$results->faultcode.' : '.$results->faultstring);
        
        return $results->loginCmsReturn;
    }
    
    /*
    * Convertir un XML a Array
    */
    public  function xml2array($xml) {    

        $json = json_encode( simplexml_load_string($xml));

        return json_decode($json, TRUE);
    }    
    
    public function create_TA($web_services)
    {
        $this->create_TRA($web_services);
        
        $CMS=$this->sign_TRA();
        
        $TICKET=$this->call_WSAA($CMS);

        if (!file_put_contents($this->TA, $TICKET))
            throw new \Exception("Error al generar al archivo TA.xml");

        return true;
    }

    public function get_unique_id()
    {
        $TA_file = file($this->TA, FILE_IGNORE_NEW_LINES);
        $TA_xml = '';
        for($i=0; $i < sizeof($TA_file); $i++)
            $TA_xml.= $TA_file[$i];  

            $TA = $this->xml2Array($TA_xml);
            $uniqueId = $TA['header']['uniqueId'];

        return $uniqueId;
    }
    
    public function get_expirationTime()                   
    {    
        $TA_file = file($this->TA, FILE_IGNORE_NEW_LINES);
        $TA_xml = '';
        for($i=0; $i < sizeof($TA_file); $i++)
            $TA_xml.= $TA_file[$i];  

            $TA = $this->xml2Array($TA_xml);
            $expirationTime = $TA['header']['expirationTime'];

        return $expirationTime;
    }

    public function get_generationTime()                   
    {    
        $TA_file = file($this->TA, FILE_IGNORE_NEW_LINES);
        $TA_xml = '';
        for($i=0; $i < sizeof($TA_file); $i++)
            $TA_xml.= $TA_file[$i];  

            $TA = $this->xml2Array($TA_xml);
            $generationTime = $TA['header']['generationTime'];

        return $generationTime;
    }

    public function get_Token()
    {
        $TA_file = file($this->TA, FILE_IGNORE_NEW_LINES);
        $TA_xml = '';
        for($i=0; $i < sizeof($TA_file); $i++)
            $TA_xml.= $TA_file[$i];  

            $TA = $this->xml2Array($TA_xml);
            $token = $TA['credentials']['token'];

        return $token;
    }

    public function get_sign()
    {
        $TA_file = file($this->TA, FILE_IGNORE_NEW_LINES);
        $TA_xml = '';
        for($i=0; $i < sizeof($TA_file); $i++)
        $TA_xml.= $TA_file[$i];  

        $TA = $this->xml2Array($TA_xml);
        $sign = $TA['credentials']['sign'];

        return $sign;
    }

    public function is_validTA()
    {
        $c =  new Date;
        $expirationTime = $c->parse($this->get_expirationTime());
        $currentTime    = $c->parse($c->now());

        if (strtotime($currentTime) >= strtotime($expirationTime)) {
            return false;
        }
        
        return true; 
    }

    /**
     * M�todo de prueba del WS
     */
    public function dummy()
    {
        return $this->client->dummy();
    }

    /**
     * devuelve las funciones del webservices
     * @return [type] [description]
     */
    public function getFunctions()
    {
        return $this->client->__getFunctions();
    }

    public function getTypes()
    {
        return $this->client->__getTypes();
    }

}

?>
