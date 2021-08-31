<?php

namespace App\Src\Afip\Traits;

trait WSFECREDErrorsTrait
{
    public function hasError($response)
    {
        $message = '';

        if (
            array_key_exists('arrayObservacion', $response) || 
            array_key_exists('arrayErrores', $response) || 
            array_key_exists('arrayErroresFormato', $response)
        ) {
            //dd($response);
            if(array_key_exists('arrayErroresFormato', $response)) {
                
                if(array_key_exists('codigoDescripcionString', $response['arrayErroresFormato'])){

                    $message = $response['codigoDescripcionString'][0]['descripcion'];
                }else{
                    $message = $response['arrayErroresFormato'];
                }

            }
            
            throw new \Exception($message);
        }

    }
}
