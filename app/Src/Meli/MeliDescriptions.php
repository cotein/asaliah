<?php

namespace App\Src\Meli;

use App\Src\Meli\MiMeli;
use Kolovious\MeliSocialite\Facade\Meli;


class MeliDescriptions extends MiMeli
{

    public function get_description($token, $item_id)
    {
        $params = [];
        $body = [];

        return Meli::withToken($token)->get('/items/'. $item_id. '/description', $body, $params);
    }

   
}
