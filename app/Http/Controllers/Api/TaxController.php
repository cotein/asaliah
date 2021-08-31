<?php

namespace App\Http\Controllers\Api;

use App\Src\Models\Tax;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\Tax\TaxTransformer;

class TaxController extends Controller
{
    const ACTIVO = 1;
    
    const CREDITO = 1;

    public function index()
    {
        $taxes = Tax::orderBy('name')->get();

        $taxes = fractal($taxes, new TaxTransformer())->toArray()['data'];

        return response()->json($taxes, 200);
    }

    public function store()
    {
        $tax = request()->tax;

        $new_tax = new Tax;

        $new_tax->name = strtoupper($tax['name']);
        $new_tax->accounting_account_id = $tax['accounting_account']['id'];
        $new_tax->tax_type_id = $tax['type']['id'];
        $new_tax->state_id = $tax['state']['id'];
        $new_tax->movement_type_id = 1;//crédito
        $new_tax->active = true;

        $new_tax->save();

        $tax = fractal($new_tax, new TaxTransformer())->toArray()['data'];

        return response()->json($tax, 201);

    }

    public function set_accounting_account()
    {
        $tax = Tax::find(request()->tax_id);
        $tax->accounting_account_id = request()->accounting_account['id'];
        $tax->save();

        $tax = fractal($tax, new TaxTransformer())->toArray()['data'];

        return response()->json($tax, 200);
    }

    public function set_type()
    {
        $tax = Tax::find(request()->tax_id);
        $tax->tax_type_id = request()->type['id'];
        $tax->save();

        $tax = fractal($tax, new TaxTransformer())->toArray()['data'];

        return response()->json($tax, 200);
    }

    public function set_state()
    {
        $tax = Tax::find(request()->tax_id);
        $tax->state_id = request()->state['id'];
        $tax->save();

        $tax = fractal($tax, new TaxTransformer())->toArray()['data'];

        return response()->json($tax, 200);
    }

    public function active()
    {
        $tax = Tax::find(request()->tax_id);
        $tax->active = request()->active;
        $tax->save();

        $tax = fractal($tax, new TaxTransformer())->toArray()['data'];

        return response()->json($tax, 200);
    }
}
