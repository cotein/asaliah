<?php

namespace App\Http\Controllers\Api;

use App\Src\Meli\MeliOrders;
use App\Src\Models\Customer;
use Illuminate\Http\Request;
use App\Src\Tools\StdClassTool;
use App\Src\Models\PedidoCliente;
use App\Src\Traits\DateFormatTrait;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\BaseController;
use App\Transformers\Meli\SaveCustomerFromMeliOnSaleOrder;
use App\Transformers\PedidoCliente\SaveOrderMeliToPedidoClienteTransformer;

class MeliNotificationController extends BaseController
{
    use DateFormatTrait;
    
    const PENDIENTE = 6;

    protected $meli_orders;

    public function __construct(MeliOrders $meli_orders)
    {
        parent::__construct();

        $this->meli_orders = $meli_orders;
    }

    public function myfeeds()
    {

        $data = $this->meli_orders->order(auth()->user()->company->mercadoLibre->meli_token);

        return response()->json($data);

    }

    public function orders_by_seller()
    {
        $data = $this->meli_orders->orders_by_seller(auth()->user()->company->mercadoLibre->meli_token, auth()->user()->company->mercadoLibre->meli_user_id, request()->offset, request()->limit);

        //TODO: chequear la respuesta de meli para poder lanzar una exeption
        $paginate = [
            'offset' => $data['body']->paging->offset + 1,
            'page' => 1,
            //'total' => $data['body']->paging->total / request()->limit,
            'total' => (int) number_format($data['body']->paging->total / request()->limit, 0, '', ''),
        ];
        
        $orders = fractal($data['body']->results, new SaveCustomerFromMeliOnSaleOrder())->toArray()['data'];
        
        $response = [
            'meli_data' => $orders,
            'paginate' => $paginate
        ];

        return response()->json($response);
    }

    public function orders_by_seller_recent()
    {
        $orders = collect([]);
        $i = 0;
        $offset = 0;
        $limit = 50;

        do {
            
            $result = $this->meli_orders->orders_recent(auth()->user()->company->mercadoLibre->meli_token, auth()->user()->company->mercadoLibre->meli_user_id, $offset, $limit);

            $total = $result['body']->paging->total;
            
            $orders->push($result['body']->results);
            
            $page = $total / $limit;
            
            $offset = $offset + $limit;
            
            sleep(1);
            
            $i++;

        } while ($i < $page);

        return response()->json($orders->flatten(), 200);
    }

    public function pedidos_clientes_from_meli()
    {
        $params = [
            'seller' => $this->auth_user->meli_user_id,
            'order.date_created.from' => '2019-11-15T00:00:00.000-00:00',
            'order.date_created.to' => '2019-11-15T23:59:00.000-00:00',
        ];

        $data = $this->meli_orders->ordenes_por_seller_id($this->auth_user->meli_token, $params);

        return response()->json($data);
    }

    public function order(Request $request)
    {
        $order_id = $request->order_id;
        
        $data = $this->meli_orders->order($this->auth_user->meli_token, $order_id);

        return response()->json($data);
    }

    public function save_order_from_meli()
    {
        $ord = request()->order;
        
        \Log::error("wwwwwwwwwwwwww");
        \Log::error("wwwwwwwwwwwwww");
        \Log::error($ord);
        \Log::error("wwwwwwwwwwwwww");
        \Log::error("wwwwwwwwwwwwww");
        $customer_id = null;
        //dd(gettype($ord), $ord);
        $cstmr = Customer::where('meli_id', $ord['buyer']['id'])->get();

        if ($cstmr->isEmpty()) {

            $phone = (array_key_exists('phone', $ord['buyer'])) ? $ord['buyer']['phone']['area_code'] . ' '. $ord['buyer']['phone']['number'] : 'Sin informar';
            if (array_key_exists('billing_info', $ord['buyer'])) {
                if (array_key_exists('doc_number', $ord['buyer']['billing_info'])) {
                    $billing_info = $ord['buyer']['billing_info']['doc_number'];
                }else{
                    $billing_info = '';
                }
            }else{
                $billing_info = '';
            }
            
            $customer = new Customer;
            $customer->name = array_key_exists('last_name', $ord['buyer']) ? $ord['buyer']['last_name'] : ''; // . ' ' .  array_key_exists('first_name', $ord['buyer']) ? $ord['buyer']['first_name'] : '';
            $customer->meli_nick = array_key_exists('nickname', $ord['buyer']) ? $ord['buyer']['nickname'] : '';
            $customer->meli_id = array_key_exists('id', $ord['buyer']) ? $ord['buyer']['id'] : '';
            $customer->email = array_key_exists('email', $ord['buyer']) ? $ord['buyer']['email'] : '';
            //$customer->number = array_key_exists('doc_number', $ord['buyer']['billing_info']) ? $ord['buyer']['billing_info']['doc_number'] : '';
            $customer->number = $billing_info;
            $customer->phone_1 = $phone;
            
            $customer->save();

            $customer_id = $customer->id;
            
        }else{

            $customer_id = $cstmr->first()->id;
        }
        sleep(1);
        $or = PedidoCliente::where('meli_id', $ord['id'])->get();

        if ($or->isEmpty()) {

            $pc = new PedidoCliente;
            $pc->customer_id = $customer_id;
            /* $pc->delivery_address = $pedido['address'];
            $pc->delivery_date = $pedido['date'];
            $pc->geocoder = $pedido['customer'];
            $pc->total = $pedido['total_pedido']; */
            $pc->meli_id = $ord['id'];
            $pc->is_meli_order = true;
            $pc->meli_data = $ord;
            $pc->status_id = self::PENDIENTE;
            $pc->user_id = auth()->user()->id;
            $pc->save();
            $pc->code = 'PD-' . $this->createDate($ord['date_created']) . '-' . $pc->customer_id . '-' . $pc->id;
            $pc->number = $pc->id;
            $pc->save();

            $pc->refresh();

            return response()->json($pc, 201);
        }

        return response()->json($or, 200);
    }

    public function get_billing_info()
    {

        $result = $this->meli_orders->get_billing_info(auth()->user()->company->mercadoLibre->meli_token, request()->order_id);

        $result = StdClassTool::toArray($result);
        
        return response()->json($result);
        
    }
}
