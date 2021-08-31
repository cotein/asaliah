<?php

namespace App\Http\Controllers\Api;

use App\Src\Models\City;

use App\Src\Models\Status;
use App\Src\Models\Address;
use Illuminate\Http\Request;

use App\Src\Models\PedidoCliente;
use App\Src\Traits\DateFormatTrait;
use App\Http\Controllers\Controller;
use App\Src\Models\PedidoClienteStatus;
use App\Src\Models\PedidoClienteAddress;
use App\Events\PedidoClienteStatusUpdate;
use App\Transformers\PedidoCliente\PedidoClienteListTransformer;

class PedidoClienteController extends Controller
{
    use DateFormatTrait;
    
    const PENDIENTE = 6;
    const ELIMINADO = 7;
    
    public function index()
    {   
        $status_listated_date_from = '1900-01-01 00:00:00';
        $status_listated_date_to = '2900-12-31 23:59:59';
        $delivery_date_from = '1900-01-01 00:00:00';
        $delivery_date_to = '2900-12-31 23:59:59';

        $pcs = PedidoCliente::query();
        //dd(request()->all());
        if (request()->has('status_listated_date_from')) $status_listated_date_from = request()->status_listated_date_from;
        if (request()->has('status_listated_date_to')) $status_listated_date_to = request()->status_listated_date_to;
        if (request()->has('delivery_date_from')) $delivery_date_from = request()->delivery_date_from;
        if (request()->has('delivery_date_to')) $delivery_date_to = request()->delivery_date_to;

        
        if ( request()->has('status_listated_date_from') && request()->has('status_listated_date_to') && !(request()->has('delivery_date_from') && request()->has('delivery_date_to')) ){
            $pcs->whereHas('statuses', function($q) use($status_listated_date_from, $status_listated_date_to, $delivery_date_from, $delivery_date_to) {
                $q->whereBetween('pedidos_clientes_status.created_at', [$status_listated_date_from, $status_listated_date_to])
                ->whereNull('pedidos_clientes.delivery_date');
            });
        }

        if ( !(request()->has('status_listated_date_from') && request()->has('status_listated_date_to')) && request()->has('delivery_date_from') && request()->has('delivery_date_to') ){
            $pcs->whereHas('statuses', function($q) use($status_listated_date_from, $status_listated_date_to, $delivery_date_from, $delivery_date_to) {
                $q->whereBetween('pedidos_clientes.delivery_date', [$delivery_date_from, $delivery_date_to]);
            });
        }

        if ( request()->has('status_listated_date_from') && request()->has('status_listated_date_to') && request()->has('delivery_date_from') && request()->has('delivery_date_to') ) {
            $pcs->whereHas('statuses', function($q) use($status_listated_date_from, $status_listated_date_to, $delivery_date_from, $delivery_date_to) {
                $q->whereBetween('pedidos_clientes_status.created_at', [$status_listated_date_from, $status_listated_date_to])
                ->whereBetween('pedidos_clientes.delivery_date', [$delivery_date_from, $delivery_date_to]);
            });
        }
        
        if(request()->customer)
        {
            $pcs = $pcs->where('customer_id', request()->customer);
        }

        if(request()->has('status'))
        {
            if (request()->status == 'null') {
                $pcs = $pcs->whereBetween('status_id', [Status::PENDIENTE, Status::REPORTADO]);
            }else{
                $pcs = $pcs->whereBetween('status_id', [request()->status, request()->status]);
            }

        }else{
            $pcs = $pcs->whereBetween('status_id', [Status::PENDIENTE, Status::REPORTADO]);
        }

        //$pcs = $pcs->orderBy('meli_data->date_created', 'desc')->paginate(20);
        $pcs = $pcs->orderBy('created_at', 'desc')->paginate(20);

        $pedidos = fractal($pcs, new PedidoClienteListTransformer())->toArray()['data'];

        $customers_data = collect($pedidos)->groupBy('customer')->map(function($c){
            return $c->first();
        })->map(function($item, $key){
            return [
                'value' => $key,
                'data' => [
                    'customer_id' => $item['customer_id'],
                    //'delivery_address' => (is_null($item['delivery_address']) ? true : false)
                ]
            ];
        })->values()->toArray();
        
        $response = [
            'pagination' => [
                'total' => $pcs->total(),
                'per_page' => $pcs->perPage(),
                'current_page' => $pcs->currentPage(),
                'last_page' => $pcs->lastPage(),
                'from' => $pcs->firstItem(),
                'to' => $pcs->lastItem()
            ],
            'data' => $pedidos,
            'customers_data' => $customers_data
        ];
        return response()->json($response, 200);
    }

