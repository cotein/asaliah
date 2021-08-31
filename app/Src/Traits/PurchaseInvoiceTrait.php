<?php

namespace App\Src\Traits;

use App\Src\Models\PurchaseInvoice;

trait PurchaseInvoiceTrait 
{
    public function list($request)
    {
        $pi = PurchaseInvoice::query();

        if(request()->provider)
        {
            $pi = $pi->where('provider_id', request()->provider);
        }

        $pi = $pi->whereBetween('invoice_date', [request()->from_date, request()->to_date]);       

        return $pi;
    }
}
