<?php

namespace App\Src\Meli;

use App\Src\Meli\MiMeli;
use Kolovious\MeliSocialite\Facade\Meli;


class MeliOrders extends MiMeli
{
    /**
     * Retorna el historias de las notificaciones
     */
    public function myfeeds($token, $app_id=null)
    {
        $params = [
        /**
        * test app_id 6886428381996727
        */
            'app_id' => $app_id
        ];
        
        return Meli::withToken($token)->get('/myfeeds/', $params);
    }

    /**
     * 
     * Devuelve órdenes de compras
     */
    public function orders_by_seller($token, $seller_id = null, $offset=0, $limit=50)
    {
        $params = [
            'seller' => $seller_id,
            'offset' => $offset,
            'limit' => $limit,
        ];
            
        return Meli::withToken($token)->get('/orders/search/', $params);
    }

    /* public function ordenes_por_seller_id($token, $params=[])
    {
        return Meli::withToken($token)->get('/orders/search/', $params);
    } */


    public function orders_recent($token, $seller_id, $offset=0, $limit=50)
    {
        $params = [
            'seller' => $seller_id,
            'offset' => $offset,
            'limit' => $limit,
        ];
        
        return Meli::withToken($token)->get('/orders/search/recent', $params);
    }

    public function order($token, $order_id = null)
    {
        $params = [
            
        ];
        
        //$order_id = '2213009013';
            
        return Meli::withToken($token)->get('/orders/' . $order_id, $params);
    }

    public function get_billing_info($token, $order_id)
    {

        return Meli::withToken($token)->get('/orders/' . $order_id . '/billing_info');
    }

    
}
