<?php

namespace App\Src\Tests;

class VariationsMyOwnTest extends MyOwnTest
{
    public $variation;

    /* "price"=> 333,
    "seller_custom_field" => 'seller_custom_field_' . $key,
    "available_quantity"=> 5,
    "sold_quantity" => 0,
    "attribute_combinations"=> $this->attributeCombinations($item['attribute_combinations']),
    "attributes"=> $this->variationAttributes($item['attributes']) ,
    "picture_ids"=> $this->picturesIds($item['picture_ids']), 
    */

    public function __construct($variation)
    {
        $this->variation = $variation;
        
        parent::__construct();
    }

    public function modify_price($price = null)
    {   
        if (is_null($price)) {

            $this->variation['price'] = $this->faker->randomFloat(2,500,1500);

        }else{
            
            $this->variation['price'] = $price;

        }

        return $this;
    }

    public function modify_seller_custom_field()
    {
        $this->variation['seller_custom_field'] = $this->faker->randomNumber(5);

        return $this;
    }

    public function modify_sold_quantity()
    {
        $this->variation['sold_quantity'] = $this->faker->randomNumber(3);

        return $this;
    }

    public function modify_attribute_combinations()
    {
        $this->variation['attribute_combinations']['color']['id'] = '52008';
        $this->variation['attribute_combinations']['color']['name'] = 'Diego';
        $this->variation['attribute_combinations']['size']['id'] = '3189101';
        $this->variation['attribute_combinations']['size']['name'] = 'Diego';

        return $this;
    }

    public function modify_attributes()
    {
        //dd($this->variation);
        $a = collect($this->variation['attributes'])->map(function($item){
            return [ 
                "id"=> $item['id'],
                "value_id"=> (string)$item['value_id'],
                "value_name"=>$this->faker->text(15)
            ];
        })->values()->all();

        $this->variation['attributes'] = $a;

        //array_push($this->variation['attributes'], $a);

        return $this;
    }

    
}

