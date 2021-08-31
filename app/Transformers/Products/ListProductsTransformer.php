<?php

namespace App\Transformers\Products;

use App\Src\Models\Product;
use App\Src\Traits\MoneyFormatTrait;
use App\Src\Unsplash\SearchUnSplash;
use League\Fractal\TransformerAbstract;

class ListProductsTransformer extends TransformerAbstract
{
    use MoneyFormatTrait;

    private $search_photos;

    public function __construct()
    {
        $this->search_photos = new SearchUnSplash();
    }
    
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Product $product)
    {
        return [
            'id' => $product->id,
            'code' => strtoupper($product->code),
            'name' => $product->name,
            'description' => $product->description,
            'attributes' => $product->attributes,
        ];
    }
}
