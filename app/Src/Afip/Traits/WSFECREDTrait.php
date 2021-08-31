<?php

namespace App\Src\Afip\Traits;

use App\Src\Tools\StdClassTool;
use App\Src\Afip\Traits\WSFECREDErrorsTrait;


trait WSFECREDTrait
{
    use WSFECREDErrorsTrait;
    
    public function isMiPyme($cuit, $date)
    {
        $result = $this->consultarMontoObligadoRecepcion($cuit, $date);

        $result_to_array = StdClassTool::toArray($result);
        $this->hasError($result_to_array['consultarMontoObligadoRecepcionReturn']);
        //dd($result_to_array);

        if ($result_to_array['consultarMontoObligadoRecepcionReturn']['obligado'] == 's' || $result_to_array['consultarMontoObligadoRecepcionReturn']['obligado'] == 'S') {
            
            $this->montoDesde = $result_to_array['consultarMontoObligadoRecepcionReturn']['montoDesde'];
            
            return true;
        }

        return false;
    }

    public function setOpcionalFactura($afipArrayRequest)
    {
        $afipArrayRequest['FECAEDetRequest']['Opcionales'] = [
            [
                'Id' => '27',
                'Valor' => 'SCA',
    
            ],
            [
                'Id' => '2101',
                'Valor' => '0720050220000001317518',
                /**TODO
                 * Resolver de donde se toma el CBU
                 */
            ],

        ];

        return $afipArrayRequest;

    }

    public function setOpcionalNotaCredito($afipArrayRequest)
    {
        $afipArrayRequest['FECAEDetRequest']['Opcionales'] = [
            [
                'Id' => '22',
                'Valor' => 'N',
            ],

        ];

        return $afipArrayRequest;

    }

    public function setOpcionalNotaDebito($afipArrayRequest)
    {
        $afipArrayRequest['FECAEDetRequest']['Opcionales'] = [
            [
                'Id' => '22',
                'Valor' => 'N',
            ],

        ];

        return $afipArrayRequest;

    }
}
