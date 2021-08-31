<?php

namespace App\Http\Controllers\Api;

use App\Src\Models\City;
use App\Src\Models\Address;
use App\Src\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{
    public function store()
    {
        $addr = request()->address;

        $address = new Address;

        $address->province_id = $addr['province']['id'];
        $address->city_id = $addr['localidad']['id'];
        $address->cp = $addr['localidad']['cp'];
        $address->address = $addr['domicilio'];
        $address->type_id = $addr['type']['id'];
        $address->between_streets = $addr['between_streets'];
        $address->addressable_id = $addr['customer_id'];
        $address->addressable_type = 'App\Src\Models\Customer';
        $address->save();
        $address->refresh();

        $a = [
                'id' => $address->id,
                
                'country' => 'AGENTINA',

                'state_id' => $address->state->id ,

                'person_id' => $address->addressable_id,

                'state' =>  $address->state->name ,
                            
                'city_id' =>  City::find($address->city_id)->id,
                
                'city' =>  City::find($address->city_id)->name,
                            
                'cp' =>  $address->cp,
                            
                'domicilio' =>  $address->address,

                'type' => $address->type->name,
                
                'type_id' => $address->type->id,
                
                'between_streets' => $address->between_streets,

                'name' => $address->type->name . ' - ' . $address->address . ' - ' . City::find($address->city_id)->name . ' - ' . $address->cp . ' - ' . $address->state->name . ' AGENTINA' 
        ];

        /* if (request()->getRequestUri() == "/api/address/store") {
            
            $customer = Customer::find($address->addressable_id);

            $addresses = $customer->addresses->map(function($address){
                
                return [
                    
                    'id' => $address->id,
                    
                    'country' => 'AGENTINA',

                    'state_id' => ($address->state()->exists()) ? $address->state->id : '',

                    'person_id' => $address->addressable_id,

                    'state' =>  ($address->state()->exists()) ? $address->state->name : 'Definir provincia' ,
                                
                    'city_id' =>  ($address->city()->exists()) ? City::find($address->city_id)->id : 'false',
                    
                    'city' =>  ($address->city()->exists()) ? City::find($address->city_id)->name : 'false',
                                
                    'cp' =>  $address->cp,
                                
                    'domicilio' =>  strtoupper($address->address),

                    'number' => $address->number,
                    
                    'obs' => $address->obs,
                    
                    'type' => $address->type->name,
                    
                    'type_id' => $address->type->id,
                    
                    'between_streets' => $address->between_streets,

                    'name' =>  $address->type->name . ' - ' . strtoupper($address->address) . ' - ' . City::find($address->city_id)->name . ' - ' . $address->cp . ' - ' .  $address->state->name . ' - AGENTINA' ,
                ];
            });

            return response()->json($addresses, 201);
        } */
        return response()->json($a, 201);
    }

    public function update()
    {
        $addr = request()->address;

        $address = Address::find($addr['id']);

        $address->province_id = $addr['province']['id'];
        $address->city_id = $addr['localidad']['id'];
        $address->address = $addr['domicilio'];
        $address->type_id = $addr['type']['id'];
        $address->between_streets = $addr['between_streets'];

        $address->save();
        $address->refresh();

        $a = [
                'id' => $address->id,
                
                'country' => 'AGENTINA',

                'state_id' => $address->state->id ,

                'state' =>  $address->state->name ,
                            
                'city_id' =>  City::find($address->city_id)->id,
                
                'city' =>  City::find($address->city_id)->name,
                            
                'cp' =>  $address->cp,
                            
                'domicilio' =>  $address->address,

                'type' => $address->type->name,
                
                'between_streets' => $address->between_streets,

                'name' => $address->type->name . ' - ' . $address->address . ' - ' . City::find($address->city_id)->name . ' - ' . $address->cp . ' - ' . $address->state->name . ' AGENTINA' 
        ];

        return response()->json($a, 200);
    }
}
