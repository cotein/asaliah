<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\User\UserTransformer;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        
        $users = fractal($users, new UserTransformer())->toArray()['data'];

        return response()->json($users, 200); 
    }
}
