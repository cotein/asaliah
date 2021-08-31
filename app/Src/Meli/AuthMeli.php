<?php

namespace App\Src\Meli;

use GuzzleHttp\Client;
use App\Src\Meli\MiMeli;
use App\Src\Meli\Sdk\lib\Api\OAuth20Api;
use Laravel\Socialite\Facades\Socialite;


class AuthMeli extends MiMeli
{

     /**
     * Redirect the user to the Meli authentication page.
     *
     * @return Response
     */
    public function authorization()
    {
        try {
            $query = http_build_query([
                'response_type' => 'code',
                'client_id' => env('MELI_CLIENT_ID'),
                'redirect_uri' => env('MELI_REDIRECT'),
                'scope' => ''
            ]);

        } catch (\Exception $e) {
            
            return response()->json($e->getMessage(), $e->getCode());
            
        }
        //dd(env('MELI_REDIRECT_AUTHORIZE') . '?' . $query);
        return redirect(env('MELI_REDIRECT_AUTHORIZE') . '?' . $query);
    }

     
    public function callback($code)
    {
        $result = $this->getToken($code);

        $result = json_decode($result[0], true);

        $user = auth()->user()->updateDataFromMeli($result);

        if ($user) {
            return true;
        }

        return false;
    }

}
