<?php

namespace App\Http\Controllers\Api;

use App\Src\Models\Bank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\BaseController;

class BankController extends BaseController
{
    public function index()
    {
        $banks = Bank::orderBy('name')->get();

        return response()->json($banks, 200);
    }

    public function findBankByName()
    {
        $banks = Bank::search(request()->bank)->get();

        return response()->json($banks, 200);
    }
}
