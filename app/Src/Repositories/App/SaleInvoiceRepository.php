<?php

namespace App\Src\Repositories\App;

use App\Src\Models\Status;
use App\Src\Models\Product;
use App\Src\Models\Voucher;
use App\Src\Models\SaleInvoice;
use App\Src\Traits\MoneyFormatTrait;
use App\Src\Repositories\App\AppBaseRepository;

class SaleInvoiceRepository extends AppBaseRepository
{
    use MoneyFormatTrait;
    
    public function create($data, $invoice, $products, $invoices = null, $percep_iibb)
    {
        //dd($data, $invoice, $products, $invoices = null, $percep_iibb);
        //dd(($invoice['percep_iibb'] == '' || $invoice['percep_iibb'] == null || ($invoice['percep_iibb'] == [])) ? 0 : floatval($invoice['percep_iibb'][0]['Importe']) );
        //dd(($invoice['percep_iibb'] == '' || $invoice['percep_iibb'] == null || ($invoice['percep_iibb'] == [])) ? 0 : floatval(str_replace(',', '.', $invoice['percep_iibb'][0]['Alic'])) );
        $si = new SaleInvoice;
        $si->company_id = $data['company_id'];
        $si->customer_id = $data['customer_id'];
        $si->doc_nro = $data['doc_nro'];
        $si->voucher_id = $data['voucher_id'];
        $si->pto_vta = $data['pto_vta'];
        $si->cbte_desde = $data['cbte_desde'];
        $si->cbte_hasta = $data['cbte_hasta'];
        $si->cbte_fch = $data['cbte_fch'];
        $si->cae = $data['cae'];
        $si->cae_fch_vto = $data['cae_fch_vto'];
        $si->iibb_percentage = ($invoice['percep_iibb'] == '' || $invoice['percep_iibb'] == null || ($invoice['percep_iibb'] == [])) ? 0 : floatval(str_replace(',', '.', $invoice['percep_iibb'][0]['Alic']));
        $si->percerp_iibb = ($invoice['percep_iibb'] == '' || $invoice['percep_iibb'] == null || ($invoice['percep_iibb'] == [])) ? 0 : floatval($invoice['percep_iibb'][0]['Importe']);
        $si->status_id = Status::PENDIENTE;// $data['status_id'];
        $si->user_id = auth()->user()->id;
        $si->afip_data = collect($data['afip_data'])->toArray();
        //dd($si);

        $si->save();

        $si->refresh();

        if (array_key_exists('detail', $products)) {
            $si->items()->create([
                'sale_invoice_id' => $si->id,
                'quantity' => $products['quantity'],
                'neto_import' => $products['Neto'],
                'iva_import' => $products['IvaImport'],
                'iva_id' => $products['iva_id']['iva_id'],
                'discount' => 0,
                'discount_import' => 0,
                'total' => $products['ImpTotal'],
                'obs' => $products['detail']
            ]);

            $s = SaleInvoice::find($products['iva_id']['sale_invoice']['id']); //Ver por que viene de iva_id
            $s->status_id = 19; //19 = cerrada
            $s->save();

            $si->status_id = 19;
            $si->save();

        }else{

            collect($products)->each(function ($item) use ($si){
                $product_id = null;
                $from_meli = substr($item['product_id'], 0, 3);
                if ($from_meli == 'MLA') {
                    $product = Product::where('meli_id', $item['product_id'])->get();
                    $product_id = $product->first()->id;
                }else{
                    $product_id = $item['product_id'];
                }
                if($item['product_id'] != '')
                {
                    $si->items()->create([  
                        'sale_invoice_id' => $si->id,
                        'product_id' => $product_id,
                        'quantity' => $item['quantity'],
                        'neto_import' => $item['neto_import'],
                        'iva_import' => $item['iva_import'],
                        'iva_id' => ($item['iva_id']),
                        //'iva_id' => ($item['iva_id']) ? $item['iva_id'] : $item['iva_afip_code'],
                        'discount' => $item['discount'],
                        'discount_import' => $item['discount_import'],
                        'total' => ($item['neto_import'] +  $item['iva_import']),
                        //'total' => $this->CurrencyToMySqlFormat($item['total']),
                    ]);
                }
            });
        }

        collect($invoices)->each(function($item) use ($si) { 
            if ($item['id'] != '')
            {
                $si->items()->create([
                    'sale_invoice_id' => $si->id,
                    'neto_import' => $item['description']['neto'],
                    'iva_import' => $item['description']['iva'],
                    // corregir iva_id, puede haber dos comprobantes
                    // con distintos ivas en una nota crédito/débito
                    'iva_id' => 6,//21%
                    'total' => $item['description']['total'],
                    'obs' => $item['description']['detail'],
                ]);
            }
        });

        return $si;
        
    }
}
