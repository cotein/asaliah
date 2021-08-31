<?php

namespace App\Http\Controllers\Admin;

use App\Src\Models\TypeUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RolController extends Controller
{
    public function index()
    {
        $roles = TypeUser::all();
        
        return response()->json($roles, 200); 
    }
}
