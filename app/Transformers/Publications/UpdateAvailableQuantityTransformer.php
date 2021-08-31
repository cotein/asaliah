<?php

namespace App\Transformers\Publications;

use League\Fractal\TransformerAbstract;

class UpdateAvailableQuantityTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform($variation)
    {
        dd($variation);
        $var = [
            'id' => $variation['id'], //El ID de la publicación
            'available_quantity' =>  $variation['available_quantity']
        ];

        return [
            'id' => $variation['variation_id'],
            'variations' => $var
        ];
    }
}
