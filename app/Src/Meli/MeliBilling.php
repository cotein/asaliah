<?php

namespace App\Src\Meli;

use App\Src\Meli\MiMeli;
use Kolovious\MeliSocialite\Facade\Meli;

class MeliBilling extends MiMeli
{
    public function get_billing_by_period()
    {
        $params = null;
        $body = null;
        return Meli::withToken(auth()->user()->company->mercadoLibre->meli_token)->get('/users/'.auth()->user()->company->mercadoLibre->meli_user_id.'/billing/period', $params, $body);
    }
}
