<?php

namespace App\Transformers\PurchaseInvoice;

use App\Src\Models\PurchaseInvoice;
use App\Src\Traits\DateFormatTrait;
use League\Fractal\TransformerAbstract;
use App\Transformers\PurchaseInvoice\IvaComprasTransformerTrait;
use App\Transformers\PurchaseInvoice\IvaComprasTransformerContract;

class IvaComprasComprobantesTransformer extends TransformerAbstract implements IvaComprasTransformerContract
{
    use DateFormatTrait, IvaComprasTransformerTrait;
    
    public function ivaCompraFecha($fecha)
	{
		$anio=substr($fecha, 0,4);
		$mes=substr($fecha, 5,2);
		$dia=substr($fecha, 8,2);
		return $anio.$mes.$dia;
	}

    public function noGravado($pi)
    {
        $noGravado = $pi->items->map(function($i){
            if ($i->iva_id == self::NO_GRAVADO) {
                return $i->iva_import;
            }
        });

        return $noGravado->filter()->sum();
    }

    public function exentas($pi)
    {
        $noGravado = $pi->items->map(function($i){
            if ($i->iva_id == self::EXENTAS) {
                return $i->iva_import;
            }
        });

        return $noGravado->filter()->sum();
    }

    public function percepIva($pi)
    {
        if ($pi->taxes()->exists()) {
            
            $pi->taxes->map(function($pit){

                if ($pit->tax->tax_type_id == self::PERCEP_IVA_ID) {
                    return $pit->tax_import;
                }
            });
        }
        return 0;
    }

    public function otrasPercep($pi)
    {
        if ($pi->taxes()->exists()) {
            
            return $pi->taxes->sum(function($pit){
                if ($pit->tax->tax_type_id == self::IMPUESTOS_NACIONALES) {
                    return $pit->tax_import;
                }
            });
        }
        return 0;
    }

    public function impuestos_municipales($pi)
    {
        if ($pi->taxes()->exists()) {
            
            return $pi->taxes->sum(function($pit){
                if ($pit->tax->tax_type_id == self::IMPUESTOS_MUNICIPALES) {
                    return $pit->tax_import;
                }
            });
        }
        return 0;
    }

    public function impuestos_internos($pi)
    {
        if ($pi->taxes()->exists()) {
            
            return $pi->taxes->sum(function($pit){
                if ($pit->tax->tax_type_id == self::IMPUESTOS_INTERNOS) {
                    return $pit->tax_import;
                }
            });
        }
        return 0;
    }

    public function percepIIBB($pi)
    {
        if ($pi->taxes()->exists()) {
            
            return $pi->taxes->sum(function($pit){
                if ($pit->tax->tax_type_id == self::PERCEP_IIBB_ID) {
                    return $pit->tax_import;
                }
            });
        }
        return 0;
    }

    public function otrosTributos($pi)
    {
        if ($pi->taxes()->exists()) {
            
            return $pi->taxes->sum(function($pit){
                if ($pit->tax->tax_type_id == self::OTROS_IMPUESTOS) {
                    return $pit->tax_import;
                }
            });
        }
        return 0;
    }

    public function moneda($moneda)
    {
        if ($moneda==1) {
            return 'PES';
        } elseif ($moneda==100) {
            return 'DOL';
        } 
    }

    public function cambio()
    {
        return '0001000000';
    }

    public function alicuotasIva($pi)
    {
        $quantity = 0;
        $iva_21 = 0;			
        $iva_105 = 0;			
        $iva_27 = 0;			
        $iva_5 = 0;			
        $iva_25 = 0;			

        $pi->items->map(function($i) use ($quantity, $iva_21, $iva_105, $iva_27, $iva_5, $iva_25){

            if ($i->iva_id == self::IVA_21) {
                if ($iva_21 == 0) {
                    $quantity++;
                }
            }
            if ($i->iva_id == self::IVA_27) {
                if ($iva_27 == 0) {
                    $quantity++;
                }
            }
            if ($i->iva_id == self::IVA_105) {
                if ($iva_105 == 0) {
                    $quantity++;
                }
            }
            if ($i->iva_id == self::IVA_25) {
                if ($iva_25 == 0) {
                    $quantity++;
                }
            }
            if ($i->iva_id == self::IVA_5) {
                if ($iva_5 == 0) {
                    $quantity++;
                }
            }

        });

        return $quantity;
    }

    public function codigoOperacion($pi)
    {
        $has_iva = false;

        $pi->items->map(function($i) use($has_iva){
            
            if ($i->iva_import > 0) {
                $has_iva = true;
            }

            if ($has_iva) {
                return '';
            }

            return 'E';

        });
        
    }

    public function transform(PurchaseInvoice $pi)
    {
        return [
            $this->ShortDateToYyyymmddFormat($pi->invoice_date) . //Campo 1: Fecha de comprobante o fecha de oficialización.
            $pi->voucher->afip_code .  //Campo 2: Tipo de Comprobante.
            $this->str_pad_left($pi->ptoVta, 5, '0') . //Campo 3: Punto de Venta.
            $this->str_pad_left($pi->number, 20, '0') . //Campo 4: Número de Comprobante.
            $this->str_pad_left(' ', 16, '0') . //Campo 5: Despacho de importación.
            $pi->provider->purchaserDocument->afip_code . //Campo 6: Código de documento del vendedor.
            $this->str_pad_left($pi->provider->number, 20, '0') . //Campo 7: Número de identificación del vendedor.
            $this->str_pad_left($pi->provider->name, 30, ' ') . //Campo 8: Apellido y nombre o denominación del vendedor.
            $this->currency($pi->total, 15, '0') . //Campo 9: Importe total de la operación.
            $this->currency($this->noGravado($pi), 15, '0') . //Campo 10: Importe total de conceptos que no integran el precio neto gravado
            $this->currency($this->exentas($pi), 15, '0') . // Campo 11: Importe de operaciones exentas.
            $this->currency($this->percepIva($pi), 15, '0') . //Campo 12: Importe de percepciones o pagos a cuenta del Impuesto al Valor Agregado.
            $this->currency($this->otrasPercep($pi), 15, '0') . //Campo 13: Importe de percepciones o pago s a cuenta de otros impuestos nacionales.
            $this->currency($this->percepIIBB($pi), 15, '0') . //Campo 14: Importe de percepciones de Ingresos Brutos.
            $this->currency($this->impuestos_municipales($pi), 15, '0') . //Campo 15: Importe de percepciones impuestos municipales.
            $this->currency($this->impuestos_internos($pi), 15, '0') . //Campo 16: Importe de Impuestos Internos.
            $pi->money->code . //ampo 17: Código de Moneda.
            $this->cambio() . //Campo 18: Tipo de cambio.
            $this->alicuotasIva($pi) . //Campo 19: Cantidad de alícuotas de IVA.
            $this->codigoOperacion($pi) . //Campo 20: Código de operación.
            $this->str_pad_left(0, 15, '0') . // Campo 21: Crédito Fiscal Computable.
            $this->currency($this->otrosTributos($pi), 15, '0') . // Campo 22: Otros Tributos.
            $this->str_pad_left(0, 15, '0') . // Campo 23: CUIT Emisor / Corredor.
            $this->str_pad_left(' ', 15, '0') . // Campo 24: Denominación Emisor / Corredor.
            $this->str_pad_left(0, 15, '0')  // Campo 25: IVA Comisión. */
        ];
    }
}