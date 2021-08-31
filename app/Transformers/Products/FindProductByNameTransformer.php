<?php

namespace App\Transformers\Products;

use App\Src\Models\PriceList;
use App\Src\Models\PriceListProduct;
use League\Fractal\TransformerAbstract;
use App\Transformers\PriceLists\PriceListsByProductTransformer;

class FindProductByNameTransformer extends TransformerAbstract
{
    public function price_list($id)
    {
        $pl = PriceListProduct::where('product_id', $id)->get();

        if ($pl->isEmpty()) return [];

        return $pl->map(function($i){

            return [
                'pricelist_id' => $i->pricelist_id,
                'product_id' => $i->product_id,
                'name' => strtoupper(PriceList::find($i->pricelist_id)->name),
                'price' => '$ ' . number_format($i->price , 2, ',', '.'),
                'price_raw' => $i->price
            ];
        });
    }

    public function attributes($pr)
    {
        return collect($pr->attributes)->map(function($a){
            
            if (array_key_exists('id', $a)){

                if ($a['id'] == 'BASE_MATERIAL') {
                    return $a['value_name'];
                }
                if ($a['id'] == 'BOX_SPRING_SIZE') {
                    return $a['value_name'];
                }
                if ($a['id'] == 'BRAND') {
                    return $a['value_name'];
                }
                if ($a['id'] == 'FILLING_TYPE') {
                    return $a['value_name'];
                }
                if ($a['id'] == 'HEIGHT') {
                    return $a['value_name'];
                }
                if ($a['id'] == 'LENGTH') {
                    return $a['value_name'];
                }
                if ($a['id'] == 'MODEL') {
                    return $a['value_name'];
                }
                if ($a['id'] == 'SURFACE_CONTACT_TYPE') {
                    return $a['value_name'];
                }
                if ($a['id'] == 'WIDTH') {
                    return $a['value_name'];
                }
            }
        })->implode(' ');
    }
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform($pr)
    {
        return [
            'id' => $pr->id,
            'name' => '( '. $this->attributes($pr) . ' ) - ' . $pr->name ,
            'price_list' => $this->price_list($pr->id),
            'thumbnail' => ($pr->publication()->exists()) ? $pr->publication->thumbnail : ''
        ];
    }
}
