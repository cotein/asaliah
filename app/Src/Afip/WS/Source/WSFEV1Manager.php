<?php

namespace App\Src\Afip\WS\Source;

use App\Src\Models\Order;
use App\Src\Afip\WS\Source\WSBase;
use App\Src\Afip\WS\Source\WSFEV1;
use App\Src\Traits\DateFormatTrait;
use App\Src\Models\PurchaserDocument;
use App\Src\Afip\Traits\WSFETrait;

class WSFEV1Manager extends WSBase
{
    use DateFormatTrait, WSFETrait;

    /**
     * Concepto del Comprobante. Valores
     *   permitidos:
     *   1 Productos
     *   2 Servicios
     *   3 Productos y Servicios
     */
    const PRODUCTS = 1;

    /**
     * Importe neto no gravado.
     * Debe ser menor o igual a Importe total y
     * no puede ser menor a cero.
     * No puede ser mayor al Importe total de la
     * operación ni menor a cero (0).
     * Para comprobantes tipo C debe ser igual a
     * cero (0).
     * Para comprobantes tipo Bienes Usados –
     * Emisor Monotributista este campo 
     */
    const IMPO_TOT_CONC = 0;

    const FECHA_VENCIMIENTO_PAGO = 30;

    private $order;

    private $payment;

    public $cart;

    public $wsfev1;

    protected $separatedIVA;

    protected $sumByIVAId;

    public function __construct($order_id)
    {
        $this->order = Order::find($order_id);
        //dd($this->order);
        $this->payment = $this->order->payment;

        $this->cart = $this->order->cart;

        $this->wsfev1 = new WSFEV1;
    }

    /**
     * Código de documento identificatorio del comprador
     */
    public function DocTipo($type)
    {
        return PurchaserDocument::where('name', $type)->first()->DocTipo();
    }

    /**
     * Importe  total  del  comprobante, Debe ser igual a 
     * Importe neto no gravado + Importe exento + Importe neto gravado + 
     * todos los campos de IVA  al XX% + Importe de tributos.
     */
    public function impTotal()
    {
        return $this->cart->total_cart();
    }
    /**
     * No se informa si es comprobante B
     */
    /**
     * @return collection
     */
    public function separateByIVA()
    {
        $this->separatedIVA = $this->cart->items->map(function($i){
            return [
                'Id'      => $i->product->iva['code'],
                'BaseImp' => ($i->product->iva['code'] == '2' ||  $i->product->iva['code'] == '3' || $i->product->iva['code'] == '7') ? $i->price * $i->quantity : round(($i->price * $i->quantity) / $this->divideIVA($i->product->iva['code']), 2),
                'Importe' => ($i->product->iva['code'] == '2' ||  $i->product->iva['code'] == '3' || $i->product->iva['code'] == '7') ? 0 : round(($i->price * $i->quantity) - (($i->price * $i->quantity) / $this->divideIVA($i->product->iva['code'])), 2)
            ];
            
        })->groupBy('Id');

    }

    public function sumByIVAId()
    {
        $this->sumByIVAId = collect($this->separatedIVA)->map(function($i){
            $BaseImp = 0;
            $Importe = 0;   

            foreach ($i as $iva) {
                $BaseImp += $iva['BaseImp'];
                $Importe += $iva['Importe'];
            }

            return [
                'Id' => $iva['Id'],
                'BaseImp' => $BaseImp,
                'Importe' => $Importe,
            ];

        })->toArray();
    }

    public function impNeto(Type $var = null)
    {
        return collect($this->sumByIVAId)->map(function($i){
            return $i['BaseImp'];
        })->sum();
    }

    public function CbteFch()
    {
        return $this->LongDateToYyyymmddFormat($this->now());
    }

    public function FechVtoPago()
    {
        $fech_vto_pago = $this->now()->addDays(self::FECHA_VENCIMIENTO_PAGO);

        return $this->LongDateToYyyymmddFormat($fech_vto_pago);
    }

    /**
     * Suma de los importes del  array de IVA.
     * Para comprobantes tipo C debe ser igual a cero(0).
     * Para comprobantes tipo Bienes Usados –
     * Emisor Monotributista no debe informarse o debe ser igual a cero (0).
     */
    public function impIva()
    {
        return collect($this->sumByIVAId)->map(function($i){
            return $i['Importe'];
        })->sum();
    }

    public function AlicIva()
    {
        return collect($this->sumByIVAId)->map(function($i){
            //$AlicIva = [];
            return [
                'Id' => $i['Id'],
                'BaseImp' => $i['BaseImp'],
                'Importe' => $i['Importe'],
            ];
        })->values()->toArray();
    }

    public function impOpEx()
    {
        return $this->cart->shipping_amount;
    }

    public function divideIVA($code)
    {
        switch ($code) {
            //10.5%
            case '4':
                return 1.105;
            //21%
            case '5':
                return 1.21;
            //27%
            case '6':
                return 1.27;

            //5%
            case '8':
                return 1.05;
            //2.5%
            case '9':
                return 1.025;

        }
    }
    

    
}
