<?php

namespace App\Src\Traits;

use App\Src\Meli\MeliPictures;

/**
 * 
 */
trait PublicationTransformerTrait
{
    public function picturesIds($pictures)
    {
        return collect($pictures)->map(function($p){
            return $p;
        })->toArray();
    }

    public function pictures($pictures)
    {
        return collect($pictures)->map(function($p){
            return [
                'source' => (string) $p
            ];
        })->all();
        
    }
    
    public function price($price)
    {
        return $this->CurrencyToMySqlFormat($price);
    }

    public function attributeCombinations($attribute_combinations)
    {
        return [ 
            [   
                "id"=> 'color',
                "value_id"=> $attribute_combinations['color']['id'],
                "value_name"=> $attribute_combinations['color']['name']
            ],
        ];
        return collect($attribute_combinations)->map(function($i, $key){
            
        })->values()->all();
    }

    public function attributes($attributes)
    {
        return collect($attributes)->map(function($i, $key){
            return [ 
                "id"=> $i['id'],
                "value_id"=> (string)$i['value_id'],
                "value_name"=>$i['value_name']
            ]; 
        })->all();
        
    }

    public function variationAttributes($attributes)
    {
        return collect($attributes)->map(function($a){
            return $a;
        })->toArray();
    }

    public function enable_publish_button($total, $quantity)
    {
        if (($total + $quantity) == $quantity ) {
            return true;
        }

        return false;
    }
    
    public function variation_format($variations, $selected_variation)
    {
        $v = collect($variations);
        $ps = null;
        return $v->map(function($item, $key) use($selected_variation, $ps){
            if ($key == 0) {
                $ps= $item['picture_ids'];
            }
            if ($selected_variation->variation_number == $item['variation_number']) {
                return [
                    "price"=> $item['price'],
                    "status" => $this->enable_publish_button($selected_variation->available_total, $selected_variation->available_quantity),
                    "attributes"=> $this->variationAttributes($item['attributes']),
                    "product_id" => $item['product_id'],
                    //"picture_ids"=> $ww->process_pictures(auth()->user()->company->mercadoLibre->meli_token),
                    "picture_ids"=> $this->picturesIds($ps),
                    "available_total"=> $selected_variation->available_total,
                    "available_quantity"=> $selected_variation->available_quantity,
                    "variation_number"=> $selected_variation->variation_number,
                    "sold_quantity"=> $item['sold_quantity'],
                    "seller_custom_field" => $item['seller_custom_field'],
                    "attribute_combinations"=> $item['attribute_combinations'],
                ];
            }
        })->filter(function($i){
            return $i != null;
        })->values()->all(); 
    }
}
