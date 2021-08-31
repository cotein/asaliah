<?php

namespace App\Transformers\Meli;

use App\Src\Models\Customer;
use App\Src\Models\PedidoCliente;
use App\Src\Traits\DateFormatTrait;
use App\Src\Traits\MoneyFormatTrait;
use League\Fractal\TransformerAbstract;

class SaveCustomerFromMeliOnSaleOrder extends TransformerAbstract
{
    use MoneyFormatTrait, DateFormatTrait;

    const PENDIENTE = 6;

    public function status($status)
    {
        switch ($status) {
            case 'paid':
                return 'Pagado';
                break;
        }
    }

    public function transformDate($date)
    {
        $d = $this->createDate($date);

        return $this->ShortDateToArgentinaFormat($d);
    }

    public function customerSave($order)
    {
        
        $cstmr = Customer::where('meli_id', $order->buyer->id)->get();

        if ($cstmr->isEmpty()) {
            $customer = new Customer;
            $customer->name = $order->buyer->last_name . ' ' . $order->buyer->first_name;
            $customer->meli_nick = $order->buyer->nickname;
            $customer->meli_id = $order->buyer->id;
            $customer->email = $order->buyer->email;
            $customer->number = $order->buyer->billing_info->doc_number;
            $customer->phone_1 = (property_exists($order->buyer, "phone")) ? $order->buyer->phone->area_code . ' '. $order->buyer->phone->number : '';
            
            $customer->save();

            return $customer->id;
        }
        
        return $cstmr->first()->id;
    }

    public function pedidoClienteSave($customer_id, $order)
    {
        $or = PedidoCliente::where('meli_id', $order->id)->get();

        if ($or->isEmpty()) {
            
            $pc = new PedidoCliente;
            $pc->customer_id = $customer_id;
            /* $pc->delivery_address = $pedido['address'];
            $pc->delivery_date = $pedido['date'];
            $pc->geocoder = $pedido['customer'];
            $pc->total = $pedido['total_pedido']; */
            $pc->meli_id = $order->id;
            $pc->is_meli_order = true;
            $pc->meli_data = $order;
            $pc->status_id = self::PENDIENTE;
            $pc->user_id = auth()->user()->id;
            $pc->save();
            
            $pc->code = 'PD-' . $this->createDate($order->date_created) . '-' . $pc->customer_id . '-' . $pc->id;
            $pc->number = $pc->id;
            $pc->save();

            $pc->refresh();
        }
    }
    
    public function transform($order)
    {
        $customer_id = $this->customerSave($order);

        $this->pedidoClienteSave($customer_id, $order);
        
        return [
            'id' => $order->id,
            'date' => $this->transformDate($order->date_created),
            'name' => $order->buyer->first_name . ' ' . $order->buyer->last_name,
            'phone' => (property_exists($order->buyer, "phone")) ? $order->buyer->phone->area_code . ' '. $order->buyer->phone->number : '',
            'price' => $this->DisplayToUserCurrency($order->total_amount),
            'status' => $this->status($order->status)
        ];
    }
}
