<?php

namespace App\Http\Controllers\Auth;

use GuzzleHttp\Client;
use App\Src\Meli\AuthMeli;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Src\Meli\Sdk\lib\Api\OAuth20Api;
use Kolovious\MeliSocialite\Facade\Meli;


class AuthMeliController extends Controller
{
    protected $authMeli;

    public function __construct()
    {
        $this->authMeli = new AuthMeli;
    }
    
    public function authorization()
    {
        return $this->authMeli->authorization();
    }

    public function handleProviderCallback()
    {

        if (request('error') && request('error') == 'access_denied') {
            
            return response()->json('acceso denegeado', 401);
        }

        if ($this->authMeli->callback(request()->code)) 
            return redirect('/mercadolibre/listado');
        
        return false;
    }

}
