<?php

namespace App\Src\Meli;

use App\Src\Meli\MiMeli;
use Kolovious\MeliSocialite\Facade\Meli;


class MeliVariations extends MiMeli
{
    
    public function add_new($token, $product, $variation)
    {
        $params = [
                        
        ];

        $body = null;

        return Meli::withToken($token)->post('items/' . $product->meli_id . '/variations', $variation, $params);
    }


    public function modify_available_quantity($token, $product_meli_id, $variation_id, $quantity)
    {
        $params = [
                        
        ];

        $variations = [
            "id" => $variation_id,
            "available_quantity" => $quantity
        ];

        return Meli::withToken($token)->put('items/' . $product_meli_id . '/variations/' .  $variation_id  , $variations, $params);
    }

    public function variations_from_publication($token, $item)
    {
        $params = [
                        
        ];

        $variations = [
            "id" => $variation_id,
            "available_quantity" => $quantity
        ];

        return Meli::withToken($token)->get('items/' . $item . '/variations/', null, $params);
    }

}
