<?php

namespace App\Transformers\Pedidos;

use App\Src\Models\Order;
use App\Src\Traits\DateFormatTrait;
use League\Fractal\TransformerAbstract;

class PedidosTransformer extends TransformerAbstract
{
    use DateFormatTrait;
    
    public function status($status)
    {
        switch ($status) {
            case 'approved':
                return 'Aprobado';
                break;
            case 'in_process':
                return 'Pago pendiente';
            case 'rejected':
                return 'Rechazo, llamar para autorizar';
            default:
                # code...
                break;
        }
    }

    public function billable_product($cart)
    {
        return $cart->items->map(function($i){
            return [
                'product_id' => $i->product->id,
                'name' => $i->product->name,
                'has_iva' => $i->product->hasIva(),
            ];
        });
    }
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Order $pedido)
    {
        return [
            'id'   => $pedido->id,
            'date' => $this->LongDateToArgentinaFormat($pedido->created_at),
            'code' => $pedido->code,
            'mercadopago_id' => $pedido->payment->mercadopago_id,
            'cart' => $pedido->cart,
            'status' => $this->status($pedido->status),
            'billable_product' => $this->billable_product($pedido->cart),
            'billed' => ($pedido->billed) ? 'SI' : 'NO',
        ];
    }
}
