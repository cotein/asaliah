<?php

namespace App\Src\Afip\WS\Source;

use App\Src\Models\Order;
use App\Src\Afip\WS\Source\WSBase;
use App\Src\Afip\WS\Source\WSFEV1;
use App\Src\Traits\DateFormatTrait;
use App\Src\Models\PurchaserDocument;


class WSManager extends WSBase
{
    use DateFormatTrait;
    
    const PRODUCTS = 1;

    private $order;

    private $payment;

    private $cart;

    private $wsfev1;

    public function __construct($order_id)
    {
        $this->order = Order::find($order_id);

        $this->payment = $this->order->payment;

        $this->cart = $this->order->cart;

        $this->wsfev1 = new WSFEV1;

    }

    public function DocTipo($type)
    {
        return PurchaserDocument::where('name', $type)->first()->DocTipo();
    }

    public function ImpIva($product)
    {
        
    }
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform()
    {
        return [
            'Concepto'      => self::PRODUCTS,//Concepto puede ser 1 productos, 2 servicios o 3 productos y servicios
            'DocTipo'       => $this->DocTipo($this->payment->DocTipo()),//Documento tipo: 80=CUIT | 96=DNI
            'DocNro'        => $this->payment->DocNro(),//Documento NÃºmero:CUIT
            'CbteDesde'     => $this->wsfev1->CbteDesde(1,1),//Comprobante desde
            'CbteHasta'     => $this->wsfev1->CbteDesde(1,1),//Comprobante hasta
            'CbteFch'       => $this->LongDateToYyyymmddFormat($this->now()),//Fecha del comprobante
            'ImpTotal'      => $this->cart->total_cart(),//Importe total: nng + ex + ng + todos los ivas + tributos
            'ImpTotConc'    => 0,//Importe neto NO gravado
            'ImpNeto'       => round($this->cart->total_cart() / 1.21, 2),//Importe neto gravado
            'ImpOpEx'       => 0,//Importe exento
            'ImpTrib'       => 0,//Suma de los importes del Array Tributos
            'ImpIVA'        => $this->voucher->ImpIVA,//Suma de los importes del Array IVA
            /*'FechServDesde' => $this->voucher->FechServDesde,//Fecha inicio del Servicio - Si se factura productos no es necesario
            'FechServHasta' => $this->voucher->FechServHasta,//Fecha fin del Servicio
            'FechVtoPago'   => $this->voucher->FechVtoPago,//Fecha de Vencimiento de pago: Debe ser >= a la fecha del comprobante
            'MonId'         => $this->voucher->MonId,//Moneda del comprobante
            'MonCotiz'      => $this->voucher->MonCotiz,//CotizaciÃ³n de la moneda
            'Tributos'      => 
            [
                'Tributo' => 
                [
                    'Id' => 2,
                    'Desc' => 'Percep. Ingresos Brutos Bs.As.',
                    'BaseImp' => $this->voucher->ImpNeto,
                    'Alic'    => $this->voucher->alicuota_percepcion_iibb,
                    'Importe' => $this->voucher->ImpTrib
                ]
            ],   */
        ];
    }
}
