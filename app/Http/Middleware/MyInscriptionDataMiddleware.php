<?php

namespace App\Http\Middleware;

use Closure;

class MyInscriptionDataMiddleware
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

        if (! auth()->user()->hasCompany()){
            return redirect('/afip/mis-datos');
        }

        if (auth()->user()->hasCompany() && is_null(auth()->user()->company->getMedia('logo')->first())) {
            return redirect('/empresa/datos');
        }
        
        return $next($request);

    }
}
