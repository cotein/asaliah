<?php

namespace App\Transformers\PurchaseInvoice;

use App\Src\Models\PurchaseInvoice;
use League\Fractal\TransformerAbstract;
use App\Transformers\PurchaseInvoice\IvaComprasTransformerTrait;
use App\Transformers\PurchaseInvoice\IvaComprasTransformerContract;

class IvaComprasAlicuotasTransformer  implements IvaComprasTransformerContract
{
    use IvaComprasTransformerTrait;

    public function gravado($pi)
    {
        /* $gravado = $pi->items->map(function($i) {

            if ($i->iva_id == self::IVA_21) {
                 return $i->iva_import;
            }
            if ($i->iva_id == self::IVA_27) {
                 return $i->iva_import;
            }
            if ($i->iva_id == self::IVA_105) {
                 return $i->iva_import;
            }
            if ($i->iva_id == self::IVA_25) {
                 return $i->iva_import;
            }
            if ($i->iva_id == self::IVA_5) {
                 return $i->iva_import;
            }

        }); */

        return $gravado->filter()->sum();
    }

    public function groupBy_alicuotas_iva($pi)
    {
        return $pi->items->groupBy('iva_id')->map(function($array_pi){

            return collect($array_pi)->map(function($p_i){

                return [
                    'neto' => $p_i->quantity * $p_i->unit_price,
                    'iva_id' => $p_i->iva_id,
                    'iva_import' => $p_i->iva_import,
                ];

            })->pipe(function($collection){

                return [
                    'neto' => $collection->sum('neto'),
                    'iva_import' => $collection->sum('iva_import'),
                    'iva_id' => $collection->first()['iva_id']
                ];
                
            });
        });
    }
    
    public function transform(PurchaseInvoice $pi)
    {
        $alicuotas = $this->groupBy_alicuotas_iva($pi);
        return $alicuotas->map(function($i) use($pi) {
            return [
                $pi->voucher->afip_code . //Campo 1: Tipo de comprobante.
                $this->str_pad_left($pi->ptoVta, 5, '0') . //Campo 2: Punto de Venta.
                $this->str_pad_left($pi->number, 20, '0') . //Campo 3: Número de Comprobante.
                $pi->provider->purchaserDocument->afip_code . //Campo 4: Código de documento del vendedor.
                $this->str_pad_left($pi->provider->number, 20, '0') . //Campo 5: Número de identificación del vendedor.
                $this->currency($i['neto'], 15, '0') . //Campo 6: Importe Neto Gravado.
                $this->str_pad_left($i['iva_id'], 4, '0') . //Campoo 7: Alícuota de IVA.
                $this->currency($i['iva_import'], 15, '0')  //Campo 8: Impuesto Liquidado.
            ];
        })->flatten();
        
    }
}
