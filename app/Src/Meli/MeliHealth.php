<?php

namespace App\Src\Meli;

use App\Src\Meli\MiMeli;
use Kolovious\MeliSocialite\Facade\Meli;


class MeliHealth extends MiMeli
{
    public function get_health_level_by_item($id)
    {
        $params = null;
        $body = null;

        return Meli::withToken(auth()->user()->company->mercadoLibre->meli_token)->get('\/items\/' . $id . '/health', $params, $body);
    }

    public function get_actions_for_improved_publication($id)
    {
        $params = null;
        $body = null;

        return Meli::withToken(auth()->user()->company->mercadoLibre->meli_token)->get('\/items\/' . $id . '/health/actions', $params, $body);
    }
}
