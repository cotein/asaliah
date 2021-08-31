<?php

namespace App\Transformers\Orders;

use App\Src\Models\Order;
use App\Src\Tools\Constant;
use League\Fractal\TransformerAbstract;

class SalesResponseTransformer extends TransformerAbstract
{

    public function products($items)
    {
        return collect($items)->map(function($item){
            return [
                'id' => $item->id,
                'index' => $item->index + 1,
                'name' => $item->product->name,
                'price' => $item->price,
                'quantity' => $item->quantity,
                'url' => $item->product->get_pics()
            ];
        });
    }
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Order $order)
    {
        return [
            'id' => $order->id,
            'code' => $order->code,
            'status' => $order->status,
            'cart_products' => $this->products($order->cart->items),
            'payment' => $order->payment,
            'transaction_amount' => $order->payment->transaction_amount,
            'shipping_amount' => $order->payment->shipping_amount,
            'total_amount' => (float) $order->payment->transaction_amount + (float) $order->payment->shipping_amount,
            'card' => [
                'number' => 'XXXX-XXXX-XXXX-'. $order->payment->card['last_four_digits'],
                'expiration_year' => $order->payment->card['expiration_year'],
            ],
            'installments' => $order->payment->installments,
            'payment_method_id' => strtoupper($order->payment->payment_method_id),
            'shipping_location' => [
                'country' =>  Constant::ARGENTINA,
                'province' => $order->address->province->name,
                'city' => $order->address->city->name,
                'cp' => $order->address->cp,
                'street_name' => $order->address->address,
                'street_number' => $order->address->number,
                'message' => $order->address->message,
            ]
        ];
    }
}
