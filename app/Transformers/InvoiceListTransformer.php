<?php

namespace App\Transformers;

use App\Src\Models\City;
use App\Src\Models\SaleInvoice;
use App\Src\Traits\DateFormatTrait;
use League\Fractal\TransformerAbstract;

class InvoiceListTransformer extends TransformerAbstract
{
    use DateFormatTrait;
    
    private function invoice_letter($CbteTipo){
        switch ($CbteTipo) {
            case 1:
                return 'A';
                break;
        
            case 2:
                return 'A';
                break;

            case 3:
                return 'A';
                break;
            
            case 6:
                return 'B';
                break;
            
            case 7:
                return 'B';
                break;
            
            case 8:
                return 'B';
                break;
            
            case 11:
                return 'C';
                break;
            
            case 12:
                return 'C';
                break;
            
            case 13:
                return 'C';
                break;
            case 92:
                return 'A';
                break;
            case 93:
                return 'A';
                break;
            case 94:
                return 'A';
                break;
        }
    }

    private function docTipo($doc){
        switch ($doc) {
            case 86:
                return 'CUIL';
                break;
        
            case 80:
                return 'CUIT';
                break;

            case 96:
                return 'DNI';
                break;
        }
    }

    private function Voucher($CbteTipo) {
        
        switch ($CbteTipo) {
            case 1:
                return 'FACTURA';
                break;
        
            case 2:
                return 'NOTA DÉBITO';
                break;

            case 3:
                return 'NOTA CRÉDITO';
                break;
            
            case 6:
                return 'FACTURA';
                break;
            
            case 7:
                return 'NOTA DÉBITO';
                break;
            
            case 8:
                return 'NOTA CRÉDITO';
                break;
            
            case 11:
                return 'FACTURA';
                break;
            
            case 12:
                return 'NOTA DÉBITO';
                break;
            
            case 13:
                return 'NOTA CRÉDITO';
                break;
        }
    }

    private function zeroLeft($data, $lenght)
    {
        return str_pad($data, $lenght, "0", STR_PAD_LEFT);
    }

    private function Voucher_number($PtoVta, $CbteDesde) {
        
        return 'N° ' .  $this->zeroLeft($PtoVta, 5) . ' - ' . $this->zeroLeft($CbteDesde, 8);
    }

    private function items($si){
        return $si->items->map(function($item)
        {
            $quantity = (is_null($item->quantity)) ? 1 : $item->quantity;
            return [
                'product_id' => ($item->product()->exists()) ? $item->product->id : '',
                'product_name' => ($item->product()->exists()) ? $item->product->name  : $item->obs,
                'quantity' => $quantity,
                'neto_import' => $item->neto_import,
                'unit_price_invoiceA' => ($item->neto_import) / $quantity,
                'unit_price_invoiceB' => ($item->neto_import + $item->iva_import) / $quantity,
                'iva_import' => $item->iva_import,
                'iva_percentage' => $item->iva['percentage'],
                'iva_name' => $item->iva['name'],
                'discount_import' => $item->discount,
                'total_raw' => $item->total,
                'about_voucher' => $item->sale_invoice->voucher->name . ' ' . str_pad($item->sale_invoice->pto_vta, 5, "0", STR_PAD_LEFT) . ' - ' . str_pad($item->sale_invoice->cbte_desde, 8, "0", STR_PAD_LEFT),
            ];
        });
    }

    private function totals($invoice)
    {
        $totals = collect();
        
        if ($invoice->voucher_id == 8) {
                
            $totals->push([
                [
                    'name' => 'Subtotal',
                    'value' => $invoice->items->sum('neto_import') + $invoice->items->sum('iva_import')
                ]
            ]);
            
            $totals->push([
                [
                    'name' => 'Total',
                    'value' => $invoice->items->sum('neto_import') + $invoice->items->sum('iva_import') + $invoice->percerp_iibb
                ]
            ]);

        }

        if ($invoice->voucher_id == 6 || $invoice->voucher_id == 11) {
                
            $totals->push([
                [
                    'name' => 'Subtotal',
                    'value' => $invoice->items->sum('neto_import') + $invoice->items->sum('iva_import')
                ]
            ]);
            
            $totals->push([
                [
                    'name' => 'Total',
                    'value' => $invoice->items->sum('neto_import') + $invoice->items->sum('iva_import') + $invoice->percerp_iibb
                ]
            ]);

        }

        if (
                $invoice->voucher_id == 1 || 
                $invoice->voucher_id == 2 || 
                $invoice->voucher_id == 3 ||
                $invoice->voucher_id == 92 ||
                $invoice->voucher_id == 93 ||
                $invoice->voucher_id == 94
            ) {

            $totals->push([
                [   
                    'name' => 'Subtotal',
                    'value' => $invoice->items->sum('neto_import') 
                ]
            ]);

            $iva21 = $invoice->items->filter(function($item){
                if ($item->iva_id == 6) {
                    return $item;
                }
            });

            if (! $iva21->isEmpty()) {
                $totals->push([
                    [
                        'name' => 'Iva 21 %',
                        'value' => $iva21->sum('iva_import') 
                    ]
                ]);
            }

            $iva105 = $invoice->items->filter(function($item){
                if ($item->iva_id == 5) {
                    return $item;
                }
            });
            
            if (! $iva105->isEmpty()) {
                $totals->push([
                    [
                        'name' => 'Iva 10,5 %',
                        'value' => $iva105->sum('iva_import') 
                    ]
                ]);
            }

            $totals->push([
                [
                    'name' => 'Percepción de IIBB ' . $invoice->iibb_percentage . ' %',
                    'value' => $invoice->percerp_iibb
                ]
            ]);

            $totals->push([
                [
                    'name' => 'Total',
                    'value' => $invoice->items->sum('neto_import') + $invoice->items->sum('iva_import') + $invoice->percerp_iibb
                ]
            ]);
        }

        return $totals->toArray();
    }

