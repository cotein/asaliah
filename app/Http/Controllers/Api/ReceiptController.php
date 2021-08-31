<?php

namespace App\Http\Controllers\Api;

use App\Src\Models\Status;
use App\Src\Models\Receipt;
use Illuminate\Http\Request;
use App\Src\Models\SaleInvoice;
use App\Src\Models\ReceiptInvoices;
use App\Http\Controllers\Controller;
use App\Transformers\Customer\ReceiptPaymentTransformer;

class ReceiptController extends BaseController
{
    const NOTA_CREDITO_A = 3;
    const NOTA_CREDITO_B = 8;
    const NOTA_CREDITO_C = 13;
    const RECIBO = 998;

    public function index()
    {
        $receipts = Receipt::query();

        if(request()->customer)
        {
            $receipts = $receipts->where('customer_id', request()->customer);
        }

        /* if(request()->status)
        {
            $receipts = $receipts->where('status_id', request()->status);
        } */

        $receipts = $receipts->paginate(20);

        $data = fractal($receipts, new ReceiptPaymentTransformer())->toArray()['data'];
        
        /* $customers_data = collect($pedidos)->groupBy('customer')->map(function($c){
            return $c->first();
        })->map(function($item, $key){
            return [
                'value' => $key,
                'data' => [
                    'customer_id' => $item['customer_id'],
                    'delivery_address' => (is_null($item['delivery_address']) ? true : false)
                ]
            ];
        })->values()->toArray(); */
        
        $response = [
            'pagination' => [
                'total' => $receipts->total(),
                'per_page' => $receipts->perPage(),
                'current_page' => $receipts->currentPage(),
                'last_page' => $receipts->lastPage(),
                'from' => $receipts->firstItem(),
                'to' => $receipts->lastItem()
            ],
            'data' => $data,
        ];
        
        return response()->json($response, 200);
    }

    public function store()
    {
        $total_invoices = request()->total_invoices_import;

        $cancelation_documents = request()->cancelation_documents_import;

        $receipt = New Receipt;
        $receipt->number = $receipt->setNumber();
        $receipt->customer_id = request()->customer['id'];
        $receipt->status_id = ($cancelation_documents == $total_invoices) ? Status::CERRADO : Status::PENDIENTE;
        $receipt->total_invoices_import = $total_invoices;
        $receipt->cancelation_documents_import = $cancelation_documents;
        $receipt->diff_import = ($total_invoices - $cancelation_documents);
        $receipt->date = request()->receipt_date;

        $receipt->save();
        $receipt->refresh();

        $total_notas_credito = 0;

        $total_operacion = 0;

        foreach (request()->invoices as $i)
        {
            $cbte_tipo = (int) $i['cbte_tipo'];

            if($cbte_tipo == 3 || $cbte_tipo == 8 || $cbte_tipo == 13 ){

                $receipt->cancelations()->create
                (
                    [
                        'receipt_id' => $receipt->id,
                        'invoice_id' => $i['id'],
                        'import' => ($i['total'] * -1),
                    ]
                );
                
                $total_notas_credito = $total_notas_credito + ($i['total'] * -1);

            }elseif ($cbte_tipo == 998){
                $receipt->cancelations()->create
                    (
                        [
                            'receipt_id' => $receipt->id,
                            'receipt_id_cancelation' => $i['id'],
                            'import' => $i['total'],
                        ]
                    );
            } else{

                $receipt_invoice = new ReceiptInvoices;
                $receipt_invoice->receipt_id = $receipt->id;
                $receipt_invoice->invoice_id = $i['id'];
                $receipt_invoice->save();
            }

            $invoice = SaleInvoice::find($i['id']);
            if (! empty($invoice)) {
                $invoice->isSearching();
            }
        }

        $total_operacion = $total_operacion + $total_notas_credito;
        echo ' total notas credito ' . $total_notas_credito . '    ';

        foreach (request()->cancelation_documents as $cd){
            $receipt->cancelations()->create(
                [
                    'receipt_id' => $receipt->id,
                    'payment_type_id' => $cd['type_id'],
                    'bank_id' => $cd['bank_id'],
                    'expirate_date' => $cd['date'],
                    'number' => strtoupper($cd['number']),
                    'import' => $cd['total'],
                    'owner' => strtoupper($cd['owner']),
                    'status_id' => Status::ACTIVO,
                ]
            );
            $total_operacion = $total_operacion + $cd['total'];
            echo ' total opraconnnnnn ' . $total_operacion . '    ';
        }

        usleep(500);
        
        collect(request()->invoices)->each(function($i) use ($total_operacion){
            $cbte_tipo = (int) $i['cbte_tipo'];
            if($cbte_tipo == 3 || $cbte_tipo == 8 || $cbte_tipo == 13 ){
                $invoice = SaleInvoice::find($i['id']);
                $invoice->paid();
            }
            elseif ($cbte_tipo == 998){
                if ($total_operacion >= $i['total']) {
                    $receipt_as_voucher = Receipt::find($i['id']);
                    $receipt_as_voucher->status_id = Status::CERRADO;
                    $receipt_as_voucher->diff_import = 0;
                    $receipt_as_voucher->save();

                    $total_operacion = $total_operacion - $i['total'];
                }else{
                    $receipt_as_voucher = Receipt::find($i['id']);
                    $receipt_as_voucher->diff_import = $total_operacion - $i['total'];
                    $receipt_as_voucher->save();

                    $total_operacion = $total_operacion - $i['total'];
                }
            }
            else{
                    $invoice = SaleInvoice::find($i['id']);
                    $invoice->paid();
                    $total_operacion = $total_operacion - $i['total'];
            }
        });
        $receipt = fractal($receipt, new ReceiptPaymentTransformer())->toArray()['data'];

        return response()->json($receipt, 201);

    }
}
