<?php

namespace App\Src\Tools;

class StdClassTool
{
    public static function toArray($object)
    {
        return  json_decode(json_encode($object), true);
    }

    public static function jsonDecode($object, $status = false)
    {
        return  json_decode($object, $status);
    }

    public static function multilevel_array_handler($matriz, $array_name){
        foreach($matriz as $key=>$value)  {
            $r = [];
            //return $key;
            if ($key == $array_name) {
                echo  $key . '- | - ' . collect($value)->toJson() . '</br>';
                //$r = $value;
                array_push($r, $value);
            }
            if (is_array($value)){
                self::multilevel_array_handler($value, $array_name);
            }
        }
        return $r;
        
    }

    public static function print_array($array){

        $message = '';

        foreach($array as $key=>$value){
            if(is_array($value)){
                //echo $key . ': ' . '<br>';
                print_array($value);
            }else{
                $message = $message . ' ' . $key . ': ' . $value . '-';
            }
        }
    }
    
}
