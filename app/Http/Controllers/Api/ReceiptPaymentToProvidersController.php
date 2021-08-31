<?php

namespace App\Http\Controllers\Api;

use App\Src\Models\Status;
use Illuminate\Http\Request;
use App\Src\Models\PaymentOrder;
use Illuminate\Support\Facades\DB;
use App\Src\Models\PurchaseInvoice;
use App\Http\Controllers\Controller;
use App\Src\Models\ReceiptPaymentToProvider;
use App\Src\Models\ReceiptPaymentToProviderOrders;
use App\Src\Models\ReceiptPaymentToProviderReceipt;
use App\Src\Models\ReceiptPaymentToProvidersInvoice;
use App\Transformers\Provider\ReceiptPaymentToProviderTransformer;

class ReceiptPaymentToProvidersController extends Controller
{
    public function list()
    {
        $receipts = ReceiptPaymentToProvider::query();

        if(request()->provider)
        {
            $receipts = $receipts->where('provider_id', request()->provider);
        }

        $receipts = $receipts->orderBy('created_at', 'desc')->paginate(20);

        $rpts = fractal($receipts, new ReceiptPaymentToProviderTransformer())->toArray()['data'];
        
        $response = [
            'pagination' => [
                'total' => $receipts->total(),
                'per_page' => $receipts->perPage(),
                'current_page' => $receipts->currentPage(),
                'last_page' => $receipts->lastPage(),
                'from' => $receipts->firstItem(),
                'to' => $receipts->lastItem()
            ],
            'data' => $rpts,
        ];

        return response()->json($response, 200);
    }

    public function index()
    {
        $provider_id = request()->provider_id;

        $receipts = ReceiptPaymentToProvider::where('provider_id', $provider_id)
                    ->where('status_id', Status::PENDIENTE)->get();

        $receipts = fractal($receipts, new ReceiptPaymentToProviderTransformer())->toArray()['data'];
        
        return response()->json($receipts, 200);
    }

    public function store()
    {   
        //dd(request()->all());
        //try {
            DB::beginTransaction();
                $orders = request()->orders_to_pay;
                $receipt_with_debt = collect(request()->receipts);

                $receipt = new ReceiptPaymentToProvider;
                $receipt->number = $receipt->setNumber();
                $receipt->provider_id = $orders[0]['provider_id'];
                $receipt->user_id = auth()->user()->id;
                $receipt->total_orders = request()->total_orders;
                $receipt->total_paid = request()->total_paid;
                /*
                * Si el balance da negativo el saldo queda
                * a favor del proveedor
                */
                $receipt->balance = request()->total_orders - request()->total_paid;
                //$receipt->status_id = (request()->total_orders == request()->total_paid) ? Status::CERRADO : Status::PENDIENTE;
                $receipt->status_id = Status::CERRADO;
                $receipt->save();
                $receipt->refresh();

                collect($orders)->map(function($o) use($receipt){
                    

                    $receipt->orders()->create([
                        'payment_order_id' => $o['id'],
                        'receipt_payment_to_provider_id' => $receipt->id,
                    ]);
                    
                    /* $receipt_invoices = new ReceiptPaymentToProvidersInvoice;
                    $receipt_invoices->receipt_payment_to_provider_id = $receipt->id;
                    $receipt_invoices->payment_order_id = $o['id'];
                    $receipt_invoices->save(); */
                    
                    $order_payment = PaymentOrder::find($o['id']);
                    $order_payment->status_id = Status::PAGADA;
                    $order_payment->save();
                    
                    collect($o['data']['items'])->map(function($invoice) use($receipt, $o) {

                        $paid = PurchaseInvoice::whereHas('receipts', function($q) use($invoice) {
                            $q->where('invoice_id', $invoice['id']);
                        })->sum('paid');

                        $purchase_invoice = PurchaseInvoice::find($invoice['id']);
                        $purchase_invoice->paid = $paid + $invoice['paid'];
                        $purchase_invoice->balance = ($purchase_invoice->balance - ($paid + $invoice['paid']));
                        $purchase_invoice->status_id = (($purchase_invoice->total - ($paid + $invoice['paid'])) <= 0) ? Status::PAGADA : Status::PENDIENTE ;
                        $purchase_invoice->save();
                        
                        $receipt->invoices()->attach($purchase_invoice->id, [
                            'paid' => $invoice['paid'],
                            'balance' => 0,
                        ]);

                        /* $receipt_invoices->invoice_id = $invoice['id'];
                        $receipt_invoices->paid = $invoice['paid'];
                        $receipt_invoices->balance = 0;
                        $receipt_invoices->save(); */
                    });
                });

                /* if (request()->cancelation_documents_receipts) {

                    collect(request()->cancelation_documents_receipts)->map(function($r) use($receipt){
                        
                        $receipt->receipts()->create([
                            'receipt_provider_id' => $r['id'],
                            'import' => $r['value'],
                            'receipt_payment_to_provider_id' => $receipt->id
                        ]);
                    });
                } */

                collect(request()->cancelation_documents)->map(function($cd) use($receipt){
                        
                    $receipt->cancelation_documents()->create([
                        'receipt_payment_to_provider_id' => $receipt->id,
                        'payment_type_id' => $cd['payment_type']['id'],
                        'bank_id' => $cd['bank']['id'],
                        'number' => $cd['number'],
                        'expirate_date' => $cd['date'],
                        'import' => $cd['import'],
                        'owner' => $cd['owner'],
                        'status_id' => Status::ACTIVO
                    ]);

                });

                /* if ($receipt_with_debt->isNotEmpty()) {
                    $receipt_with_debt->map(function($r){
                        $rwd = ReceiptPaymentToProvider::find($r['id']);
                        $rwd->status_id = Status::CERRADO;
                        $rwd->save();
                    });
                } */
            DB::commit();
            return response()->json($receipt, 201);
            
        /* } catch (\Exception $e) {
            DB::rollBack();
            return response()->json($e->getMessage(), $e->getCode());
        } */
    }
}
