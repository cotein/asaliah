<?php

namespace App\Transformers\Products;

use App\Src\Models\Product;
use App\Src\Models\Provider;
use League\Fractal\TransformerAbstract;

class EditProductTransformer extends TransformerAbstract
{

    public function setSupplier($product)
    {
        $supplier = Provider::find($product->supplier_id);

        return [
            'id' => $supplier->id,
            'name' => $supplier->name,
        ];
    }

    public function setPrice($product)
    {
        return collect($product->prices)->map(function($pr){

            return [
                'price_list_id' => $pr->pricelist_id,
                'price' => $pr->price
            ];

        })->toArray();
    }

    public function pictures($product){

        return $product->getMedia('products')->map(function($p){
            
            return [
                'id' => $p->id,
                'name' => $p->file_name,
                'url' => $p->getUrl()
            ];

        })->toArray();
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
            'categories_path' => $product->categories_path,
            'selected_categories_from_root' => $product->selected_categories_from_root,
            'name' => $product->name,
            'code' => $product->code,
            'name_on_supplier' => $product->name_on_supplier,
            'code_on_supplier' => $product->code_on_supplier,
            'description' => $product->description,
            'status_id' => $product->status_id,
            'attributes' => $product->attributes,
            'active' => $product->active,
            'category_id' => $product->category_id,
            'supplier' => $this->setSupplier($product),
            'price' => $this->setPrice($product),
            'pictures' => $this->pictures($product)
        ];
    }
}
