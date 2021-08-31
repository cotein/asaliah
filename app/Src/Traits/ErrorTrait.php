<?php 
namespace App\Src\Traits;

use App\Exceptions\MercadoLibre\GetItemsFromMeliException;
use App\Exceptions\MercadoLibre\GetPublicationsFromMeliException;

trait ErrorTrait
{
    
    public function response_error_hanlde_get_publications($response)
    {
        if ($response['httpCode'] == 400 || $response['httpCode'] == 0){

            activity("Error")->withProperties(collect($response['body'])->toJson())->log('MercadoLibre');

            throw new GetPublicationsFromMeliException($response['body']->message, $response['httpCode']);
        } 
    }

    public function error_handle_get_items($response)
    {
        if ($response['httpCode'] == 400 || $response['httpCode'] == 0) {
            
            activity("Error")->withProperties(collect($response['body'])->toJson())->log('MercadoLibre');

            throw new GetItemsFromMeliException($response['body']->message, $response['httpCode']);
        }
    }

}

?> 


 