<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function list()
    {
        return view('app.user.commission')->with(['view_name' => 'Mis Comisiones']);
    }
}
