<?php

namespace App\Src\Repositories\App;

use App\Src\Models\Tax;
use App\Src\Models\Status;
use App\Src\Models\PurchaseInvoice;
use App\Src\Traits\DateFormatTrait;


class PurchaseInvoiceRepository 
{
    use DateFormatTrait;

    const ACTIVE = 1;
    
    public function create($invoice)
    {
        $invoice = $invoice['invoice'];
        
        $pi = new PurchaseInvoice;

        $pi->provider_id = $invoice['provider']['id'];
        $pi->voucher_id = $invoice['type']['id'];
        $pi->ptovta = $invoice['subsidiary'];
        $pi->number = $invoice['number'];
        $pi->invoice_date = $this->createDate($invoice['date']);
        $pi->imputation_date = $this->createDate($invoice['imputation_date']);
        $pi->status_id = Status::PENDIENTE;
        $pi->total = $invoice['total'];
        $pi->balance = $invoice['total'];
        $pi->moneda_id = $invoice['money']['id'];
        $pi->user_id = auth()->user()->id;

        $pi->save();
        $pi->refresh();

        return $pi;
    }

    public function create_items($pi, $items)
    {
        collect($items)->each(function($i) use($pi) {

            $pi->items()->create([
                'purchase_invoices_id' => $pi->id,
                'article_id' => $i['id'],
                'measure_unit_id' => null,
                'quantity' => $i['quantity'],
                'unit_price' => $i['neto_import'],
                'iva_id' => $i['iva_id'],
                'iva_import' => $i['iva_import'],
                'discount' => $i['discount_import'],
                'total' => $i['total_import'],
                'description' => null,
            ]);

        });

        return $pi;
    }

    public function create_tax($pi, $taxes)
    {
        collect($taxes)->each(function($t) use($pi) {

            if ($t['import'] > 0) {

                $pi->taxes()->create([
                    'purchase_invoice_id' => $pi->id,
                    'tax_id' => $t['id'],
                    'state_id' => $t['state_id'],
                    'tax_import' => $t['import']
                ]);
            }

        });

        return $pi;
    }

}
