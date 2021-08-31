<?php

namespace App\Src\Afip\Traits;

use App\Exceptions\Afip\AfipResponseException;


trait WSFETrait 
{
    /*
    * Retorna el ultimo comprobante autorizado para el tipo de comprobante /cuit / punto de venta ingresado.
    */ 
    public function ultimoAutorizado($ptoVta = null, $cbteTipo = null)
    {
        $this->afip_params['Auth'] = $this->Auth;
        $this->afip_params['PtoVta'] = $ptoVta;
        $this->afip_params['CbteTipo'] = $cbteTipo;
        //dd($this->afip_params);
        try {
            return $this->client->FECompUltimoAutorizado($this->afip_params);
        }catch (\SoapFault $e)
        {
            $err = collect([
                'Code' => $e->getCode(),
                'Msg' => $e->getMessage(),
             ]);
            \Log::error("Afip ultimoAutorizado: " . $err->toJson() );

            throw new AfipResponseException($err->toJson(), 444);
        }
    }
    
    public function CbteDesde($ptoVta = null, $cbteTipo = null)
    {
        $result = $this->ultimoAutorizado($ptoVta = null, $cbteTipo = null);

        return $result->FECompUltimoAutorizadoResult->CbteNro + 1;
    }
    /**
     * Devuelve los tipos de monedas permitidos
     * por Afip.
     */
    public function tipoMoneda()
    {
        $auth = ['Auth'  =>  $this->Auth];

        return $this->client->FEParamGetTiposMonedas($auth);
    }

    public function ptos_vtas()
    {
        $auth = ['Auth'  =>  $this->Auth];

        return $this->client->FEParamGetPtosVenta($auth);
    }
    /**
     * [tipoTributos description]
     */
    public function tipoTributos()
    {
        $auth = ['Auth'  =>  $this->Auth];

        return $this->client->FEParamGetTiposTributos($auth);
    }

    public function tiposIvas()
    {
        $auth = ['Auth'  =>  $this->Auth];

        return $this->client->FEParamGetTiposIva($auth);
    }

    /**
     * [solicitarCAE description]
     */
    public function getCaeOnAfip($FeCabReq, $FECAEDetRequest)
    {
        $this->afip_params['Auth'] = $this->Auth;
        
        $this->afip_params['FeCAEReq'] = [
            /* 'FeCabReq' => [
                'CantReg'   => 1,
                'PtoVta'    => 6,
                'CbteTipo'  => 6,
            ],  */
            'FeCabReq' => $FeCabReq,
            'FeDetReq' => [
                'FECAEDetRequest' => $FECAEDetRequest
            ],
            
        ];
        //dd($this->afip_params);
        try {
            return $this->client->FECAESolicitar($this->afip_params);
        }catch (\SoapFault $e)
        {
            $err = collect([
                'Code' => $e->getCode(),
                'Msg' => $e->getMessage(),
            ]);
            
            \Log::error("Afip getCaeOnAfip: " . $err->toJson() );
            throw new AfipResponseException($err->toJson(), 444);
        }
    }

    public function compEmitido($ptoVta, $cbteTipo, $cbteNro)
    {
        $this->afip_params = collect($this->afip_params);

        $this->afip_params->put('Auth', $this->Auth);

        $FeCompConsReq =  [
                    'PtoVta'   => $ptoVta,
                    'CbteTipo' => $cbteTipo,
                    'CbteNro'  => $cbteNro
        ];
    
        $this->afip_params->put('FeCompConsReq', $FeCompConsReq);

        return $this->client->FECompConsultar($this->afip_params->toArray());
    }


    public function getPtoVta()
    {
        $auth = ['Auth'  =>  $this->Auth];

        return $this->client->FEParamGetPtosVenta($auth);
    }

    public function getTributos()
    {
        $auth = ['Auth'  =>  $this->Auth];
        $FeCompConsReq =  [
                'PtoVta'   => $ptoVta,
                'CbteTipo' => $cbteTipo,
                'CbteNro'  => $cbteNro
        ];
        return $this->client->FEParamGetTiposTributos($this->params->toArray());
    }

