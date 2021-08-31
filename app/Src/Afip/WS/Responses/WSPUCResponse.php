<?php

namespace App\Src\Afip\WS\Responses;

use App\Src\Models\City;
use App\Src\Models\State;
use App\Src\Models\PurchaserDocument;
use App\Exceptions\Afip\NotFoundPerson;
use App\Src\Afip\WS\Responses\AfipResponse;
use App\Exceptions\Afip\AfipResponseException;

/**
 */
class WSPUCResponse extends AfipResponse
{
    public function hasError()
    {
        if (array_key_exists('original', $this->response)) {
            
            return true;
        }
    }

    public function getMsgError()
    {
        if ($this->hasErrorConstancia()) {

            if (array_key_exists('error', $this->response)) {
                return $this->response['error'];
            }

            if (array_key_exists('original', $this->response)) {
                if (array_key_exists('message', $this->response['original'])) {
                   return $this->response['original']['message'];
                }
            }

            return $this->response['personaReturn']['errorConstancia']['error'];
        }

        if ($this->hasErrorRegimenGeneral()) {
            $message = null;
            if (array_key_exists('mensaje', $this->response['personaReturn']['errorRegimenGeneral'])) {
                $mensaje = $this->response['personaReturn']['errorRegimenGeneral']['mensaje'];
            }
            
            if (array_key_exists('error', $this->response['personaReturn']['errorRegimenGeneral'])) {
                $mensaje = $mensaje . ' - ' . $this->response['personaReturn']['errorRegimenGeneral']['error'];
            }

            return $mensaje;
        }

        if (array_key_exists('message', $this->response['original'])) {

            return $this->response['personaReturn']['original']['message'];
        }

    }
    
    public function hasPersonaListReturn()
    {
        if (array_key_exists('idPersonaListReturn', $this->response)) {
            
            return true;
        }

        return false;
    }

    public function hasPersonaReturn()
    {
        if (array_key_exists('personaReturn', $this->response)) {
            
            return true;
        }

        return false;
    }

    public  function hasDatosGenerales()
    {
        if (array_key_exists('datosGenerales', $this->response['personaReturn'])) {
            
            return true;
        }

        return false;
    }

    public  function hasErrorConstancia()
    {   
        if ($this->hasError()) {
           return true;
        }

        if ($this->hasPersonaListReturn()) {
            return false;
        }

        if (array_key_exists('error', $this->response)) {
            
            return true;
        }

        /* if ( ! (array_key_exists('errorConstancia', $this->response['personaReturn']) && array_key_exists('apellido', $this->response['personaReturn']['errorConstancia']))) {
            
            return true;
        } */

        return false;
    }

    public  function hasErrorRegimenGeneral()
    {
        if (array_key_exists('personaReturn', $this->response)) {
            //TODO arreglar toda esta clase
            if (array_key_exists('errorRegimenGeneral', $this->response['personaReturn'])) {
                
                return true;
            }
        }

        return false;
    }

    public  function hasDatosMonotributo()
    {
        if (array_key_exists('datosMonotributo', $this->response['personaReturn'])) {
            
            return true;
        }

        return false;
    }

    public  function hasDatosRegimenGeneral()
    {
        if (array_key_exists('datosRegimenGeneral', $this->response['personaReturn'])) {
            
            return true;
        }

        return false;
    }

    public function getDatosMonotributo()
    {
        return $this->response['personaReturn']['datosMonotributo'];
    }

    public function getDatosGenerales()
    {
        return $this->response['personaReturn']['datosGenerales'];
    }

    public function getDatosRegimenGeneral()
    {
        return $this->response['personaReturn']['datosRegimenGeneral'];
    }

    public function nameOrRazonSocia()
    {
        if (array_key_exists('personaReturn', $this->response)) {

            if (array_key_exists('errorConstancia', $this->response['personaReturn'])) {

                if (array_key_exists('error', $this->response['personaReturn']['errorConstancia'])) {
                    
                    if (array_key_exists('idPersona', $this->response['personaReturn']['errorConstancia'])) {
                        
                        if (array_key_exists('nombre', $this->response['personaReturn']['errorConstancia'])) {
                    
                            return $this->response['personaReturn']['errorConstancia']['apellido'] . ' ' . $this->response['personaReturn']['errorConstancia']['nombre'];
                
                        }else{
                
                            return $this->response['personaReturn']['errorConstancia']['apellido'];
                        }
                    }
                }
            }

            if (array_key_exists('datosGenerales', $this->response['personaReturn'])) 
            {
                if (array_key_exists('razonSocial', $this->response['personaReturn']['datosGenerales'])) 
                {
                    return $this->response['personaReturn']['datosGenerales']['razonSocial'];
                }
                
                $name = null;

                if (array_key_exists('apellido', $this->response['personaReturn']['datosGenerales'])) 
                {
                    $name = $this->response['personaReturn']['datosGenerales']['apellido'];
                }

                if (array_key_exists('nombre', $this->response['personaReturn']['datosGenerales'])) 
                {
                    $name = $this->response['personaReturn']['datosGenerales']['apellido'] . ' ' . $this->response['personaReturn']['datosGenerales']['nombre'];
                }

                return $name;
            }
        }

    }

