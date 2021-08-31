<?php

namespace App\Transformers\Customer;

use App\Src\Models\City;
use App\Src\Models\Customer;
use League\Fractal\TransformerAbstract;

class CustomerTransformer extends TransformerAbstract
{
    public function addresses($customer)
    {
        if ($customer->addresses->isEmpty()) {
            return false;
        }
        
        return $customer->addresses->map(function($addresses){

            return [

                'id' => $addresses->id,
                
                'country' => 'AGENTINA',

                'state_id' => $addresses->state['id'] ,

                'state' =>  $addresses->state['name'] ,
                            
                'city_id' =>  City::find($addresses->city_id)->id,
                
                'city' =>  City::find($addresses->city_id)->name,
                            
                'cp' =>  $addresses->cp,
                            
                'domicilio' =>  strtoupper($addresses->address),

                'between_streets' => $addresses->between_streets,

                'type' => ($addresses->type()->exists()) ? $addresses->type->name : 'falta definir',

                'name' => $addresses->type->name . ' - ' . strtoupper($addresses->address) . ', ' .City::find($addresses->city_id)->name . ', ' . $addresses->state['name'] . ', AGENTINA' 
            ];

        });

    }
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Customer $customer)
    {
        return [
            'id' => $customer->id,

            'number' => $customer->number,

            'name' => strtoupper($customer->name),

            'purchaser_document' => (($customer->purchaserDocument()->exists())) ? $customer->purchaserDocument->name : '',

            'inscription_id' => (($customer->inscription()->exists())) ? $customer->inscription_id : '',
            
            'inscription' => (($customer->inscription()->exists())) ? $customer->inscription->name : '',

            'contact' => $customer->contact,

            'cell_phone' => $customer->cell_phone,

            'phone_1' => $customer->phone_1,

            'phone_2' => $customer->phone_2,

            'phone_3' => $customer->phone_3,

            'email' => $customer->email,

            'addresses' => $this->addresses($customer),

            'customer_has_afip_data' => $customer->has_afip_data,
        ];
    }
}
