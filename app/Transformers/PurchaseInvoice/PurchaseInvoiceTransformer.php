<?php

namespace App\Transformers\PurchaseInvoice;

use App\Src\Models\PurchaseInvoice;
use App\Src\Traits\DateFormatTrait;
use League\Fractal\TransformerAbstract;

class PurchaseInvoiceTransformer extends TransformerAbstract
{
    use DateFormatTrait;
    
    private function zeroLeft($data, $lenght)
    {
        return str_pad($data, $lenght, "0", STR_PAD_LEFT);
    }

    public function items($items)
    {
        return collect($items)->map(function($i){
            return [
                'article' => $i->article->name,
            ];
        });
    }
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(PurchaseInvoice $pi)
    {
        return [
            'id' => $pi->id,
            'provider' => $pi->provider->name,
            'voucher' => $pi->voucher->name,
            'subsidiary' => $this->zeroLeft($pi->ptovta, 4),
            'number' => $this->zeroLeft($pi->number, 8),
            'long_number' => $this->zeroLeft($pi->ptovta, 4) . ' - ' . $this->zeroLeft($pi->number, 8),
            'date' => $this->ShortDateToArgentinaFormat($pi->invoice_date),
            'total' => $pi->total,
            'items' => $pi->items
        ];
    }
}
