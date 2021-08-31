<?php

namespace App\Http\Controllers\Api;

use App\Src\Models\Voucher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VoucherController extends Controller
{
    public function index()
    {
        $vouchers = Voucher::all();

        return response()->json($vouchers, 200);
    }
}