    public function delete()
    {
        $pd = PedidoCliente::find(request()->pedido_cliente_id);

        $pd->status_id = self::ELIMINADO;
        $pd->save();
        $pd->refresh();

        return response()->json($pd, 204);
        
    }

    public function store()
    {
        $pedido = request()->pedido;
        $code = $this->code();
        
            $pc = new PedidoCliente;
            $pc->customer_id = $pedido['customer']['id'];
            $pc->delivery_address = $pedido['address'];
            $pc->delivery_date = $pedido['date'];
            $pc->geocoder = $pedido['customer'];
            $pc->total = $pedido['total_pedido'];
            $pc->status_id = self::PENDIENTE;
            $pc->user_id = auth()->user()->id;
            $pc->save();
            
            $pc->code = 'PD-' . $this->code() . '-' . $pc->customer_id . '-' . $pc->id;
            $pc->number = $pc->id;
            $pc->save();

            $pc->refresh();

            collect($pedido['products'])->each(function($p) use($pc){

                $pc->items()->create(
                    [
                        'pedido_cliente_id' => $pc->id,
                        'product_id' => $p['product_id'],
                        'pricelist_id' => $p['pricelist_id'],
                        'unit_price' => $p['unit_price'],
                        'quantity' => $p['quantity'],
                        'discount_percentage' => $p['discount_percentage'],
                        'discount_import' => $p['discount_import'],
                        'iva_id' => $p['iva_afip_code'],
                        'iva_percentage' => $p['iva_percentage'],
                        'iva_import' => $p['iva_import'],
                        'neto_import' => $p['neto_import'],
                        'total' => $p['neto_import'] + $p['iva_import'],
                        'price_list' => collect($p['price_list'])->toJson(),
                    ]
                );
            });
            
        return response()->json($pc, 201);
    }

    public function status_update()
    {
        $pc = request()->pedido;

        $pedido = PedidoCliente::find($pc['id']);
        $pedido->status_id = (int) $pc['status'];  
        $pedido->save();

        $pcs = new PedidoClienteStatus;
        $pcs->status_id = (int) $pc['status'];
        $pcs->pedido_cliente_id = $pc['id'];
        $pcs->description = request()->first_contact;
        $pcs->user_id = auth()->user()->id;
        $pcs->save();
        
        $pedido->refresh();

        if ($pedido->status_id == Status::LISTADO) {
            PedidoClienteStatusUpdate::dispatch($pedido);
        }
        
        $pedido = fractal($pedido, new PedidoClienteListTransformer())->toArray()['data'];

        return response()->json($pedido, 200);
    }

    public function show()
    {
        $pedido = PedidoCliente::find(request()->code);

        if (is_null($pedido)) {
            $pedido = PedidoCliente::where('meli_id',request()->code)->get()->first();
        }
        $pedido = fractal($pedido, new PedidoClienteListTransformer())->toArray()['data'];

        return response()->json($pedido, 200);
    }

    public function save_comment()
    {
        $pedido_data = request()->all();
        $pedido = PedidoCliente::find($pedido_data['pedido_id']);
        //dd($pedido->comments);
        $pedido->comments()->create([
            'description' => $pedido_data['comment'],
            'user_id' => auth()->user()->id,
            'user_name' => auth()->user()->name . ' ' . auth()->user()->last_name,
            'pedido_status_id' => $pedido->status_id,
        ]);
        
        $pedido->refresh();

        $comments = null;

        if($pedido->comments()->exists())
        {
            $comments = $pedido->comments->map(function($c)
            {
                return [
                    'name' => $c->user_name,
                    'description' => $c->description,
                    'date' => $this->LongDateToArgentinaFormat($c->created_at)
                ];
            });
        }

        return response()->json($comments->toArray(), 200);
    }

