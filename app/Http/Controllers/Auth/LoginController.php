<?php

namespace App\Http\Controllers\Auth;

use Jenssegers\Date\Date;
use App\Src\Meli\MeliUsers;
use App\Src\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $meli_user;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/pedidos/clientes/listado';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

        $this->meli_user = new MeliUsers;
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {

            $user = $this->guard('api')->user();

            $token = $user->createToken('MaguYEmi')->accessToken;

            $user->saveToken($token);

            $company = Company::find(1);

            if ($company) {
                $user->company_id = $company->id;
                $user->save();
            }

            return $this->sendLoginResponse($request);
        }
        activity("Login")->withProperties(collect($request->all())->toJson())->log('Login');
        return $this->sendFailedLoginResponse($request);
    }


    public function logout(Request $request)
    {
        //$user = Auth::guard('api')->user();
        $user = auth()->user();

        \Auth::logout();
        
        $user->revokeToken();
        
        $user->revokeMeliToken();

        $request->session()->flush();

        $request->session()->invalidate();

        return redirect()->away('https://www.mercadolibre.com/jms/mla/lgz/logout?go=https://auth.mercadolibre.com.ar/authorization?redirect_uri=www.google.com&response_type=code&client_id=6886428381996727&platform_id=ml');
        //$this->meli_user->meli_logout();

        return redirect('/');
    }

    protected function credentials(Request $request)
    {
        $credentials =  $request->only($this->username(), 'password');

        $credentials['active'] = true;

        return $credentials;
    }
}
