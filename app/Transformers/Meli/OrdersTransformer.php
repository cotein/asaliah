<?php

namespace App\Transformers\Meli;

use App\Src\Traits\DateFormatTrait;
use App\Src\Traits\MoneyFormatTrait;
use League\Fractal\TransformerAbstract;

class OrdersTransformer extends TransformerAbstract
{
    use MoneyFormatTrait, DateFormatTrait;

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
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform($order)
    {

        return [
            'id' => $order->id,
            'date' => $this->transformDate($order->date_created),
            'name' => $order->buyer->first_name . ' ' . $order->buyer->last_name,
            'phone' => $order->buyer->phone->area_code . ' - ' . $order->buyer->phone->number,
            'price' => $this->DisplayToUserCurrency($order->total_amount),
            'status' => $this->status($order->status)
        ];
    }
}
