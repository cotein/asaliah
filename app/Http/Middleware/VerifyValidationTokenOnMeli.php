<?php

namespace App\Http\Middleware;

use Closure;
use App\Src\Meli\MiMeli;
use Illuminate\Support\Facades\Auth;

class VerifyValidationTokenOnMeli extends MiMeli
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //dd(auth()->user()->company->mercadoLibre->meli_refresh_token);
        if (! auth()->user()->has_token()) {
            
            return redirect('/meli');
        }

        if(auth()->user()->verify_expiration_time_token())
        {
            $code = auth()->user()->company->mercadoLibre->meli_refresh_token;
            //dd(auth()->user()->company->mercadoLibre->meli_refresh_token);
            $result = $this->getToken($code, true);

            $result = json_decode($result[0], true);

            $user = auth()->user()->updateDataFromMeli($result);

            return $next($request);
        }

        return $next($request);
    }
}
