<?php

namespace App\Transformers\Products;

use App\Src\Models\Product;
use App\Src\Traits\MoneyFormatTrait;
use App\Src\Unsplash\SearchUnSplash;
use League\Fractal\TransformerAbstract;

class AddVariationToProductTransformer extends TransformerAbstract
{
    use MoneyFormatTrait;

    private $products;
    private $shoes_photos;

    public function __constructor()
    {
        $this->shoes_photos = new SearchUnSplash();
    }

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
                        'secure_url' => $image->getFullUrl()
                    ];
                })->toArray(); 
            }
            
        }
        
        if (app()->environment('local')) {
            if($product->getMedia('products')->isEmpty()){
                $pics = $product->pictures->toArray();
            }else{
                $pics = $product->getMedia('products')->map(function($image){
                    return [
                        'secure_url' => $image->getFullUrl()
                    ];
                })->toArray(); 
            }
/*             $pics = $product->getMedia('products')->map(function($i){
                return 'https://images.unsplash.com/photo-1504285519797-3b0349c4c170?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjcwNjE0fQ';
            })->toArray();  */
        }

        $variations = $product->variations->map(function($variation) use($product){
            return [
                'product_id' => $product->id,
                'variation_id' => $variation->id,
                'total_stock' => $variation->stock['total_stock'],
                'variation_published_meli' => $variation->published_meli,
                'variation_published_here' => $variation->published_here,
                //'available_quantity_meli' => $variation->stock['available_quantity_meli'],
                'available_quantity_meli' => 0,
                'available_quantity_here' => 0,
                'attribute_combinations' => $variation->attribute_combinations,
                'product_published_meli' => $product->published_meli,
                'product_published_here' => $product->published_here,
            ];
        })->all();

        $heads = $product->variations->map(function($variation) use($product){
            return collect($variation->attribute_combinations)->map(function($att, $i){
                return $att;
            });
        }); 

        return [
            'children_category' => $product->children_category,
            'name' => $product->name,
            "price"=> $this->DisplayToUserCurrency($product->sale_price),
            'iva' => $product->iva,
            'product_id' => $product->id,
            'variation' => $variations,
            'pics' => $pics,
            'heads' => $heads,
        ];
       
        
        
    }
}
