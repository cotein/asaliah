<?php

namespace App\Transformers\PublicationHere;

use App\Src\Models\Product;
use App\Src\Traits\MoneyFormatTrait;
use League\Fractal\TransformerAbstract;
use App\Src\Traits\PublicationTransformerTrait;

class PublicationHereTransformer extends TransformerAbstract
{
    use MoneyFormatTrait, PublicationTransformerTrait;
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Product $product)
    {
        if (app()->environment('production')) {
            if($product->getMedia('products')->isEmpty()){
                $pics = $product->pictures->toArray();
            }else{
                $pics = $product->getMedia('products')->map(function($image){
                    return [
                        "size" => "331x500",
                        "quality" => "",
                        "max_size" => "1080x1630",
                        "url" =>  $image->getFullUrl(),
                        "secure_url" =>  $image->getFullUrl(),
                    ];
                })->toArray(); 
            }
        }
        
        if (app()->environment('local')) {
            if($product->getMedia('products')->isEmpty()){
                $pics = $product->pictures->toArray();
            }else{
                $pics = $product->getMedia('products')->map(function($i){
                    return [
                        "size" => "331x500",
                        "quality" => "",
                        "max_size" => "1080x1630",
                        "url" => 'https://images.unsplash.com/photo-1504285519797-3b0349c4c170?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjcwNjE0fQ',
                        "secure_url" => 'https://images.unsplash.com/photo-1504285519797-3b0349c4c170?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjcwNjE0fQ',
                    ];
                })->toArray(); 
            }
        }

        $variations = $product->variations->map(function($variation){
            return [
                'product_id' => $variation->product_id,
                'meli_id' => $variation->meli_id,
                'attribute_combinations' => $variation->attribute_combinations,
                'attributes' => $variation->attributes,
                'stock' => $variation->stock->total_stock,
            ];
        });

        $vars = collect($product->variations);

        $attribute_combinations = $vars->map(function($v){
            return $v->attribute_combinations;
        });

        $data_for_select = collect($attribute_combinations)->map(function($attr){
            return [
                'color_value_name' => (array_key_exists(0, $attr)) ? $attr[0]['value_name'] : null,
                'color_value_id' => (array_key_exists(0, $attr)) ? $attr[0]['value_id'] : null,
                'size_value_name' => (array_key_exists(1, $attr)) ? $attr[1]['value_name'] : null,
                'size_value_id' => (array_key_exists(1, $attr)) ? $attr[1]['value_id'] : null,
                '$isDisabled' => false,
            ];
        });

        return  [
            'id' => $product->id,
            "title"=>$product->name,   
            "category_id"=>$product->code,
            "price"=> $this->DisplayToUserCurrency($product->sale_price),
            "raw_price"=> $product->sale_price,
            "buying_mode"=>$product->buying_mode['name'],
            "listing_type_id"=>$product->listing_type['id'],
            "description"=> [
                'plain_text'=>$product->description
            ],
            'stock' => $product->total_stock(),
            "attributes"=> $this->attributes($product->attributes), 
            "seller_custom_field" => $product->seller_custom_field,
            "sale_terms"=>[],
            "pictures"=> $pics,
            "variations" => $variations,
            "colors" => $data_for_select,
            "sizes" => $data_for_select,
            'slug' => $product->slug,
            'brand_id' => $product->brand_id,
            'gender_id' => $product->gender_id,
            'type_shoes_id' => $product->type_shoes_id,
            'material_id' => $product->material_id,
            'activity_id' => $product->activity_id,
            'season_id' => $product->season_id,
        ];
    }
}
