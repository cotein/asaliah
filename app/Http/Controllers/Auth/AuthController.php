<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Carbon\Carbon;
use App\Src\Meli\AuthMeli;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\SignupActivate;
use Kolovious\MeliSocialite\Facade\Meli;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{
    use AuthenticatesUsers;
    
    public function signup(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'email'    => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
        ]);

        $user = new User([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
            'activation_token'  => str_random(60),
        ]);

        $user->save();

        //$user->notify(new SignupActivate($user));
        
        return response()->json([
            'message' => 'Successfully created user!'], 201);
    }

   /*  public function login(Request $request)
    {
        $request->validate([
            'email'       => 'required|string|email',
            'password'    => 'required|string',
            'remember_me' => 'boolean',
        ]);

        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Unauthorized'], 401);
        }

        $user = Auth::guard();
        dd($user);
        $tokenResult = $user->createToken('mi-sistema-con-mercadolibre');

        $token = $tokenResult->token;

        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }

        $token->save();

        $contents = \View::make('app');
        $response = \Response::make($contents, 200);
        $response->header('Authorization', 'Bearer '.$tokenResult->accessToken);
        return $response; 
    } */

    public function signupActivate($token)
    {
        $user = User::where('activation_token', $token)->first();

        if (!$user) {
            return response()->json(['message' => 'El token de activación es inválido'], 404);
        }

        $user->active = true;
        $user->activation_token = '';
        $user->save();

        return $user;
    }
    
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json(['message' => 
            'Successfully logged out']);
    }


    public function user(Request $request)
    {
        return response()->json($request->user());
    }


    

   
}
