<?php

namespace App\Src\Repositories\App;

use App\Src\Models\City;
use App\Src\Models\Provider;
use Illuminate\Support\Facades\DB;
use App\Src\Models\ProviderRegimen;

class ProviderRepository
{
    
    public function create($pr)
    {
            $provider = new Provider;
            
            if (is_null($pr['regimen']['code'])) {
                $regimen = null;
            }else{

                $regimen = ProviderRegimen::where('code', $pr['regimen']['code'])->get()->first()->id;
            }

            $provider->name = $pr['name'];
            $provider->number = $pr['number'];
            $provider->inscription_id = $pr['inscription']['id'];
            $provider->purchaser_document_id = $pr['purchase_document']['id'];
            $provider->afip_data = $pr['afip_data'];
            $provider->accounting_account_id = $pr['accounting_account']['id'];
            $provider->sublevel_accounting_account_id = $pr['sublevel_accounting_account']['id'];
            $provider->regimen_id = $regimen;
            $provider->iibb_exempt = $pr['taxes']['iibb_exempt'];
            $provider->iva_exempt = $pr['taxes']['iva_exempt'];
            $provider->gcias_exempt = $pr['taxes']['gcias_exempt'];
            $provider->suss_exempt = $pr['taxes']['suss_exempt'];
            $provider->has_afip_data = (! empty($pr['afip_data'])) ? true : false;
            $provider->contact = $pr['contact']['name'];
            $provider->email = $pr['contact']['email'];
            $provider->cell_phone = $pr['contact']['cell_phone'];
            $provider->phone_1 = $pr['contact']['phone_1'];
            $provider->phone_2 = $pr['contact']['phone_2'];
            $provider->phone_3 = $pr['contact']['phone_3'];

            $provider->save();
            $provider->refresh();
            
            if (array_key_exists('city', $pr['address'])) {
                $city = City::where('name', $pr['address']['city'])->get()->first()->id;
            }else{
                $city = null;
            }
 
            if (! is_null($pr['address']['address']) && ! is_null($pr['address']['number'])) {
            
                $provider->addresses()->create([
                    'country_id' => 1,
                    'type_id' => $pr['address']['type']['id'],
                    'province_id' => 1,
                    'city_id' => $city,
                    'address' => $pr['address']['address'],
                    'number' => $pr['address']['number'],
                    'cp' => $pr['address']['cp'],
                    'between_streets' => array_key_exists('between', $pr['address']) ? $pr['address']['between'] : null,
                    'obs' => array_key_exists('obs', $pr['address']) ? $pr['address']['obs'] : null,
                ]);
            }
            return $provider;
    }

    public function find_by_name($query)
    {
        return Provider::search($query)->get(['id', 'name', 'number', 'inscription_id']);
    }
}