    public function fiscal_address($si)
    {
        return collect($si->customer->addresses)->map(function($address){
            if ($address->type_id == 1) {
                return $address->address . ' - ' . City::find($address->city_id)->name . ' - ' . $address->cp . ' - ' . $address->state->name . ' - AGENTINA';
            }
        });
    }

    public function customer($si)
    {
        return [
            'name' => $si->customer->name,
            'address' => $this->fiscal_address($si),
            /* ($si->customer->addresses()->exists()) ? $si->customer->addresses()->first()->address . ' - ' . 
                $si->customer->addresses()->first()->cp . ' - ' . 
                $si->customer->addresses()->first()->cities->first()->name . ' - '.
                $si->customer->addresses()->first()->state->name : 'Sin Domicilio', */
            'id_number' => $si->customer->number,
            'inscription' => ($si->customer->inscription()->exists())?$si->customer->inscription->name: 'Falta Inscripción',
        ];

    }

    public function receipt($si)
    {
        return $si->receipts->map(function($r){
            return [
                'id' => $r->id,
                'receipt_number' => 'Recibo N° 0000 ---:' . $r->number,
                'documents_cancelation' => $this->documents_cancelation($r),
            ];
        })->toArray();
    }

    public function documents_cancelation($receipt)
    {
        return $receipt->cancelations->map(function($cd){
            $type_name = null;
            if ($cd->type()->exists()) {
                $type_name = $cd->type->name;
            }else{
                $type_name =  $cd->invoice->voucher->name;
            }
            return [
                'id' => $cd->id,
                //'type' => ($cd->type()->exists()) ? $cd->type->name : ($cd->invoice()->exists()) ? $cd->invoice->voucher->name : 'No existe',
                'type' => $type_name,
                'bank' => ($cd->bank()->exists()) ? $cd->bank->name : null,
                'number' => ($cd->invoice()->exists()) ? $this->zeroLeft($cd->invoice->pto_vta, 5) . '-' .  $this->zeroLeft($cd->invoice->cbte_desde, 8) : $cd->number,
               // 'number' => (! is_null($cd->invoice_id)) ? $cd->invoice->voucher->name : null,
                'expirate_date' => (is_null($cd->expirate_date)) ? '' : $this->ShortDateToArgentinaFormat($cd->expirate_date),
                'import' => $cd->import,
                'owner' => $cd->owner,
            ];
        })->toArray();
    }

    public function isCancelation($si)
    {
        if ($si->voucher_id == 3 || $si->voucher_id == 8 || $si->voucher_id == 13 ) {
            return true;
        }

        return false;
    }

    public function cancelation_data($si)
    {
        if ($si->iAmACancelation()->exists()) {
            
            return $si->iAmACancelation->map(function($cd){
                return [
                    'receipt_number' => $cd->receipt->number
                ];
            });
        }
        return  'vacio';
    }

    public function bill_type($si)
    {
        if ($si->voucher_id == 1) {
            return '003';
        }
        if ($si->voucher_id == 6) {
            return '008';
        }
        if ($si->voucher_id == 11) {
            return '013';
        }
        if ($si->voucher_id == 92) {
            return '203';
        }
    }

    public function AlicIva($si)
    {
        $Byiva =  $si->items->groupBy('iva_id');

        return collect($Byiva)->map(function($i){ 
            
            $BaseImp = 0;
            $Importe = 0;
            
            foreach ($i as $saleInvoiceItem) {
                $BaseImp += $saleInvoiceItem['neto_import'];
                $Importe += $saleInvoiceItem['iva_import'];
            }

            return [
                'Id' => ($saleInvoiceItem->iva()->exists()) ? $saleInvoiceItem->iva->code : '0',
                'BaseImp' => $BaseImp,
                'Importe' => $Importe,
            ];
        });
    }

