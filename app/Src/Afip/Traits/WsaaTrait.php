<?php namespace App\Src\Afip\Traits; 
	use Carbon\Carbon as Carbon;

	trait WsaaTrait
	{
		//const WSAA_TESTING = 'https://wsaahomo.afip.gov.ar/ws/services/LoginCms';
		//const WSAA_PRODUCCION = 'https://wsaa.afip.gov.ar/ws/services/LoginCms';

		protected $TA = __DIR__.'/../Xml/TA.xml';

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
		    //---## GUARDA EL XML EN APP/SRC/AFIP/XML ##---//
		    $TRA->asXML(__DIR__.'/../Xml/TRA.xml');
		  }
		  
		 /**
		  * [sign_TRA description]
		  * @return [type] [description]
		  */
		  public  function sign_TRA()
		  {
		   /*  $STATUS = openssl_pkcs7_sign(
		    	__DIR__.'/../Xml/TRA.xml', 
		    	__DIR__.'/../Tmp/TRA.tmp',
		    	"file://".__DIR__.'/../Certificados/Produccion/PiamondSA.crt',
		      array(
		      	"file://".__DIR__.'/../Certificados/Privada.key', ''),
		      array(),
		      !PKCS7_DETACHED
		    ); */
		    
		    if (!$STATUS)
		      throw new \Exception("ERROR generating PKCS#7 signature");
		      
		    $inf = fopen(__DIR__.'/../Tmp/TRA.tmp', "r");
		    $i = 0;
		    $CMS = "";
		    while (!feof($inf)) { 
		        $buffer = fgets($inf);
		        if ( $i++ >= 4 ) $CMS .= $buffer;
		    }
		    fclose($inf);
		    //---## BORRO EL TEMPORAL ##---//
		    unlink(__DIR__.'/../Tmp/TRA.tmp');
		    return $CMS;
		  }
		  
		  /**
		   * Conecta con el web service y obtiene el token y sign
		   * TESTING: https://wsaahomo.afip.gov.ar/ws/services/LoginCms
		   * PRODUCCION: https://wsaa.afip.gov.ar/ws/services/LoginCms
		   */
		  
		  public  function call_WSAA($cms)
		  {
		    $path= getcwd();
		    $client = new \SoapClient("file://".__DIR__.'/../Wsdl/wsaa_produccion.wsdl', 
		    	array(
			          'soap_version'   => SOAP_1_2,
			          //'location'       => 'https://wsaahomo.afip.gov.ar/ws/services/LoginCms',
			          'location'       => 'https://wsaa.afip.gov.ar/ws/services/LoginCms',
			          'trace'          => 1,
			          'exceptions'     => 0
		        )
		    );     
		    $results = $client->loginCms(array('in0' => $cms));
		    // para logueo
		    file_put_contents(
		    	__DIR__.'/../Xml/request-loginCms.xml', 
		    	$client->__getLastRequest()
		    );
		    file_put_contents(
		    	__DIR__.'/../Xml/response-loginCms.xml',
		    	$client->__getLastResponse()
		    );
		  
		    if (is_soap_fault($results)) 
		      throw new Exception("SOAP Fault: ".$results->faultcode.': '.$results->faultstring);
		      
		    return $results->loginCmsReturn;
		  }
		  
		  /*
		   * Convertir un XML a Array
		   */
		  public  function xml2array($xml) {    
		    $json = json_encode( simplexml_load_string($xml));
		    return json_decode($json, TRUE);
		  }    
		  
		  /**
		   * funcion principal que llama a las demas para generar el archivo TA.xml
		   * que contiene el token y sign
		   */
		  public function create_TA($ws)
		  {
			  	$this->create_TRA($ws);
				$CMS=$this->sign_TRA();
				$TICKET=$this->call_WSAA($CMS);

			    if (!file_put_contents(__DIR__.'/../Xml/TA.xml', $TICKET))
			      throw new Exception("Error al generar al archivo TA.xml");
			    //$this->TA = $this->xml2Array($TA);
			    return true;
		  }
		  
		  /**
		   * Obtener la fecha de expiracion del TA
		   * si no existe el archivo, devuelve false
		   */
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

		  /**
		   * [get_Token description]
		   * @param  string $value [description]
		   * @return [type]        [description]
		   */
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

		  /**
		   * comprueba si existe el XML TA
		   * @return boolean [description]
		   */
		  public function exist_TA()
		  {
		  	 if (file_exists($this->TA)) {
		  	 	return true;
		  	 }
		  	 return false;
		  }

		  /**
		   * [is_validTA Si es true crea un nuevo TA]
		   * @return boolean [description]
		   */
		  public function is_validTA()
		  {
		    $c =  new Carbon;
		    $expirationTime = $c->parse($this->get_expirationTime());
		    $currentTime    = $c->parse($c->now());
		    //return strtotime($currentTime);
		    if (strtotime($currentTime) >= strtotime($expirationTime)) {
		    	//---## Devuelve false entonces quiere decir que el archivo 
		    	//---## ya no es válido. Hay que generar uno nuevo
		        return false;
		     }
		     return true; 
		  }

	}

 ?>