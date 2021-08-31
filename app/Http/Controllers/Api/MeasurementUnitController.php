<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Src\Models\MeasureUnity;
use App\Http\Controllers\Controller;

class MeasurementUnitController extends Controller
{
    public function index()
    {
        return MeasureUnity::orderBy('name')->get();
    }
}
