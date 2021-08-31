<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Src\Tools\StdClassTool;
use App\Events\PaymentWasCreated;
use App\Src\MercadoPago\MPPayment;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Src\Repositories\Web\OrderRepository;
use App\Src\MercadoPago\Traits\ProcessRequestTrait;
use App\Src\MercadoPago\Traits\DataBasePaymentTrait;
use App\Src\Repositories\Web\ShoppingCartRepository;
use App\Transformers\Orders\SalesResponseTransformer;

class CartController extends Controller
{
    use ProcessRequestTrait, DataBasePaymentTrait;

    private $payment;

    private $cart_repository;
    
    private $order_repository;

    public function __construct(ShoppingCartRepository $cart_repository, OrderRepository $order_repository)
    {
        $this->payment = new MPPayment();

        $this->cart_repository = $cart_repository;
        
        $this->order_repository = $order_repository;
    }

    public function cart_details()
    {
        return view('web.cart-details');
    }

    public function sales_process_response()
    {
        return view('web.cart-sales-process-response');
    }


    public function mercadopago_callback(Request $request)
    {
        /* try {
            
            DB::beginTransaction(); */
            
            $cart = StdClassTool::jsonDecode($request->cart);
            //dd($cart);
            $data_for_payment = [
                'token' => $request->token,
                'issuer_id ' => $request->issuer_id,
                'installments' => $request->installments,
                'payment_method_id' => $request->payment_method_id,
                'amount' => $this->amountCart($cart->products),
                'items' => $this->Cart($cart->products),
                'email' => $cart->email,
                'zip_code'=> $cart->city->cp,
                'street_name'=> $cart->street,
                'street_number'=> $cart->street_number,
                'shipping_amount'=> $cart->shipping_amount,
                'description' => $cart->products[0]->item->title
                //'message' => (is_null($cart->message)) ? null : $cart->message,
            ];

            $payment = $this->payment->createPayment($data_for_payment);

            $p = StdClassTool::jsonDecode($payment, true);

            $created_payment = $this->store($p);

            $data_for_shopping_cart = [
                'cart' => $cart,
                'data_for_payment' => $data_for_payment,
                'created_payment' => $created_payment,
                'shipping_amount'=> $cart->shipping_amount,
            ];

            $cart_model = $this->cart_repository->store($data_for_shopping_cart);

            $data_for_order = [
                
                'payment' => $payment,

                'created_payment' => $created_payment,

                'data_for_payment' => $data_for_payment,

                'cart' => $cart_model
            ]; 

            $order = $this->order_repository->store($data_for_order);
            
            $order->address()->create([
                'country_id' => $cart->country->id,
                'province_id' => $cart->province->id,
                'city_id' => $cart->city->id,
                'address' => $cart->street,
                'number' => $cart->street_number,
                'cp' => $cart->city->cp,
                'message' => $cart->message,
            ]);

            DB::commit();

            $order = fractal($order, new SalesResponseTransformer())->toArray()['data'];

            return view('web.cart-sales-process-response')->with('order', $order);

        /* } catch (\Throwable $th) {
            DB::rollback();

        } */
        
    }
}