    public function update_delivery_date()
    {
        $pedido = PedidoCliente::find(request()->pedido_id);
        //dd(request()->date);
        $pedido->delivery_date = request()->date;
        
        $pedido->save();
        
        $pedido->refresh();

        $pedido = fractal($pedido, new PedidoClienteListTransformer())->toArray()['data'];

        return response()->json($pedido, 200);
    }

    public function save_fiscal_address()
    {
        $pedido = request()->pedido;

        $address = PedidoClienteAddress::where('pedido_cliente_id', $pedido)->get();

        if ($address->isNotEmpty()) {
            $add = $address->first();
            $add->fiscal_address_id = request()->address;
            $add->save();
        }else{

            $add = new PedidoClienteAddress;
            $add->pedido_cliente_id = $pedido;
            $add->fiscal_address_id = request()->address;
            $add->save();
        }

        $address = Address::find(request()->address);

        $add = [
            'id' => $address->id,
            
            'country' => 'AGENTINA',

            'state_id' => $address->state->id ,

            'person_id' => $address->addressable_id,

            'state' =>  $address->state->name ,
                        
            'city_id' =>  ($address->city()->exists()) ? City::find($address->city_id)->id : 'false',
            
            'city' =>  ($address->city()->exists()) ? City::find($address->city_id)->name : 'false',
                        
            'cp' =>  $address->cp,
                        
            'domicilio' =>  $address->address,

            'type' => $address->type->name,
            
            'type_id' => $address->type->id,
            
            'between_streets' => $address->between_streets,

            'name' =>  $address->type->name . ' - ' . $address->address . ' - ' . City::find($address->city_id)->name . ' - ' . $address->cp . ' - ' . $address->state->name . ' - AGENTINA' 
        ];

        return response()->json($add, 201);

    }

    public function remove_fiscal_address()
    {
        $pedido = request()->pedido;

        $address = PedidoClienteAddress::where('pedido_cliente_id', $pedido)->get();

        $address = $address->first();
        $address->fiscal_address_id = null;
        $address->save();

        return response()->json($address, 200);
    }

    public function save_delivery_address()
    {
        $pedido = request()->pedido;

        $address = PedidoClienteAddress::where('pedido_cliente_id', $pedido)->get();

        if ($address->isNotEmpty()) {
            $add = $address->first();
            $add->delivery_address_id = request()->address;
            $add->save();
        }else{

            $add = new PedidoClienteAddress;
            $add->pedido_cliente_id = $pedido;
            $add->delivery_address_id = request()->address;
            $add->save();
        }

        $address = Address::find(request()->address);

        $add = [
            'id' => $address->id,
            
            'country' => 'AGENTINA',

            'state_id' => $address->state->id ,

            'person_id' => $address->addressable_id,

            'state' =>  $address->state->name ,
                        
            'city_id' =>  ($address->city()->exists()) ? City::find($address->city_id)->id : 'false',
            
            'city' =>  ($address->city()->exists()) ? City::find($address->city_id)->name : 'false',
                        
            'cp' =>  $address->cp,
                        
            'domicilio' =>  $address->address,

            'type' => $address->type->name,
            
            'type_id' => $address->type->id,
            
            'between_streets' => $address->between_streets,

            'name' =>  $address->type->name . ' - ' . $address->address . ' - ' . City::find($address->city_id)->name . ' - ' . $address->cp . ' - ' . $address->state->name . ' - AGENTINA' 
        ];

        return response()->json($add, 201);

    }

    public function remove_delivery_address()
    {
        $pedido = request()->pedido;

        $address = PedidoClienteAddress::where('pedido_cliente_id', $pedido)->get();

        $address = $address->first();
        $address->delivery_address_id = null;
        $address->save();

        return response()->json($address, 200);
    }
}
