<?php

namespace App\Http\Controllers\Api;

use App\Src\Models\Order;
use Illuminate\Http\Request;
use App\Src\Tools\StdClassTool;
use App\Http\Controllers\Controller;
use App\Src\Afip\WS\Source\WSFEV1Manager;
use App\Transformers\Pedidos\PedidosTransformer;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        $orders = fractal($orders, new PedidosTransformer())->toArray()['data'];

        return response()->json($orders, 200);
    }

    public function bill(Request $request)
    {
        $order_id = $request->order['id'];

        $ws = new WSFEV1Manager($order_id);

        $FECAE = $ws->FECAEDetRequest();

        $invoice = $ws->wsfev1->getCaeOnAfip($FECAE);

        $invoice_array = StdClassTool::toArray($invoice);
        
        return response()->json($invoice_array, 200);
        
    }
}
