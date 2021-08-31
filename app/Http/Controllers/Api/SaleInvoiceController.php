<?php

namespace App\Http\Controllers\Api;

use App\Src\Models\Status;
use App\Src\Models\Receipt;
use Illuminate\Http\Request;
use App\Src\Models\SaleInvoice;
use App\Http\Controllers\Controller;
use App\Transformers\InvoiceListTransformer;
use App\Src\Repositories\App\SaleInvoiceRepository;
use App\Transformers\SaleInvoiceByCustomerTransformer;
use App\Transformers\Afip\GetCaeOnAFipToSaveTransformer;
use App\Transformers\Receipt\ReceiptWithDebtTransformer;

class SaleInvoiceController extends Controller
{
    protected $sirepo;
    
    public function __construct()
    {
        $this->sirepo = new SaleInvoiceRepository();
    }
    
    public function index()
    {
        $invoices = SaleInvoice::query();

        if(request()->customer)
        {
            $invoices = $invoices->where('customer_id', request()->customer);
        }

        $invoices = $invoices->orderBy('created_at', 'desc')->paginate(20);

        $invoices_list = fractal($invoices, new InvoiceListTransformer())->toArray()['data'];
        
        $response = [
            'pagination' => [
                'total' => $invoices->total(),
                'per_page' => $invoices->perPage(),
                'current_page' => $invoices->currentPage(),
                'last_page' => $invoices->lastPage(),
                'from' => $invoices->firstItem(),
                'to' => $invoices->lastItem()
            ],
            'data' => $invoices_list
        ];
        return response()->json($response, 200);
    }

    public function store()
    {
        //dd(request()->all());
        activity()
        ->withProperties('SaleInvoice')
        ->log(collect(request()->invoice)->toJson());
        //dd(request()->all());
        $bill_data = fractal(request()->invoice, new GetCaeOnAFipToSaveTransformer())->toArray()['data'][0];
        //dd( request()->invoices);
        $si = $this->sirepo->create($bill_data, request()->invoice, request()->invoice['products'], request()->invoices, request()->invoice['percep_iibb']);
        
        return response()->json($si, 201);
    }

    public function byCustomer()
    {
        $customer = request()->customer['id'];

        $r = request()->all();

        $invoices = SaleInvoice::where('customer_id', $customer)
                    ->where('searching', false)->whereHas('voucher', function($query) use($r){
            //$query->where('name', 'LIKE', '%'. 'FACTURA'.'%');
            $query->where('name', 'LIKE', '%'. $r['query'] .'%');
            
        })->get();
        
        $invoices =  fractal($invoices, new SaleInvoiceByCustomerTransformer())->toArray()['data'];

        return response()->json($invoices, 200);
    }

    public function byCustomerWithDebt()
    {
        $customer = request()->customer['id'];

        $r = request()->all();

        $invoices = SaleInvoice::where('customer_id', $customer)
                    ->where('status_id', Status::PENDIENTE)
                    ->whereHas('voucher', function($query) use($r){
            //$query->where('name', 'LIKE', '%'. 'FACTURA'.'%');
            $query->where('name', 'LIKE', '%'. $r['query'] .'%');
            
        })->get();

        $rs = Receipt::where('customer_id', $customer)
                    ->where('status_id', Status::PENDIENTE)->get();

        $receipt =  fractal($rs, new ReceiptWithDebtTransformer())->toArray()['data']; 
    
        $invoices =  fractal($invoices, new SaleInvoiceByCustomerTransformer())->toArray()['data'];
        
        $invoices = collect($invoices);

        $invoices = $invoices->merge($receipt);

        return response()->json($invoices->toArray(), 200);
    }

    public function isSearching()
    {
        $invoice = SaleInvoice::find(request()->invoice);
        $invoice->searching = ! $invoice->searching;
        $invoice->save();
    }
}