    public function dummy()
    {
        return $this->client->FEDummy();
    }



    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function FECAEDetRequest()
    {
        $this->separateByIVA();
        $this->sumByIVAId();
        $cbte_desde_hasta = $this->wsfev1->CbteDesde(1,6);
        return [
            'Concepto'      => self::PRODUCTS,//Concepto puede ser 1 productos, 2 servicios o 3 productos y servicios
            'DocTipo'       => $this->DocTipo($this->payment->DocTipo()),//Documento tipo: 80=CUIT | 96=DNI | 86=CUIL
            'DocNro'        => $this->payment->DocNro(),//Documento NÃºmero:CUIT
            'CbteDesde'     => $cbte_desde_hasta,//Comprobante desde
            'CbteHasta'     => $cbte_desde_hasta,//Comprobante hasta
            'CbteFch'       => $this->CbteFch(),//Fecha del comprobante
            'ImpTotal'      => $this->cart->total_cart(),//Importe total: nng + ex + ng + todos los ivas + tributos
            'ImpTotConc'    => self::IMPO_TOT_CONC,//Importe neto NO gravado
            'ImpNeto'       => round($this->impNeto(), 2),//Importe neto gravado
            'ImpOpEx'       => $this->impOpEx(),//Importe exento
            'ImpTrib'       => 0,//Suma de los importes del Array Tributos
            'ImpIVA'        => $this->impIva(),//Suma de los importes del Array IVA
            'FechServDesde' => '',//Fecha inicio del Servicio - Si se factura productos no es necesario
            'FechServHasta' => '',//Fecha fin del Servicio
            'FechVtoPago'   => $this->FechVtoPago(),//Fecha de Vencimiento de pago: Debe ser >= a la fecha del comprobante
            'MonId'         => 'PES',//Moneda del comprobante
            'MonCotiz'      => 1,//CotizaciÃ³n de la moneda
            'Iva'           => $this->AlicIva(),
            /*'Tributos'      => 
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

    /**
     * //TODO re hacer
     */
    public function FECAEDetRequest_venta_simple()
    {
        $cbte_desde_hasta = $this->wsfev1->CbteDesde(1,6);
        return [
            'Concepto'      => self::PRODUCTS,//Concepto puede ser 1 productos, 2 servicios o 3 productos y servicios
            'DocTipo'       => $this->DocTipo($this->payment->DocTipo()),//Documento tipo: 80=CUIT | 96=DNI | 86=CUIL
            'DocNro'        => $this->payment->DocNro(),//Documento NÃºmero:CUIT
            'CbteDesde'     => $cbte_desde_hasta,//Comprobante desde
            'CbteHasta'     => $cbte_desde_hasta,//Comprobante hasta
            'CbteFch'       => $this->CbteFch(),//Fecha del comprobante
            'ImpTotal'      => $this->cart->total_cart(),//Importe total: nng + ex + ng + todos los ivas + tributos
            'ImpTotConc'    => self::IMPO_TOT_CONC,//Importe neto NO gravado
            'ImpNeto'       => round($this->impNeto(), 2),//Importe neto gravado
            'ImpOpEx'       => $this->impOpEx(),//Importe exento
            'ImpTrib'       => 0,//Suma de los importes del Array Tributos
            'ImpIVA'        => $this->impIva(),//Suma de los importes del Array IVA
            'FechServDesde' => '',//Fecha inicio del Servicio - Si se factura productos no es necesario
            'FechServHasta' => '',//Fecha fin del Servicio
            'FechVtoPago'   => $this->FechVtoPago(),//Fecha de Vencimiento de pago: Debe ser >= a la fecha del comprobante
            'MonId'         => 'PES',//Moneda del comprobante
            'MonCotiz'      => 1,//CotizaciÃ³n de la moneda
            'Iva'           => $this->AlicIva(),
            /*'Tributos'      => 
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
