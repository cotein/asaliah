<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function error_401()
    {
        request()->session()->invalidate();
        
        request()->session()->flush();

        return view('errors/401');
    }
}
