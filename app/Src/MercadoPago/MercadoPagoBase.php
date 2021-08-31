<?php

namespace App\Src\MercadoPago;
use \MercadoPago\SDK;

use GuzzleHttp\Client;

class MercadoPagoBase
{
    const URL_BASE = 'https://api.mercadopago.com';

    const GET = 'GET';
    
    const POST = 'POST';
    
    const PUT = 'PUT';

    public $client;

    public $version_api_mp = '/v1';

    public $access_token;
    

    public function __construct()
    {
        $this->access_token = env('MERCADO_PAGO_ACCESS_TOKEN');

        $this->client = new Client([

            'base_uri' => self::URL_BASE,

            'timeout' => 2.0

        ]);
    }
   
}
