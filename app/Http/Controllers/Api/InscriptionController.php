<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Src\Models\Inscription;
use App\Http\Controllers\Controller;

class InscriptionController extends Controller
{
    public function index()
    {
        $inscriptions = Inscription::orderBy('name')->get();

        return response()->json($inscriptions, 200);
    }
}
