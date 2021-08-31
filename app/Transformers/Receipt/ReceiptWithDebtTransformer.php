<?php

namespace App\Transformers\Receipt;

use App\Src\Traits\DateFormatTrait;
use League\Fractal\TransformerAbstract;

class ReceiptWithDebtTransformer extends TransformerAbstract
{
    use DateFormatTrait;
    
    private function zeroLeft($data, $lenght)
    {
        return str_pad($data, $lenght, "0", STR_PAD_LEFT);
    }

    public function transform($receipt)
    {
        $total = '$ ' . number_format($receipt->diff_import , 2, ',', '.');
        
        return [
            'id' => $receipt->id,
            'name' => 'RECIBO ' .  $this->zeroLeft(1, 4) . ' - ' . $this->zeroLeft($receipt->number, 8),
            'total' => $total,
            'total_raw' => $receipt->diff_import,
            'status' => $receipt->status->name,
            'status_id' => $receipt->status->id,
            'date' => $this->LongDateToYyyymmddFormat($receipt->created_at),
            'cbte_tipo' => '998',
            'pto_vta' => '',
            'nro' => '',
            'cuit' => '',
            'cbte_fch' => '',
            'name_and_import' => '',
            'neto' => '',
            //tener cuidado con iva cuando el comprobante es una nota de crédito//
            'iva' => '' ,
            'customer' => '',
            'receipt' => ''
        ];
    }
}
