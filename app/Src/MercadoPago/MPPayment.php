<?php

namespace App\Src\MercadoPago;

use App\Src\MercadoPago\MercadoPagoBase;


class MPPayment extends MercadoPagoBase
{
    const PAYMENTS_URL = '/payments/';

    const TIME_OUT = 8;

    public function getPayment($id)
    {
        //$id = 23340219;

        $path = $this->version_api_mp . self::PAYMENTS_URL . $id .'?access_token=' . $this->access_token; 

        $response = $this->client->request(self::GET, $path);
        
        return $response->getBody()->getContents();
    }

    /**
     * limit = total de items a buscar
     * offset desde donde trae
     */
    public function paymentsSearch($limit = 100, $offset=0)
    {
        $path = $this->version_api_mp . self::PAYMENTS_URL . '/search' .'?access_token=' . $this->access_token . '&limit='. $limit . '&offset='. $offset; 

        $response = $this->client->request(self::GET, $path);
        
        return $response->getBody()->getContents();
    }

    public function createPayment($data)
    {
        $path = $this->version_api_mp . self::PAYMENTS_URL . '?access_token=' . $this->access_token; 
        //dd($data['items']);
        $payment = $this->client->request(self::POST, $path, [
            'timeout' => self::TIME_OUT,
            'json' => [
                "transaction_amount"=> (float) $data['amount'],
                "token"=> $data['token'],
                "installments"=> (int)$data['installments'],
                "description"=> $data['description'],
                "payment_method_id"=> $data['payment_method_id'],
                "payer"=> [
                    "email" => $data['email']
                ],
                'shipping_amount' => $data['shipping_amount'],
                'additional_info' =>[
                    "shipments"=> [
                        "receiver_address"=> [
                            "street_name"=> $data['street_name'],
                            "street_number"=> $data['street_number'],
                            "zip_code"=>$data['zip_code'],
                        ]
                    ],
                    'items' => $data['items']
                ]
            ]
        ]);

        return $payment->getBody()->getContents();

    }
}
