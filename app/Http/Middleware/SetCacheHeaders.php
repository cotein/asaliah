<?php

namespace App\Http\Middleware;

use Closure;

class SetCacheHeaders
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
        $response = $next($request);
        $response = $response instanceof RedirectResponse ? $response : response($response);

        return response($response)
        ->withHeaders([
            "Cache-Control => no-store, no-cache, must-revalidate, max-age=0",
            "Cache-Control => post-check=0, pre-check=0", false,
            "Pragma => no-cache",
            'Content-Type => text/html'
        ]);
    }
}
