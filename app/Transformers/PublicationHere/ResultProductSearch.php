<?php

namespace App\Transformers\PublicationHere;

use App\Src\Models\Product;
use League\Fractal\TransformerAbstract;

class ResultProductSearch extends TransformerAbstract
{
    
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Product $product)
    {
        /**
         * //TODO: Reparar cuando entra en getmedia 
         * tiene que devolver un array asociativo
         * con al menos una vez 'secure_url' y la https
         * de la imagen
         */
        if (app()->environment('production')) {
            if($product->getMedia('products')->isEmpty()){
                $pics = $product->pictures->toArray();
            }else{
                $pics = $product->getMedia('products')->map(function($image){
                    return [
                        'secure_url' => $image->getFullUrl()
                    ];
                })->toArray(); 
            }
        }
        
        if (app()->environment('local')) {
            if($product->getMedia('products')->isEmpty()){
                $pics = $product->pictures->toArray();
            }else{
                $pics = $product->getMedia('products')->map(function($i){
                    return 'https://images.unsplash.com/photo-1504285519797-3b0349c4c170?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjcwNjE0fQ';
                })->toArray(); 
            }
        }

        return [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->sale_price,
            'slug' => $product->slug,
            'pictures' => $pics,
        ];
    }
}
