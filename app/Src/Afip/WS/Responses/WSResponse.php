<?php

namespace App\Src\Afip\WS\Responses;

use App\Src\Tools\StdClassTool;


class WSResponse
{
    protected $response;

    protected $response_collection;

    public function multilevel_array_handler($matriz, $array_name){
        
        foreach($matriz as $key=>$value){
            
            if (is_array($value)){
                //si es un array sigo recorriendo
                if ($key == $array_name) return $value;
                /* echo 'key:'. $key;
                echo '<br>'; */
                //if (strpos($key, 'error')) return $value;
                
                self::multilevel_array_handler($value, $array_name);

            }else{  
                return $matriz;
            }
        }
    }

    public function getResponse($response)
    {
        $this->response = $response;

        $this->response_collection = collect(StdClassTool::toArray($response));
    }

    /** 
     * $value es el $array_name en multilevel_array_handler
    */
    public function getDatosGenerales($value)
    {
        return $this->multilevel_array_handler($this->response_collection->get('personaReturn'), $value);
    }

    /** 
     * $value es el $array_name en multilevel_array_handler
    */
    public function personaListReturn($value)
    {
        if ($value == 'idPersonaListReturn') {
            $personaReturn = $this->multilevel_array_handler($this->response_collection->get('idPersonaListReturn'), $value);
            
            //return $this->multilevel_array_handler($personaReturn, 'errorConstancia');
        }else{
            //$personaReturn = $this->multilevel_array_handler($this->response_collection->get('personaReturn'), $value);

            return $this->multilevel_array_handler($this->response, 'errorConstancia');
        }
       
    }
}
