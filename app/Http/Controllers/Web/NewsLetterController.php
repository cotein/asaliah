<?php

namespace App\Http\Controllers\Web;

use App\Src\Models\Mailing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsLetterController extends Controller
{
    public function store(Request $request)
    {
        $count = Mailing::where('email', $request->email)->get()->count();

        $request->validate([
            'email' => 'required|unique:mailings,email|email',
        ],
        [
            'email.required' => "El email es requerido",
            'email.email' => "El dato debe ser una cuanta de correo válida",
            'email.unique' => "El email ya se encuentra registrado en nuestra base de datos"
        ]);

        $email = new Mailing;
        $email->email = $request->email;
        $email->save();

        return response()->json('ok', 200);
    }
}
