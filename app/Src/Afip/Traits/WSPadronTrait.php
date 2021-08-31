<?php

namespace App\Src\Afip\Traits;


trait WSPadronTrait
{
    public function getPersona($cuit)
    {
        try
        {
            $consulta =  [
                'token' => $this->afip->token,
                'sign'  => $this->afip->sign,
                'cuitRepresentada'  => $this->cuitRepresentada,
                'idPersona'         => floatval($cuit)
            ];
            \Log::info('WSPadronTrait->getPersona ' . collect($consulta)->toJson());
            $result = $this->client->getPersona($consulta);
            //dd($result);
            if (is_soap_fault($result)) {
                return response()->json($result, 500);
            }

            $r =  json_decode(json_encode($result), true);
            
            return $r;
        }
        catch (\SoapFault $e)
        {
            $response = json_decode(json_encode($e->getMessage(), true));
            return ['error' => $response];
        }
        catch (\Exception $e)
        {
            $response = json_decode(json_encode($e->getMessage(), true));
            return ['error' => $response];
        }
    }

    public function getPersona_v2($cuit)
    {
        $consulta =  [
            'token' => $this->token,
            'sign'  => $this->sign,
            'cuitRepresentada'  => $this->cuitRepresentada,
            'idPersona'         => $cuit
        ];
    
        try
        {
            $result = $this->client->getPersona_v2($consulta);

            if (is_soap_fault($result)) {
                return response()->json($result, 500);
            }

            $r =  json_decode(json_encode($result), true);
            return $r;
        }
        catch (\SoapFault $e)
        {
            $response = json_decode(json_encode($e->getMessage(), true));
            return ['error' => $response];
        }
        catch (\Exception $e)
        {
            $response = json_decode(json_encode($e->getMessage(), true));
            return ['error' => $response];
        }
    }
}
