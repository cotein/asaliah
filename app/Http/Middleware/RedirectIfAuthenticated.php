<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    const ADMINISTRADOR_DEL_SISTEMA = 'ADMINISTRADOR DEL SISTEMA';
    const GERENCIA = 'GERENCIA';
    const VENTAS = 'VENTAS';
    const COMPRAS = 'COMPRAS';
    const PRODUCCION = 'PRODUCCION';
    const ADMINISTRACION = 'ADMINISTRACION';
    const LOGISTICA = 'LOGISTICA';
    const FINANZAS = 'FINANZAS';
    const RRHH = 'RRHH';
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {

            switch (auth()->user()->getRole()) {

                case self::GERENCIA || self::ADMINISTRADOR_DEL_SISTEMA:
                    return redirect('/pedidos/clientes/listado');
                
                case self::VENTAS:
                    return redirect('/pedidos/clientes/nuevo');
                
                case self::COMPRAS:
                    return redirect('/proveedores/comprobantes/ingreso');
                
                case self::GERENCIA:
                    return redirect('/empresa/datos');
                
                default:
                    # code...
                    break;
            }
        }

        return $next($request);
    }
}
