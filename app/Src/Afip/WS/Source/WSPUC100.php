<?php namespace App\Src\Afip\WS\Source;

use App\Src\Afip\Wsdl\WSBase;
use App\Src\Models\Company;
use App\Src\Models\Cliente;
use App\Src\Comprobantes\ComprobanteVenta;
 
class WSPUC100 extends WSBase{

      const WSPUC100_TESTING = "https://awshomo.afip.gov.ar/sr-parametros/webservices/parameterServiceA100?WSDL"; // testing
      const WSPUC100_PRODUCTION =  __DIR__.DIRECTORY_SEPARATOR.'wspuc100.wsdl'; // production

      /*
       * Constructor
       */
      public function __construct() 
      {
          // seteos en php
          ini_set("soap.wsdl_cache_enabled", "0"); 

          $this->client = new \SoapClient(self::WSPUC100_PRODUCTION);
          //$this->client = new \SoapClient(self::WSPUC_TESTING);
           
          $this->token = $this->get_Token();

          $this->sign = $this->get_sign();

          $this->Auth = [
              'Token' => $this->token,
              'Sign'  => $this->sign,
              'Cuit'  => $this->cuit
          ];
      }
           
      
      public function getParameterCollectionByName($tabla)
      {

          $consulta =  [
              'token' => $this->token,
              'sign'  => $this->sign,
              'cuitRepresentada'  => $this->cuitRepresentada,
              'collectionName'    => $tabla 
          ];


          try
          {
            $result = $this->client->getParameterCollectionByName($consulta);

            if (is_soap_fault($result)) {
                return response()->json($result, 500);
            }

            $r =  json_decode(json_encode($result), true);
            return $r;
          }
          catch (\SoapFault $e)
          {
              $response = json_decode(json_encode($e->getMessage(), true));
              return ['error' => $response];
          }
          catch (\Exception $e)
          {
              $response = json_decode(json_encode($e->getMessage(), true));
              return ['error' => $response];
          }
          
      }

} // class

?>
