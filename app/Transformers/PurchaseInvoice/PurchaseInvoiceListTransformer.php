<?php

namespace App\Transformers\PurchaseInvoice;

use App\Src\Models\PurchaseInvoice;
use App\Src\Traits\DateFormatTrait;
use App\Src\Traits\MoneyFormatTrait;
use League\Fractal\TransformerAbstract;

class PurchaseInvoiceListTransformer extends TransformerAbstract
{
    use DateFormatTrait, MoneyFormatTrait;
    
    private function zeroLeft($data, $lenght)
    {
        return str_pad($data, $lenght, "0", STR_PAD_LEFT);
    }

    public function items($items)
    {
        return collect($items)->map(function($i){
            return [
                'article' => $i->article->name,
                'quantity' => $i->quantity,
                'unit_price' => $this->DisplayToUserCurrency($i->unit_price),
                'iva' => $i->iva->name,
                'iva_import' => $this->DisplayToUserCurrency($i->iva_import),
                'discount' => $this->DisplayToUserCurrency($i->discount),
                'total' => $this->DisplayToUserCurrency($i->total),
                /* 'status_id' => $i->status->id,
                'status_name' => $i->status->name, */
            ];
        });
    }

    public function taxes($taxes)
    {
        return collect($taxes)->map(function($t){
            return [
                'tax' => $t->tax->name,
                'tax_import' => $this->DisplayToUserCurrency($t->tax_import),
            ];
        });
    }

    public function receipts($pi)
    {
        if ($pi->receipts()->exists()) {
            
            return $pi->receipts->map(function($r){
                return [
                    'receipt_id' => $r['id'],
                    'receipt_number' => $this->zeroLeft(1, 4) . ' - ' . $this->zeroLeft($r['number'], 4),
                    'receipt_date' => $this->LongDateToArgentinaFormat($r['created_at']),
                    'paid' => $r->pivot->paid,
                    ''
                ];
            });
        }

        return false;
    }


    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(PurchaseInvoice $pi)
    {
        $paid = PurchaseInvoice::whereHas('receipts', function($q) use($pi) {
            $q->where('invoice_id', $pi->id);
        })->sum('paid');

        return [
            'id' => $pi->id,
            'provider_id' => $pi->provider->id,
            'provider_name' => $pi->provider->name,
            'voucher' => $pi->voucher->name,
            'voucher_id' => $pi->voucher_id,
            'subsidiary' => $this->zeroLeft($pi->ptovta, 4),
            'number' => $this->zeroLeft($pi->number, 8),
            'long_number' => $this->zeroLeft($pi->ptovta, 4) . ' - ' . $this->zeroLeft($pi->number, 8),
            'date' => $this->ShortDateToArgentinaFormat($pi->invoice_date),
            'total' => ($pi->voucher_id == 3 || $pi->voucher_id == 8 || $pi->voucher_id == 13 ) ? $this->DisplayToUserCurrency($pi->total * -1) : $this->DisplayToUserCurrency($pi->total),
            'total_raw' => ($pi->voucher_id == 3 || $pi->voucher_id == 8 || $pi->voucher_id == 13 ) ? ($pi->total * -1) : ($pi->total),
            'paid' => $this->DisplayToUserCurrency($paid),
            'paid_raw' => $paid,
            /* 'paid' => $this->DisplayToUserCurrency($pi->paid),
            'paid_raw' => $pi->paid, */
            'balance' => ($pi->voucher_id == 3 || $pi->voucher_id == 8 || $pi->voucher_id == 13 ) ? $this->DisplayToUserCurrency(($pi->total - $paid) * -1) : $this->DisplayToUserCurrency($pi->total - $paid),
            'balance_raw' => ($pi->voucher_id == 3 || $pi->voucher_id == 8 || $pi->voucher_id == 13 ) ? (($pi->total - $paid) * -1) : ($pi->total - $paid),
            /* 'balance' => ($pi->voucher_id == 3 || $pi->voucher_id == 8 || $pi->voucher_id == 13 ) ? $this->DisplayToUserCurrency(($pi->balance * -1) + $pi->paid) : $this->DisplayToUserCurrency($pi->balance - $pi->paid),
            'balance_raw' => ($pi->voucher_id == 3 || $pi->voucher_id == 8 || $pi->voucher_id == 13 ) ? (($pi->balance * -1) + $pi->paid) : ($pi->balance - $pi->paid), */
            'items' => $this->items($pi->items),
            'taxes' => $this->taxes($pi->taxes),
            'status' => $pi->status->name,
            'status_id' => $pi->status->id,
            'receipts' => $this->receipts($pi)
        ];
    }
}
