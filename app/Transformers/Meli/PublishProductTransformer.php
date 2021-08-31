<?php

namespace App\Transformers\Meli;

use Illuminate\Support\Str;
use App\Src\Traits\MoneyFormatTrait;
use League\Fractal\TransformerAbstract;

class PublishProductTransformer extends TransformerAbstract
{
    use MoneyFormatTrait;
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform($product)
    {
        $vs = collect($product['vs']);

        $variations = $vs->map(function($variation) use($product) {

            $attrs = collect($variation['attribute_combinations'])->map(function($i, $key){;
                //dd($i, $key);
                return [
                    "id" => strtoupper($key),
                    "value_id"=> $i['id'], 
                    "value_name"=> $i['name']
                ];
            })->values()->all();
            //dd($attrs);
            return [
                'attribute_combinations' => $attrs,
                'price' => $this->CurrencyToMySqlFormat($product['sale_price']),
                'available_total' => $variation['available_total'],
                'available_quantity' => $variation['available_quantity'],
                'sold_quantity' => $variation['sold_quantity'],
                'picture_ids' => [
                    "https://images.unsplash.com/photo-1504285519797-3b0349c4c170?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjcwNjE0fQ",
                    "https://images.unsplash.com/photo-1522868434605-f46cec3fe584?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjcwNjE0fQ",
                    "https://images.unsplash.com/photo-1517553671890-501b4f29ea61?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjcwNjE0fQ"
                ],
                "seller_custom_field" => $variation['seller_custom_field'],
                "status" => $variation['status']
            ];
        }); 
        //dd($variations);
        return [
            "title"         => $product['title'],
            "category_id"   => $product['children_categories']['id'],
            "price"         => $this->CurrencyToMySqlFormat($product['sale_price']),
            "currency_id"   => ($product['money']['code'] == 'PES') ? 'ARS' : $product['money']['code'],
            "available_quantity"    => $product['stock'],
            "buying_mode"   => $product['buying_mode']['name'],
            "listing_type_id"   =>$product['listing_type']['id'],
            "description"   => [
                'plain_text' =>   $product['description']
            ],
            //"video_id"      => "YOUTUBE_ID_HERE",
            "attributes"    => [
                [ "id"      => "ITEM_CONDITION", "value_id"  => $product['attr_item_condition']['value_id'] ],
                /* [ "id" => "COLOR", "value_id"=> '52022', "value_name"=> "Agua"] ,
                [ "id" => "SIZE",  "value_id"=> null, "value_name"=> "44"  ]  */
            ],
            "sale_terms"=>[
                ["id"=> "WARRANTY_TYPE", "value_id"=> '2230279' ],
                ["id"=> "WARRANTY_TIME", "value_name"=> "90 dias"]
            ],
            "variations" => $variations->toArray(),
            "seller_custom_field" => $product['seller_custom_field']
            /* 'variations' => [
                [
                    "id"=> 13061434112,
                    "attribute_combinations"=> [
                        [ "id" => "COLOR", "value_id"=> '52022', "value_name"=> "Agua"],
                        [ "id" => "SIZE",  "value_id"=> '3189098', "value_name"=> "18"  ]
                    ],
                    "price"=> 550,
                    "available_quantity"=> 10,
                    "sold_quantity"=> 0,
                    "picture_ids"=> [
                        "https://images.unsplash.com/photo-1504285519797-3b0349c4c170?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjcwNjE0fQ",
                        "https://images.unsplash.com/photo-1522868434605-f46cec3fe584?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjcwNjE0fQ",
                        "https://images.unsplash.com/photo-1517553671890-501b4f29ea61?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjcwNjE0fQ"
                    ], 
                    "seller_custom_field"=> "597", //sku
                ],
                
            ]  */
        ];
            
    }
}
