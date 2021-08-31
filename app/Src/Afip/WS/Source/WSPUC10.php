<?php namespace App\Src\Afip\WS\Source;

  use App\Src\Afip\Wsdl\WSBase;
  use App\Src\Models\Company;
  use App\Src\Models\Cliente;
  use App\Src\Comprobantes\ComprobanteVenta;

  /**
   * @link http://www.afip.gob.ar/ws/ws_sr_padron_a4/manual_ws_sr_padron_a4_v1.1.pdf WS Specification
   */
class WSPUC10 extends WSBase{

      const WSPUC_TESTING = "https://awshomo.afip.gov.ar/sr-padron/webservices/personaServiceA10?WSDL"; // testing
      const WSPUC_PRODUCTION = "https://aws.afip.gov.ar/sr-padron/webservices/personaServiceA10?WSDL"; // production

      /*
       * Constructor
       */
      public function __construct() 
      {
          // seteos en php
          ini_set("soap.wsdl_cache_enabled", "0"); 

          $this->client = new \SoapClient(__DIR__ . DIRECTORY_SEPARATOR . 'personaServiceA5.wsdl');
          //$this->client = new \SoapClient(self::WSPUC_TESTING);
           
          $this->token = $this->get_Token();

          $this->sign = $this->get_sign();

          $this->Auth = [
              'Token' => $this->token,
              'Sign'  => $this->sign,
              'Cuit'  => $this->cuit
          ];
      }
           
      
      public function getPersona($cuit)
      {

          $consulta =  [
              'token' => $this->token,
              'sign'  => $this->sign,
              'cuitRepresentada'  => 20008721123,
              'idPersona'         => $cuit //cuit de ejemplo. sólo se puede probar con este cuit en homologación
          ];


          try
          {
            $result = $this->client->getPersona($consulta);

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
