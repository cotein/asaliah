<?php

namespace App\Src\Afip\WS\Responses;

use App\Src\Tools\StdClassTool;

abstract class AfipResponse 
{
    const CUIL_ID = 26;
    
    const CONSUMIDOR_FINAL_ID = 5;
    
    const RESPONSABLE_INSCRIPTO_ID = 1;

    const RESPONSABLE_NO_INSCRIPTO_ID = 2;
    
    const EXENTO_ID = 4;
    
    const MONOTRIBUTO = 6;

    protected $response;

    public function __construct($response)
    {
        $this->response = StdClassTool::toArray($response);
    }

    public function saveErrors($request)
    {
        activity('Error')
                ->causedBy(auth()->user())
                ->withProperties(['RaWRequest' => collect($request->all())->toArray()])
                ->log($request->path());
            
        activity('Error')
            ->causedBy(auth()->user())
            ->withProperties(['RaWResponse' => collect($this->response)->toArray()])
            ->log($request->path());
    }
}

/* 
    {#462
    +"FECAESolicitarResult": {#440
        +"FeCabResp": {#438
            +"Cuit": 20083103818
            +"PtoVta": 6
            +"CbteTipo": 6
            +"FchProceso": "20200501101403"
            +"CantReg": 1
            +"Resultado": "A"
            +"Reproceso": "N"
        }
        +"FeDetResp": {#449
            +"FECAEDetResponse": {#458
                +"Concepto": 1
                +"DocTipo": 86
                +"DocNro": 20227339730
                +"CbteDesde": 3
                +"CbteHasta": 3
                +"CbteFch": "20200501"
                +"Resultado": "A"
                +"CAE": "70188834432770"
                +"CAEFchVto": "20200511"
            }
        }
    }
    } */

    /*     {#462
    +"FECAESolicitarResult": {#440
        +"FeCabResp": {#438
            +"Cuit": 20083103818
            +"PtoVta": 6
            +"CbteTipo": 6
            +"FchProceso": "20200502093504"
            +"CantReg": 1
            +"Resultado": "R"
            +"Reproceso": "N"
        }
        +"FeDetResp": {#449
            +"FECAEDetResponse": {#458
                +"Concepto": 1
                +"DocTipo": 86
                +"DocNro": 20227339730
                +"CbteDesde": 4
                +"CbteHasta": 4
                +"CbteFch": "20200502"
                +"Resultado": "R"
                +"Observaciones": {#451
                    +"Obs": array:3 [
                        0 => {#448
                            +"Code": 10056
                            +"Msg": "El campo ImpTotal soporta 13 numeros para la parte entera y 2 para los decimales."
                        }
                        1 => {#404
                            +"Code": 10056
                            +"Msg": "El campo ImpIVA soporta 13 numeros para la parte entera y 2 para los decimales."
                        }
                        2 => {#454
                            +"Code": 10056
                            +"Msg": "El campo Importe de AlicIva soporta 13 numeros para la parte entera y 2 para los decimales."
                        }
                    ]
                }
                +"CAE": ""
                +"CAEFchVto": ""
            }
            }
    }
    }
    ######################
    ######################
    ######################

    {#472
  +"FECAESolicitarResult": {#450
    +"FeCabResp": {#448
      +"Cuit": 20083103818.0
      +"PtoVta": 6
      +"CbteTipo": 1
      +"FchProceso": "20200511155942"
      +"CantReg": 1
      +"Resultado": "R"
      +"Reproceso": "N"
    }
    +"FeDetResp": {#459
      +"FECAEDetResponse": {#468
        +"Concepto": 1
        +"DocTipo": 80
        +"DocNro": 2147483647
        +"CbteDesde": 1
        +"CbteHasta": 1
        +"CbteFch": "20200511"
        +"Resultado": "R"
        +"Observaciones": {#461
          +"Obs": {#458
            +"Code": 10015
            +"Msg": "El campo  DocNro es invalido."
          }
        }
        +"CAE": ""
        +"CAEFchVto": ""
      }
    }
  }
}
 */