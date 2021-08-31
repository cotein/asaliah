<?php

namespace App\Src\Meli;

use App\Src\Meli\MiMeli;
use Kolovious\MeliSocialite\Facade\Meli;
use GuzzleHttp\Client;

class MeliMessage extends MiMeli
{
    public function publish_message($data)
    {
        $client = new Client([

            'base_uri' => 'https://api.mercadolibre.com',

            'timeout' => 2.0

        ]);

        $token = auth()->user()->company->mercadoLibre->meli_token;

        $url = '/messages/packs/'.$data['pack_id'] .'/sellers/' . $data['seller'] . '?access_token='.$token;

        $response = $client->request('POST', $url, [
            'headers' => [
                'cache-control: no-cache',
                'content-type: application/json'
            ],
            'json'    => [
                'from' => [
                    "user_id"=> $data['seller'],
                    "email" =>  $data['from_email']
                ],
                'to' => [
                    'user_id' => $data['to_user_id']
                ],
                'text' => $data['message']
            ],
        ]);

        return $response->getBody()->getContents();
    }

    public function get_messages_by_order($order_id)
    {
        $client = new Client([

            'base_uri' => 'https://api.mercadolibre.com',

            'timeout' => 2.0

        ]);

        $token = auth()->user()->company->mercadoLibre->meli_token;

        $url = '/messages/orders/'.$order_id . '?access_token=' . $token;

        $response = $client->request('POST', $url, [
            'headers' => [
                'cache-control: no-cache',
                'content-type: application/json'
            ],
            
        ]);

        return $response->getBody()->getContents();
    }
}
