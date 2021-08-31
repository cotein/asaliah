<?php

namespace App\Http\Middleware;

use Closure;

class CheckMeliErrors
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
        $response =  $next($request);
        $content = $response->content();
        $array = json_decode($content, true);
        //dd($array);
        if ( ! array_key_exists('error', $array['data'])) {
            dd('wwwwwwwwwwwwwwwwwwwwwwwwwww');
            throw 'ssssss';
            
        }
        return $next($request);
    }
}
