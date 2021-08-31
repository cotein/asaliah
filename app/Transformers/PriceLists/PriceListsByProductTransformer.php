<?php

namespace App\Transformers\PriceLists;

use App\Src\Models\PriceList;
use App\Src\Models\PriceListProduct;
use League\Fractal\TransformerAbstract;

class PriceListsByProductTransformer extends TransformerAbstract
{

    public function price_list_name($id)
    {
        return strtoupper(PriceList::find($id)->name);
    }
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(PriceListProduct $pl)
    {
        return [
            'pricelist_id' => $pl->pricelist_id,
            'product_id' => $pl->product_id,
            'pricelist_name' => $this->price_list_name($pl->pricelist_id),
            'price' => '$ ' . number_format($pl->price , 2, ',', '.')
        ];
    }
}
