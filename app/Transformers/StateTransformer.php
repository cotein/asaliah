<?php

namespace App\Transformers;

use App\Src\Models\State;
use League\Fractal\TransformerAbstract;

class StateTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(State $state)
    {
        return [
            'id' => $state->id,
            'name' => strtoupper($state->name),
            'afip_code' => $state->afip_code,
            'codigo31662' => $state->codigo31662,
        ];
    }
}
