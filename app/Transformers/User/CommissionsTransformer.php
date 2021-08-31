<?php

namespace App\Transformers\User;

use App\Src\Models\Commission;
use League\Fractal\TransformerAbstract;

class CommissionsTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Commission $commission)
    {
        return [
            'id' => $commission->id,
            'pedido_code' => $commission->pedido_cliente->code,
            'pedido_base_imponible' => $commission->base_imponible,
            'pedido_created_at' => $commission->pedido_cliente->created_at,
            'percentage' => $commission->percentage,
            'commission' => $commission->commission,
            'customer' => strtoupper($commission->pedido_cliente->customer->name) ,
        ];
    }
}
