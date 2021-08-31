<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Src\Models\PurchaserDocument;

class PurchaseDocumentController extends Controller
{
    public function index()
    {
        $purchase_document = PurchaserDocument::orderBy('name')->get();

        return response()->json($purchase_document, 200);
    }
}
