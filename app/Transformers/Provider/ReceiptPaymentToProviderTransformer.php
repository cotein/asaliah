<?php

namespace App\Transformers\Provider;

use App\Src\Models\City;
use App\Transformers\TransformerBase;
use App\Src\Models\ReceiptPaymentToProvider;

class ReceiptPaymentToProviderTransformer extends TransformerBase
{
    public function cancelation_documents($cancelation_document)
    {
        return collect($cancelation_document)->map(function($cd){
            return [
                'id' => $cd->id,
                'type' => $cd->type->name,
                'bank' => ($cd->bank()->exists()) ? $cd->bank->name : '---',
                'number' => (is_null($cd->number)) ? '---' : strtoupper($cd->number),
                'expirate_date' => (is_null($cd->expirate_date)) ? '---' : $this->ShortDateToArgentinaFormat($cd->expirate_date),
                'import' => $this->DisplayToUserCurrency($cd->import),
                'import_raw' => $cd->import,
                'owner' => (is_null($cd->owner)) ? '---' : strtoupper($cd->owner), 
            ];
        });
    }

    /* public function receipt_with_debt($receipt_with_debt)
    {
        $rwd = collect($receipt_with_debt);
        
        if ($rwd->isNotEmpty()) {
        
            return $rwd->map(function($r){
                return [
                    'id' => $r->receipt->id,
                    //'voucher' => $r->receipt->voucher->name,
                    'number' => $this->zeroLeft(1,4) . ' - ' . $this->zeroLeft($r->receipt->number, 8),
                    'date' => $this->LongDateToArgentinaFormat($r->receipt->created_at),
                    'total' => $this->DisplayToUserCurrency($r->receipt->balance),
                    'total_raw' => $r->receipt->balance,
                ];
            });
        }else{
            return;
        }
    }

    public function receipt_with_debt_total($receipt_with_debt)
    {
        $rwd = collect($receipt_with_debt);

        if ($rwd->isNotEmpty()) {
        
            return $rwd->sum(function($r){
                return $r->receipt->balance;
            });
        }else{
            return 0;
        }
        
    } */

    public function purchase_invoice($order)
    {
        return collect($order->items)->map(function($i){
            return [
                'id' => $i->purchase_invoice->id,
                'voucher' => $i->purchase_invoice->voucher->name,
                'number' => $this->zeroLeft($i->purchase_invoice->ptovta, 4) . ' - ' . $this->zeroLeft($i->purchase_invoice->number, 8),
                'date' => $this->ShortDateToArgentinaFormat($i->purchase_invoice->invoice_date),
                'total' => $this->DisplayToUserCurrency($i->purchase_invoice->total),
                'total_raw' => $i->purchase_invoice->total,
                'ppp' => 'ppp'
            ];
        });
    }

    public function orders($orders)
    {
        return collect($orders)->map(function($o){
            return [
                'id' => $o->order->id,
                'number' => $this->zeroLeft(1,4) . '-' . $this->zeroLeft($o->order->number,8),
                'invoices' => $this->purchase_invoice($o->order),
                'total' => $this->DisplayToUserCurrency($o->order->total),
                'total_raw' => $o->order->total,
            ];
        });
    }

    public function fiscal_address($r)
    {
        return $r->provider->addresses->map(function($a){
            if ($a['type_id'] == 1) {
                return [
                    $a['address'] . ' - ' . City::find($a['city_id'])->name . ' - ' . $a['cp'] . ' - ' . $a->state->name . ' - ARGENTINA'
                ];
            }
        })->first()[0];
    }

    public function transform(ReceiptPaymentToProvider $r)
    {
        return [
            'id' => $r->id,
            'number' => $this->zeroLeft(1,4) . '-' . $this->zeroLeft($r->number,8),
            'provider_id' => $r->provider->id,
            'provider_name' => $r->provider->name,
            'provider_address' => $this->fiscal_address($r),
            'provider_inscription' => $r->provider->inscription->name,
            'status_id' => $r->status->id,
            'status' => $r->status->name,
            'total_orders' => $this->DisplayToUserCurrency($r->total_orders),
            'total_orders_raw' => $r->total_orders,
            'total_paid' => $this->DisplayToUserCurrency($r->total_paid),
            'total_paid_raw' => $r->total_paid,
            'balance' => $this->DisplayToUserCurrency($r->balance),
            'balance_raw' => $r->balance,
            'created_at' => $this->LongDateToArgentinaFormat($r->created_at),
            'orders' => $this->orders($r->orders),
            /* 'receipt_with_debt' => $this->receipt_with_debt($r->receipts),
            'receipt_with_debt_total' => $this->receipt_with_debt_total($r->receipts), */
            'cancelation_documents' => $this->cancelation_documents($r->cancelation_documents),
            'cancelation_documents_total' => $r->cancelation_documents->sum('import'),
        ];
    }
}
