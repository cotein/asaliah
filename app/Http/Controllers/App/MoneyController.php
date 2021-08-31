<?php

namespace App\Http\Controllers\App;

use App\Src\Models\Money;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MoneyController extends Controller
{
    public function index()
    {
        $moneys = Money::all();

        return response()->json($moneys, 200);
    }
}
