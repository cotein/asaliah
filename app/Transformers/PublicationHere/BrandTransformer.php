<?php

namespace App\Transformers\PublicationHere;

use App\Src\Models\Brand;
use League\Fractal\TransformerAbstract;

class BrandTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Brand $brand)
    {
        return [
            'id' => $brand['id'],
            'name' => $brand['name'],
            'show' => true
        ];
    }
}
