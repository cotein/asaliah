<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Src\Models\AccountingYear;
use App\Src\Traits\DateFormatTrait;
use App\Http\Controllers\Controller;

class AccountingYearController extends Controller
{
    use DateFormatTrait;
    
    public function store()
    {
        $ay = request()->all();

        $check = AccountingYear::where('from', $ay['from'])->where('to', $ay['to'])->get();
        
        if ($check->isNotEmpty()) {
           throw new \Exception("Éste ejercicio ya existe");
        }

        $accounting_year = new AccountingYear;
        $accounting_year->name = $ay['name'];
        $accounting_year->from = $ay['from'];
        $accounting_year->to = $ay['to'];
        $accounting_year->status_id = self::ACTIVO;

        $accounting_year->save();

        return response()->json($accounting_year, 201);
        
    }
}
