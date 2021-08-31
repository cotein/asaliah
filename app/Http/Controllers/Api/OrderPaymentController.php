<?php

namespace App\Http\Controllers\Api;

use App\Src\Models\Status;
use Illuminate\Http\Request;
use App\Src\Models\PaymentOrder;
use App\Src\Models\PurchaseInvoice;
use App\Http\Controllers\Controller;
use App\Src\Models\PaymentOrderItem;
use App\Transformers\PaymentOrder\PaymentOrderTransformer;

class OrderPaymentController extends Controller
{
    const ORDEN_DE_PAGO = 90;

    public function index()
    {
        $pos = PaymentOrder::query();

        if(request()->provider)
        {
            $pos = $pos->where('provider_id', request()->provider);
        }

        $pos = $pos->orderBy('created_at', 'desc')->paginate(20);

        $payment_orders = fractal($pos, new PaymentOrderTransformer())->toArray()['data'];
        
        $response = [
            'pagination' => [
                'total' => $pos->total(),
                'per_page' => $pos->perPage(),
                'current_page' => $pos->currentPage(),
                'last_page' => $pos->lastPage(),
                'from' => $pos->firstItem(),
                'to' => $pos->lastItem()
            ],
            'data' => $payment_orders,
        ];

        return response()->json($response, 200);
    }

    public function store()
    {
        //dd(request()->all());
        $number = PaymentOrder::max('number');

        $num = ($number) ? $number + 1 : 1;

        $order = request()->order_payment;

        $total = collect($order)->sum(function($i){
            return $i['data']['balance_raw'];
        });

        $payment_order = new PaymentOrder;

        $payment_order->number = $num;
        $payment_order->provider_id = $order[0]['provider_id'];
        $payment_order->voucher_id = self::ORDEN_DE_PAGO;
        $payment_order->user_id = auth()->user()->id;
        $payment_order->status_id = Status::PENDIENTE;
        $payment_order->total = $total;
        $payment_order->save();

        collect($order)->map(function($i) use($payment_order){
            $item = new PaymentOrderItem;
            $item->payment_order_id = $payment_order->id;
            $item->purchase_invoice_id = $i['id'];
            $item->save();

            $purchase_invoice = PurchaseInvoice::find($i['id']);
            $purchase_invoice->to_pay();

            $item->refresh();
        });

        $po = fractal($payment_order, new PaymentOrderTransformer())->toArray()['data'];

        return response()->json($po, 201);
    }

    public function delete()
    {
        $order = request()->order_payment;

        $order_payment = PaymentOrder::find($order['id']);
        $order_payment->status_id = Status::ELIMINADO;
        $order_payment->save();
        $order_payment->refresh();

        collect($order['items'])->map(function($i){
            $purchase_invoice = PurchaseInvoice::find($i['id']);
            $purchase_invoice->status_id = Status::PENDIENTE;
            $purchase_invoice->save();
        });

        return response()->json($order_payment, 200);
        
    }
}
