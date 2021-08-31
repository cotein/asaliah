<?php

namespace App\Src\Meli;

use GuzzleHttp\Client;
use App\Src\Meli\MiMeli;
use Kolovious\MeliSocialite\Facade\Meli;


class MeliShipments extends MiMeli
{
    //https://api.mercadolibre.com/sites/MLB/shipping_options?zip_code_from=01310909&zip_code_to=01310909&dimensions=16x16x16,1500

    const URL_BASE = 'https://api.mercadolibre.com/sites/MLA/shipping_options?';

    const ZIP_CODE_FROM = 'zip_code_from=1100';
    
    const ZIP_CODE_TO = '&zip_code_to=';
    
    const URL_END = '&dimensions=16x16x16,1500';

    const GET = 'GET';
    
    const POST = 'POST';

    private $client;
    
    public function __construct()
    {
        $this->client = new Client([

            'base_uri' => self::URL_BASE,

            'timeout' => 2.0

        ]);
    }
    public function calculate_shipment($post_code)
    {
        $response = $this->client->request(self::GET, self::URL_BASE . self::ZIP_CODE_FROM . self::ZIP_CODE_TO . $post_code . self::URL_END);

        return $response->getBody()->getContents();
    }
}
