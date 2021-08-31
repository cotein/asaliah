<?php

namespace App\Transformers\PaymentOrder;

use App\Src\Models\City;
use App\Src\Models\Status;
use App\Src\Models\PaymentOrder;
use App\Src\Models\PurchaseInvoice;
use App\Transformers\TransformerBase;
use League\Fractal\TransformerAbstract;

class PaymentOrderTransformer extends TransformerBase
{
    public function fiscal_address($po)
    {
        return $po->provider->addresses->map(function($a){
            if ($a['type_id'] == 1) {
                return [
                    $a['address'] . ' - ' . City::find($a['city_id'])->name . ' - ' . $a['cp'] . ' - ' . $a->state->name . ' - ARGENTINA'
                ];
            }
        })->first();
    }

    public function purchase_invoices($po)
    {
        return collect($po->items)->map(function($invoice){

            $paid = PurchaseInvoice::whereHas('receipts', function($q) use($invoice) {
                $q->where('invoice_id', $invoice->id);
            })->sum('paid');
            
            return [
                'id' => $invoice->purchase_invoice->id,
                'voucher_id' => $invoice->purchase_invoice->voucher->id,
                'name' => $invoice->purchase_invoice->voucher->name,
                'date' => $this->ShortDateToArgentinaFormat($invoice->purchase_invoice->invoice_date),
                'number' => $this->zeroLeft($invoice->purchase_invoice->ptovta, 4) . '-' .$this->zeroLeft($invoice->purchase_invoice->number, 8),
                'total' => ($invoice->purchase_invoice->voucher->id == 3 || $invoice->purchase_invoice->voucher->id == 8 || $invoice->purchase_invoice->voucher->id == 13 ) ? $this->DisplayToUserCurrency(($invoice->purchase_invoice->total - $paid) * -1) : $this->DisplayToUserCurrency($invoice->purchase_invoice->total - $paid),
                'total_raw' => ($invoice->purchase_invoice->voucher->id == 3 || $invoice->purchase_invoice->voucher->id == 8 || $invoice->purchase_invoice->voucher->id == 13 ) ? (($invoice->purchase_invoice->total - $paid) * -1) : ($invoice->purchase_invoice->total - $paid),
                'status_id' => $invoice->purchase_invoice->status_id,
                'status_name' => Status::find($invoice->purchase_invoice->status_id)->name,
                'www' => 'www',
                'paid' => 0,
            ];
        });
    }

    public function transform(PaymentOrder $po)
    {
        return [
            'id' => $po->id,
            'number' => $this->zeroLeft(1, 4) . '-' .$this->zeroLeft($po->number, 8),
            'name' => $po->voucher->name,
            'provider_id' => $po->provider->id,
            'provider_name' => $po->provider->name,
            'provider_address' => $this->fiscal_address($po),
            'provider_inscription' => $po->provider->inscription->name,
            'provider_number' => $po->provider->number,
            'date' => $this->LongDateToArgentinaFormat($po->created_at),
            'total' => $this->DisplayToUserCurrency($po->total),
            'total_raw' => $po->total,
            'status' => $po->status->name,
            'status_id' => $po->status->id,
            'items' => $this->purchase_invoices($po)
        ];
    }
}
