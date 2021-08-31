<?php

namespace App\Transformers\Publications;

use App\Src\Models\Product;
use App\Src\Models\Variation;
use App\Src\Traits\MoneyFormatTrait;
use League\Fractal\TransformerAbstract;
use App\Src\Traits\PublicationTransformerTrait;

class PublicationProductTransformer extends TransformerAbstract
{
    use MoneyFormatTrait, PublicationTransformerTrait;

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function variation(Variation $variation)
    {
        $pics = $variation->product->pictures->map(function($img){
            return $img->meli_id;
        })->toArray();

        return [
            [
                "price"=> $variation->product->sale_price + ($variation->product->sale_price * (float) $variation->product->iva['percentage'] / 100),
                "iva" => $variation->product->iva,
                "attributes"=> $this->variationAttributes($variation->attributes),
                "product_id" => $variation->product_id,
                "picture_ids"=> $pics,
                "available_quantity"=> $variation->stock->available_quantity_meli,
                "seller_custom_field" => $variation->seller_custom_field,
                "attribute_combinations"=> $variation->attribute_combinations,
                "stock" => $variation->stock->total_stock
            ]
        ];
    }

    public function transform(Variation $variation)
    {
        
        return  [
            "title"=>$variation->product->name,
            "category_id"=>$variation->product->children_category['id'],
            "price"=> $this->CurrencyToMySqlFormat($variation->product->price),
            "currency_id"=>"ARS",
            //"available_quantity"=> 2,
            "buying_mode"=>$variation->product->buying_mode['name'],
            "listing_type_id"=>$variation->product->listing_type['id'],
            "description"=> [
                'plain_text'=>$variation->product->description
            ],
            //"video_id"=> "YOUTUBE_ID_HERE",
            "attributes"=> $this->attributes($variation->product->attributes), 
            "seller_custom_field" => $variation->product->seller_custom_field,
            "sale_terms"=>[],
            "pictures"=> $this->pictures($variation->product->pictures),
            "variations" => $this->variation($variation)
        ];
    }
}
