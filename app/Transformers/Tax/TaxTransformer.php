<?php

namespace App\Transformers\Tax;

use App\Src\Models\Tax;
use League\Fractal\TransformerAbstract;

class TaxTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Tax $tax)
    {
        return [
            'id' => $tax->id,
            'name' => strtoupper($tax->name),
            'accounting_account_id' => $tax->accounting_account->id,
            'accounting_account_name' => strtoupper($tax->accounting_account->name),
            'type_id' => $tax->type->id,
            'type_name' => $tax->type->name,
            'movement_id' => $tax->movement->id,//crédito o débito
            'movement_name' => $tax->movement->name,
            'state_id' => ($tax->state()->exists()) ? $tax->state->id : false,
            'state_name' => ($tax->state()->exists()) ? $tax->state->name : false,
            'status' => ($tax->active) ? true : false,
            'status_name' => ($tax->active) ? 'Activo' : 'Pausado', 
        ];
    }
}
