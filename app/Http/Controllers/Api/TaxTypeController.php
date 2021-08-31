<?php

namespace App\Http\Controllers\Api;

use App\Src\Models\TaxType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaxTypeController extends Controller
{
    public function index()
    {
        $taxesTypes = TaxType::all();

        return response()->json($taxesTypes, 200);
    }
}
