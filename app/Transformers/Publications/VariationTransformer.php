<?php

namespace App\Transformers\Publications;

use App\Src\Models\Variation;
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
    public function transform(Variation $variation)
    {
        /* if (app()->environment('production')) {
            $pics = $variation->product->getMedia('variations')->map(function($image){
                return $image->getFullUrl();
            })->toArray(); 
        }
        
        if (app()->environment('local')) {
            $pics = $variation->product->getMedia('variations')->map(function($i){
                return 'https://images.unsplash.com/photo-1504285519797-3b0349c4c170?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjcwNjE0fQ';
            })->toArray(); 
        } */

        $pics = $variation->product->pictures->map(function($img){
            return $img->meli_id;
        })->toArray();

        return [
            [
                "price"=> $variation->product->sale_price,
                "attributes"=> $this->variationAttributes($variation->attributes),
                "product_id" => $variation->product_id,
                "picture_ids"=> $pics,
                "available_quantity"=> $variation->stock->available_quantity_meli,
                "seller_custom_field" => $variation->seller_custom_field,
                "attribute_combinations"=> $variation->attribute_combinations,
            ]
        ];
    }
}
