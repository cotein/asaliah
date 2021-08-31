<?php

namespace App\Http\Controllers\Api;

use App\Exports\Iva\IvaCompras;
use App\Src\Models\PurchaseInvoice;
use App\Src\Traits\DateFormatTrait;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Transformers\PurchaseInvoice\IvaComprasAlicuotasTransformer;
use App\Transformers\PurchaseInvoice\IvaComprasComprobantesTransformer;

class IvaComprasController extends Controller
{
    use DateFormatTrait;

    public function index()
    {
        $pi = $this->list(request());
        
        $pi = $pi->get();

        $purchase_invoices = fractal($pi, new IvaComprasComprobantesTransformer())->toArray()['data'];

        return response()->json($purchase_invoices, 200);

    }

    public function resolves_date($from_date,$to_date)
    {
        return [
          
            $from = $this->change_divider_slash($from_date),
            
            $to = $this->change_divider_slash($to_date)
        ];
    }

    public function comprobantes()
    {
        $purchase_invoices = PurchaseInvoice::whereBetween('imputation_date', $this->resolves_date(request()->from_date, request()->to_date ) )->get();

        $purchase_invoices = fractal($purchase_invoices, new IvaComprasComprobantesTransformer())->toArray()['data'];

        return response()->json($purchase_invoices, 200);
    }

    public function alicuotas()
    {
        $purchase_invoices = PurchaseInvoice::whereBetween('imputation_date', $this->resolves_date(request()->from_date, request()->to_date ) )->get();

        $transformer =  new IvaComprasAlicuotasTransformer();
        
        $result = $purchase_invoices->map(function($pi) use($transformer) {
            return $transformer->transform($pi);
        })->flatten()->toArray();

        return response()->json($result, 200);
    }

    public function to_excel()
    {
        $from = $this->ShortDateArgentinaTo_yyyy_mm_dd(request()->from_date);
        
        $to = $this->ShortDateArgentinaTo_yyyy_mm_dd(request()->to_date);
        
        $invoices = PurchaseInvoice::whereBetween('imputation_date', [$from . ' 00:00:00', $to . ' 23:59:59'])->get();
        
        if ($invoices->isEmpty()) throw new \Exception("No existen datos para la consulta");
    
        Storage::deleteDirectory('xls');

        Excel::store(new IvaCompras($from, $to), '/xls/invoices.xlsx');

        $file_path = Storage::url('/xls/invoices.xlsx');

        return response()->json($file_path, 200);
    }
}