    public function idPersona()
    {
        \Log::error("idPersona en WSPUCRESPONSE " . collect($this->response)->toJson());
        if (array_key_exists('errorConstancia', $this->response['personaReturn'])) {
            
            if (array_key_exists('idPersona', $this->response['personaReturn']['errorConstancia'])) {
                
                return $this->response['personaReturn']['errorConstancia']['idPersona'];
            }
        }

        if($this->hasPersonaListReturn()){
            return $this->response['idPersonaListReturn']['idPersona'];
        }

        if (array_key_exists('datosGenerales', $this->response['personaReturn']) ) {
            if (array_key_exists('idPersona', $this->response['personaReturn']['datosGenerales']) ) {
                return $this->response['personaReturn']['datosGenerales']['idPersona'];
            }
        }

        /* if (array_key_exists('errorConstancia', $this->response['personaReturn']) ){
            if ((array_key_exists('apellido', $this->response['personaReturn']['errorConstancia']) )) {
                return $this->response['personaReturn']['errorConstancia']['apellido'];
            }
        } */

    }

    public function isActive()
    {
        if ($this->response['personaReturn']['datosGenerales']['estadoClave'] == 'ACTIVO') {
            return true;
        }

        return false;
    }

    public function inscriptionType()
    {
        if (array_key_exists('errorConstancia', $this->response['personaReturn'])) {
            
            if (array_key_exists('idPersona', $this->response['personaReturn']['errorConstancia'])) {
                
                return self::CONSUMIDOR_FINAL_ID;
            }
        }

        if ($this->hasDatosMonotributo()) {

            return self::MONOTRIBUTO;
        }

        if ($this->hasDatosRegimenGeneral()) {
            
            if (array_key_exists('categoriaAutonomo', $this->response['personaReturn']['datosRegimenGeneral'])) {
            
                return self::RESPONSABLE_INSCRIPTO_ID;
            }

            $regimen = collect($this->response['personaReturn']['datosRegimenGeneral']);

            $result = $regimen->filter(function($r, $i){

                if ($i == 'impuesto') {
                    return $r;
                }
            });

            if(collect($result['impuesto'])->has('idImpuesto')){
                return collect($result['impuesto'])->get('idImpuesto');
            }else{
            
                return collect($result['impuesto'])->sortBy('idImpuesto')->map(function($impuesto){
                    
                    if($impuesto['idImpuesto'] == 30){
                        return self::RESPONSABLE_INSCRIPTO_ID;
                    }
                    
                    if($impuesto['idImpuesto'] == 32){
                        return self::EXENTO_ID;
                    }

                    if($impuesto['idImpuesto'] == 33){
                        return self::RESPONSABLE_NO_INSCRIPTO_ID;
                    }

                    if($impuesto['idImpuesto'] == 34){
                        return self::EXENTO_ID;
                    }


                })->filter()->values()->toArray()[0];
            }
        }
    }

    public function getAddress()
    {
        if ($this->hasDatosGenerales()) {
            
            return $this->response['personaReturn']['datosGenerales']['domicilioFiscal']['direccion'];
        }

        return false;
    }

    public function getProvinceId()
    {
        if (array_key_exists('datosGenerales', $this->response['personaReturn'])){
            $afip_code = $this->response['personaReturn']['datosGenerales']['domicilioFiscal']['idProvincia'];
            
            return State::where('afip_code', $afip_code)->pluck('id')[0];
        }

        return;
    }

    public function cityName()
    {
        if ($this->hasDatosGenerales()) {
            if (array_key_exists('localidad', $this->response['personaReturn']['datosGenerales']['domicilioFiscal'])){
             
                return $this->response['personaReturn']['datosGenerales']['domicilioFiscal']['localidad'];
            }

            return 'Indefinida';
        }
    }

    public function getCodPostal()
    {
        if ($this->hasDatosGenerales()) {
            return $this->response['personaReturn']['datosGenerales']['domicilioFiscal']['codPostal'];
        }
    }

    public function getCityId()
    {
        if(array_key_exists('datosGenerales', $this->response['personaReturn'])){
        
            $cp = $this->response['personaReturn']['datosGenerales']['domicilioFiscal']['codPostal'];

            $city = City::where('cp', $cp)->get();

            if ($city->isEmpty()) {
                
                $city = new City;
                $city->state_id = $this->getProvinceId();
                $city->name = $this->cityName();
                $city->cp = $this->getCodPostal();
                $city->save();

                $city->fresh();

                return $city->id;
            }

            return $city->pluck('id')[0];
        }else{
            return;
        }
    }

    /**
     * Purchaserdocument_id
     */
    public function getTipoClave()
    {
        if ($this->hasErrorConstancia()) {
            
            return self::CUIL_ID;
        }

        if (array_key_exists('datosGenerales', $this->response['personaReturn'])) {
            $purchaser_document = $this->response['personaReturn']['datosGenerales']['tipoClave'];
        }

        if (array_key_exists('errorConstancia', $this->response['personaReturn']) ){
            if ((array_key_exists('apellido', $this->response['personaReturn']['errorConstancia']) )) {
                $purchaser_document = 'CUIL';
            }
        }
        
        return PurchaserDocument::where('name', $purchaser_document)->get()->pluck('id')[0];
    }
    
    public function getData()
    {
        return $this->response['personaReturn'];
    }
}
