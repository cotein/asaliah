<?php

namespace App\Transformers;

use App\Src\Models\City;
use League\Fractal\TransformerAbstract;

class CityTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(City $city)
    {
        return [
            'id' => $city->id,
            'name' => $city->name . ' | ' . $city->cp,
            'cp' => $city->cp
        ];
    }
}
