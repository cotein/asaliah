<?php

namespace App\Transformers;

use App\Src\Models\SaleInvoice;
use App\Src\Traits\DateFormatTrait;
use League\Fractal\TransformerAbstract;

class SaleInvoiceByCustomerTransformer extends TransformerAbstract
{
    use DateFormatTrait;
    
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(SaleInvoice $si)
    {
        $multiplicador = 1;

        if ($si->voucher->afip_code == '003' || $si->voucher->afip_code == '008' || $si->voucher->afip_code == '013') {
            $multiplicador = -1;
        }

        $total = '$ ' . number_format(($si->items->sum('neto_import') + $si->items->sum('iva_import')) * $multiplicador , 2, ',', '.');

        $items = $si->items->map(function($si_item) {
            return [
                'iva_id' => $si_item->iva_id,
                'neto' => $si_item->neto_import,
                'iva' => $si_item->iva_import,
                'name' => $si_item->product['name'],
            ];  
        });

        return [
            'id' => $si->id,
            'cbte_tipo' => $si->voucher->afip_code,
            'pto_vta' => $si->pto_vta,
            'nro' => $si->cbte_desde,
            'cuit' => $si->doc_nro,
            'cbte_fch' => $si->cbte_fch,
            'name_and_import' => $si->voucher->name . ' ' . str_pad($si->pto_vta, 5, "0", STR_PAD_LEFT) . ' - ' . str_pad($si->cbte_desde, 8, "0", STR_PAD_LEFT) . ' ' . $total,
            'name' => $si->voucher->name . ' ' . str_pad($si->pto_vta, 5, "0", STR_PAD_LEFT) . ' - ' . str_pad($si->cbte_desde, 8, "0", STR_PAD_LEFT),
            'total' => $total,
            'total_raw' => ($si->items->sum('neto_import') + $si->items->sum('iva_import')) * $multiplicador,
            'neto' => $si->items->sum('neto_import') * $multiplicador,
            //tener cuidado con iva cuando el comprobante es una nota de crédito//
            'iva' => $items,
            'percep_iibb' => $si->percerp_iibb,
            'percentage_percep_iibb' => $si->iibb_percentage,
            'items' => $items,
            'customer' => $si->customer->name,
            'date' => $si->cbte_fch,
            'receipt' => ($si->receipts()->exists()) ? $si->receipts : 'Adeuda'
        ];
    }
}
