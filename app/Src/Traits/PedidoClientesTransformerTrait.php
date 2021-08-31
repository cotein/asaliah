<?php

namespace App\Src\Traits;

use App\User;
use App\Src\Models\City;
use App\Src\Models\Status;
use App\Src\Models\Address;
use App\Src\Models\Product;
use App\Src\Models\WebHookQuestion;
use App\Src\Traits\MoneyFormatTrait;


trait PedidoClientesTransformerTrait 
{
    use MoneyFormatTrait;
    
    public function first_contact($pc)
    {
        return $pc->statuses->sortBy('created_at')->map(function($status){
            if ($status->status_id == Status::PRIMER_CONTACTO && $status->description != null) { // 
                //dd($pc->status);
                return $status->description;
            }
        })->last();
    }

    public function user_on_list_status($pc)
    {
        $user_id = $pc->statuses->map(function($status){
            if ($status->status_id == Status::LISTADO ) {
                return $status->user_id;
            }
        })->filter()->values()->toArray();

        return collect($user_id)->map(function($id){
            
            $user = User::find($id);
            return $user->name();

        });
    }

    public function questions($item_id, $customer_id)
    {
        $questions = WebHookQuestion::where('item_id', $item_id)->where('from->id', $customer_id)->get();

        if ($questions->isNotEmpty()) {
            
            return $questions->toArray();
        }

        return false;
    }

    public function payment_data($pc)
    {
        if ($pc->items->isEmpty()) 
        {
            return collect($pc->meli_data['payments'])->map(function($p) use($pc){
                return [
                    'payment_id' => $p['id'],    
                    'status_detail' => $p['status_detail'],    
                    'status' => $pc->meli_data['status'],    
                    //'payment_type' => $p['payment_type'],
                    'installments' => $p['installments'],
                    'date_approved' => $p['date_approved'],
                    //'payment_method_id' => $p['payment_method_id'],
                    'payment_type' => $p['payment_type'],
                    'date_approved' => $p['date_approved'],
                    'shipping_cost' => $p['shipping_cost'],
                    'total_paid_amount' => $p['total_paid_amount'],
                    'installment_amount' => $p['installment_amount'],
                    'transaction_amount' => $p['transaction_amount'],
                ];
            });
        }

        return false;
    }

    public function items($pc)
    {
        if ($pc->items->isEmpty()) {
            return collect($pc->meli_data['order_items'])->map(function($oi) use($pc) {
                
                $attributes = '';
                
                foreach ($oi['item']['variation_attributes'] as $va) {
                    $attributes = $attributes . ' ' .$va['name'] .' - '.  $va['value_name'];
                }

                return [
                    'product_id' => $oi['item']['id'],
                    'product_name' => $oi['item']['title'],
                    'product_attributes' => $attributes,
                    'product_name_attributes' => $oi['item']['title'] . ' - ' . $attributes,
                    'iva_id' => '6',
                    'iva_afip_code' => '5',
                    'iva_name' => '21%',
                    'quantity' => $oi['quantity'],
                    'discount_import' => 0,
                    'discount' => 0,
                    'iva_import' => number_format( ( ( (float) $oi['quantity'] * (float) $oi['unit_price'] ) -  ( (float) $oi['quantity'] * (float) $oi['unit_price'] ) / 1.21), 2, '.', ''),
                    'neto_import' => number_format(((float)$oi['unit_price'] / 1.21) * (float)$oi['quantity'], 2, '.', ''),
                    'total' => '$ ' . number_format((float)$oi['quantity'] * (float)$oi['unit_price'] , 2, ',', '.'),
                    'total_raw' => (float)$oi['quantity'] * (float)$oi['unit_price'],
                    'questions' => $this->questions($oi['item']['id'], $pc->customer->meli_id)
                ];
            });
        }
        //dd($pc->items->count());
        return collect($pc->items)->map(function($i){
            
            if ($i->product()->exists()) {
                
                return [
                    'product_id' => $i->product->id,
                    'product_name' => $i->product->name,
                    'product_attributes' => $i->product->search_by,
                    //'price_list' => $i->price_list->name,
                    'iva_id' => $i->iva->id,
                    'iva_afip_code' => $i->iva->code,
                    'iva_name' => $i->iva->name,
                    'quantity' => $i->quantity,
                    'unit_price_invoiceA' => ($i->neto_import) / $i->quantity,
                    'unit_price_invoiceB' => ($i->neto_import + $i->iva_import) / $i->quantity,
                    'discount_import' => $i->discount_import,
                    'discount' => $i->discount_import,
                    'iva_import' => $i->iva_import,
                    'neto_import' => $i->neto_import,
                    'total' => $this->DisplayToUserCurrency($i->total),
                    'total_raw' => $i->total,
                ];
            }

            return null;
        });
    }

    public function comments($pc)
    {
        
        if($pc->comments()->exists())
        {
            return $pc->comments->map(function($c)
            {
                return [
                    'name' => $c->user_name,
                    'description' => $c->description,
                    'date' => $this->LongDateToArgentinaFormat($c->created_at)
                ];
            });
        }

        return false;
    }

    public function hasAddress($pc)
    {
        if ($pc->customer->addresses()->exists()) {
            return true;
        }

        return false;
    }

    public function hasDeliveryDate($pc)
    {
        if (! is_null($pc->delivery_date)) {
            return true;
        }

        return false;
    }

    public function addresses($addresses)
    {
        if($addresses instanceof Address)
        {
            return [
                'id' => $addresses->id,
                
                'country' => 'AGENTINA',

                'state_id' => $addresses->state->id ,

                'person_id' => $addresses->addressable_id,

                'state' =>  $addresses->state->name ,
                            
                'city_id' =>  ($addresses->city()->exists()) ? City::find($addresses->city_id)->id : 'false',
                
                'city' =>  ($addresses->city()->exists()) ? City::find($addresses->city_id)->name : 'false',
                            
                'cp' =>  $addresses->cp,
                            
                'domicilio' =>  strtoupper($addresses->address),

                'number' => $addresses->number,
                
                'obs' => $addresses->obs,
                
                'type' => $addresses->type->name,
                
                'type_id' => $addresses->type->id,
                
                'between_streets' => $addresses->between_streets,

                'name' => $addresses->type->name . ' - ' . strtoupper($addresses->address) . ' - ' . City::find($addresses->city_id)->name . ' - ' . $addresses->cp . ' - ' . $addresses->state->name . ' - AGENTINA' 
            ];
        }

        $addresses = collect($addresses);

        return $addresses->map(function($address){
            try {
                //code...
            
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

                    //dd($address->type->name . ' - ' . strtoupper($address->address) . ' - AGENTINA' )
                ];
            } catch (\Throwable $th) {
                dd($address);
            }
        });
    }  
}

