<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Events\UnEventoDePrueba;
use App\Src\Models\PurchaseInvoice;
use App\Events\PurchaseInvoiceSaved;
use App\Http\Controllers\Controller;
use App\Rules\UniquePurchaseInvoice;
use App\Src\Traits\PurchaseInvoiceTrait;
use App\Events\WebHookMessageWasReceived;
use App\Http\Requests\PurchaseInvoiceRequest;
use App\Src\Repositories\App\PurchaseInvoiceRepository;
use App\Transformers\PurchaseInvoice\PurchaseInvoiceTransformer;
use App\Transformers\PurchaseInvoice\PurchaseInvoiceListTransformer;

class PurchaseInvoiceController extends Controller
{
    use PurchaseInvoiceTrait;
    
    private $purchase_invoice_repo;
    
    public function __construct()
    {
        $this->purchase_invoice_repo = new PurchaseInvoiceRepository;
    }

    public function index()
    {
        $pi = $this->list(request());
        
        $pi = $pi->paginate(20);
        
        $purchase_invoices = fractal($pi, new PurchaseInvoiceListTransformer())->toArray()['data'];

        $response = [
            'pagination' => [
                'total' => $pi->total(),
                'per_page' => $pi->perPage(),
                'current_page' => $pi->currentPage(),
                'last_page' => $pi->lastPage(),
                'from' => $pi->firstItem(),
                'to' => $pi->lastItem()
            ],
            'data' => $purchase_invoices,
        ];

        return response()->json($response, 200);
    }


    public function store(PurchaseInvoiceRequest $request)
    {
        $invoice = request()->all();

        $pi = $this->purchase_invoice_repo->create($invoice);

        $purchase_invoice = $this->purchase_invoice_repo->create_items($pi, $invoice['invoice']['articles']);
        
        $taxes = $this->purchase_invoice_repo->create_tax($pi, $invoice['invoice']['taxes']);

        $pi = fractal($purchase_invoice, new PurchaseInvoiceTransformer())->toArray()['data'];
        
        PurchaseInvoiceSaved::dispatch($purchase_invoice);

        return response()->json($pi, 201);
    }
}
