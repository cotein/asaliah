<?php

namespace App\Transformers\Products;

use App\Src\Models\Product;
use App\Src\Traits\MoneyFormatTrait;
use App\Src\Unsplash\SearchUnSplash;
use League\Fractal\TransformerAbstract;

class SelectedProductToPublishTransformer extends TransformerAbstract
{
    use MoneyFormatTrait;

    private $imgs = [];
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
        $imgs = collect();
        /* $product->getMedia('products')->each(function($i) use ($imgs){ 
            $imgs->prepend($this->shoes_photos->search('shoes', 1)->getCleanUrls()->url()->getUrlResized(260, 350));
            $imgs->prepend('https://images.unsplash.com/photo-1504285519797-3b0349c4c170?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjcwNjE0fQ');
        }); */

        $pics = $product->getMedia('products')->map(function($i){
            return 'https://images.unsplash.com/photo-1504285519797-3b0349c4c170?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjcwNjE0fQ';
        })->toArray();

        return [
            'id' => $product->id,
            'name' => $product->name,
            'description' => $product->description,
            'variation' => $product['variation'],
            'available_quantity' => $product->stock['available_quantity'],
            'listing_type' => $product['listing_type'],
            'seller_custom_field' => $product->code,
            'pictures' => $pics,
            'pics' => $pics,
            'price' => $this->DisplayToUserCurrency($product->stock['sale_price']),
            'item_condition' => $product['attr_item_condition'],
            'buying_mode' => $product['buying_mode'],
            'main_category' => $product['main_category'],
            'children_category' => $product['children_category'],
            'attributes' => $product['attributes']
        ];
        
        
    }
}
