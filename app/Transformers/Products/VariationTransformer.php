<?php

namespace App\Transformers\Products;

use App\Src\Traits\MoneyFormatTrait;
use League\Fractal\TransformerAbstract;
use App\Src\Traits\PublicationTransformerTrait;

class VariationTransformer extends TransformerAbstract
{
    use MoneyFormatTrait, PublicationTransformerTrait;
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform($product)
    {
        dd($product);
        return  
        [
            [
                "price"=> $this->CurrencyToMySqlFormat($product['sale_price']),
                "seller_custom_field" => $product['code'],
                "available_quantity"=> $product['available_quantity'],
                "sold_quantity" => 10,
                "attribute_combinations"=> $this->attributeCombinations($product['variation']['attribute_combinations']),
                "attributes"=> $this->variationAttributes($product['variation']['attributes']) ,
                "picture_ids"=> 
                [
                    "https://images.unsplash.com/photo-1504285519797-3b0349c4c170?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjcwNjE0fQ",
                    "https://images.unsplash.com/photo-1522868434605-f46cec3fe584?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjcwNjE0fQ",
                    "https://images.unsplash.com/photo-1517553671890-501b4f29ea61?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjcwNjE0fQ"
                ], 
            ]
        ];
    }
}
