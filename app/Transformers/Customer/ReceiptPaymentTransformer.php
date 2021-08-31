<?php

namespace App\Transformers\Customer;

use App\Src\Models\City;
use App\Src\Models\Receipt;
use App\Src\Traits\DateFormatTrait;
use League\Fractal\TransformerAbstract;

class ReceiptPaymentTransformer extends TransformerAbstract
{   
    use DateFormatTrait;
    
    private function zeroLeft($data, $lenght)
    {
        return str_pad($data, $lenght, "0", STR_PAD_LEFT);
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
            case 998:
                return 'RECIBO';
                break;
        }
    }
   
    public function invoices($receipt)
    {
        $collection = collect([]);
        /**
         * Se juntan los recibos con deudas
         * con las facturas
         */
        $receipt->cancelations->map(function($c) use($collection){

            if ($c->receipt_cancelation()->exists()) {
                
                $c->receipt_cancelation->map(function($i) use($collection, $c){
                    $collection->push([
                        'invoice_id' => $i->id,
                        'name' => 'RECIBO',
                        'date' => $this->LongDateToArgentinaFormat($i->created_at),
                        'number' => $this->zeroLeft(1, 4) . '-' .  $this->zeroLeft($i->number, 8),
                        'total' => '$ ' . number_format($c->import , 2, ',', '.'),
                        'payment' => $i->total_invoices_import,
                        'debt' => '$i->pivot->debt',
                    ]); 
                });
            }
        });
        
        $receipt->invoices->map(function($i) use($collection){
            $collection->push([
                'invoice_id' => $i->id,
                'name' => $i->voucher->name,
                'date' => $i->cbte_hasta,
                'number' => $this->zeroLeft($i->pto_vta, 5) . '-' .  $this->zeroLeft($i->cbte_desde, 8),
                'total' => '$ ' . number_format($i->total() , 2, ',', '.'),
                'payment' => $i->pivot->payment,
                'debt' => $i->pivot->debt,
            ]); 
        });

        return $collection->toArray();
    }

    public function cancelations_documents_number($cd)
    {
        if ($cd->invoice()->exists()) {
            return $this->zeroLeft($cd->invoice->pto_vta, 5) . '-' .  $this->zeroLeft($cd->invoice->cbte_desde, 8);
        }

        if ($cd->receipt_cancelation()->exists()) {
            return $this->zeroLeft(1, 5) . '-' .  $this->zeroLeft($cd->receipt_cancelation->first()->number, 8);
        }
    }

    public function cancelations_documents($receipt)
    {
        return $receipt->cancelations->map(function($cd){
            
            $type_name = null;

            if ($cd->type()->exists()) {
                $type_name = $cd->type->name;
            }
            
            if($cd->invoice()->exists()){
                $type_name =  $cd->invoice->voucher->name;
            }
            
            if($cd->receipt_cancelation()->exists()){
                //dd($cd->receipt_cancelation->first()->number);
                $type_name =  'RECIBO';
            }

            if (!($cd->import > 0 && $type_name == 'RECIBO')) {
            
                return [
                    'id' => $cd->id,
                    'type' => $type_name,
                    'bank' => ($cd->bank()->exists()) ? $cd->bank->name : null,
                    'number' => $this->cancelations_documents_number($cd),
                    'expirate_date' => (is_null($cd->expirate_date)) ? '' : $this->ShortDateToArgentinaFormat($cd->expirate_date),
                    'import' => '$ ' . number_format($cd->import , 2, ',', '.'),
                    'owner' => $cd->owner,
                ];
            }
        })->filter()->all();
    }
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Receipt $r)
    {
        /* if ($r->id==41) {
            dd($this->cancelations_documents($r));
        } */
        return [
            'receipt_id' => $r->id,
            'customer_id' => $r->customer->id,
            'customer' => $r->customer->name,
            'customer_purchaser_document' => $r->customer->purchaserDocument->name,
            'customer_purchaser_document_number' => $r->customer->number,
            'customer_address' => ($r->customer->addresses()->exists()) ? $r->customer->addresses()->first()->address . ' - ' . 
                $r->customer->addresses()->first()->cp . ' - ' . 
                City::find($r->customer->addresses->first()->city_id)->name  . ' - ' . 
                $r->customer->addresses()->first()->state->name  : 'Sin Domicilio',
            'customer_inscription' => ($r->customer->inscription()->exists()) ? $r->customer->inscription->name : 'Falta inscripción' ,
            'number' => $this->zeroLeft($r->number, 8),
            'status' => $r->status->name,
            'status_id' => $r->status->id,
            'date' => $this->ShortDateToArgentinaFormat($r->date),
            'total_invoices_import' => $r->total_invoices_import,
            //'total_invoices_import' => '$ ' . number_format($r->total_invoices_import , 2, ',', '.'),
            'cancelation_documents_import' => $r->cancelation_documents_import,
            'diff_import' => $r->diff_import,
            'invoices' => $this->invoices($r),
            'cancelations_documents' => $this->cancelations_documents($r),
        ];
    }
}