    public function transform(SaleInvoice $si)
    {
        
        $total_raw = $si->items->sum('neto_import') + $si->items->sum('iva_import') + $si->percerp_iibb;

        $total = '$ ' . number_format($total_raw , 2, ',', '.');
        
        $d =  [
            'voucher_type' => $si->voucher_id,
            'id' => $si->id,
            'name' => $si->voucher->name . ' ' . str_pad($si->pto_vta, 5, "0", STR_PAD_LEFT) . ' - ' . str_pad($si->cbte_desde, 8, "0", STR_PAD_LEFT),
            'total' => $total,
            'customer' => $si->customer->name,
            'date' => $si->cbte_fch,
            'status' => $si->status->name,
            'receipt' => ($si->receipts()->exists()) ? $this->receipt($si) : 'Adeuda',
            'has_receipt' => ($si->receipts()->exists()) ? true : false,
            'iamacancelation' => ($this->isCancelation($si)) ? $this->cancelation_data($si) : 'nadaaaaaaaa',
            'print' => [
                'invoice_letter' => substr($si->voucher->name, -1),//$this->invoice_letter($si->voucher_id),
                'docTipo' => ($si->customer->purchaserDocument()->exists()) ? $this->docTipo($si->customer->purchaserDocument->afip_code) : 'Sin definir',
                'cuit' => $si->doc_nro,
                'voucher' => $si->voucher->name,//$this->Voucher($si->voucher_id), 
                'voucher_name' => $si->voucher->name,//$this->Voucher($si->voucher_id), 
                'voucher_number' => $this->Voucher_number($si->pto_vta, $si->cbte_desde),
                'date' => $si->cbte_fch,
                'cae' => $si->cae,
                'caeVto' => $si->cae_fch_vto,
                'products' => $this->items($si),
                'customer' => $this->customer($si),
                'customer_purchaser_document' => ($si->customer->purchaserDocument()->exists()) ? $si->customer->purchaserDocument->afip_code : 'Sin definir', 
                'bill_type' => $si->voucher_id,
                'ptoVta' => $si->pto_vta,
                'cbte_desde' => $si->cbte_desde,
                'cae_vto' => $si->cae_fch_vto,
                'totals' => $this->totals($si),
                'afip_data' => $si->afip_data,
                'iibb_percentage' => $si->iibb_percentage,
                'percep_iibb' => $si->percerp_iibb,
            ],
            'nota_credito' => [
                'customer' => $si->customer,
                'text' => [
                    'quantity' => 1,
                    'sale_invoice_id' => $si->id,
                    'detail' => 'Sobre: ' . $si->voucher->name . ' ' . str_pad($si->pto_vta, 5, "0", STR_PAD_LEFT) . ' - ' . str_pad($si->cbte_desde, 8, "0", STR_PAD_LEFT),
                ],
                'BillSale' => [
                    'bill_date' => null,
                    'bill_date_vto' => null,
                    'bill_number' => null,
                    'bill_type' => $this->bill_type($si),
                    'customer' => [
                        'id' => $si->customer->id,
                        'address' => $this->fiscal_address($si),
                        'id_number' => $si->customer->number,
                        'key_type' => ($si->customer->purchaserDocument()->exists()) ? $si->customer->purchaserDocument->name : 'Sin definir',
                        'name' => $si->customer->name,
                    ],
                    'percep_iibb' => $si->percerp_iibb,
                    'iibb_percentage' => $si->iibb_percentage,
                ],
                'ImpTotal' => $total_raw,
                'Neto' =>  $si->items->sum('neto_import'),
                'IvaImport' =>  $si->items->sum('iva_import'),
                'AlicIva' => $this->AlicIva($si),
                'iva_id' => $si->items->first(), // lo pongo así por que no funciona
                'CbtesAsoc' => 
                [
                    [
                        'Tipo' => (string)$si->voucher->afip_code,
                        'PtoVta' => $si->pto_vta,
                        'Nro' => $si->cbte_desde,
                        'Cuit' => $si->customer->number,
                        'CbteFch' => $si->cbte_fch
                    ]
                ],
                'impoTotConc' => 0, //importe neto no gravado
                'ImpTrib' => ($si->percerp_iibb > 0) ? $si->percerp_iibb : '',
                'Tributos' => ($si->percerp_iibb > 0) ? [
                    'Tributo' => [
                        'Id' => '7',
                        'Desc' => 'Percepción de IIBB',
                        'BaseImp' => $si->items->sum('neto_import'),
                        'Alic' => floatval ($si->percentage_iibb),
                        'Importe' => $si->percerp_iibb
                    ]
                ] : '',
            ] 
        ];

        return $d;
    }
}
