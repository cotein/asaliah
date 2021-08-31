<?php

namespace App\Transformers\PriceLists;

use App\Src\Models\PriceList;
use League\Fractal\TransformerAbstract;

class PriceListTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(PriceList $pl)
    {
        return [
            'id' => $pl->id,
            'name' => strtoupper($pl->name),
            'benefit' => $pl->benefit,
            'enable' => $pl->enable,
        ];
    }
}
