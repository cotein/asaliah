<?php

namespace App\Src\Meli;

use App\Src\Meli\MiMeli;
use Kolovious\MeliSocialite\Facade\Meli;


class MeliNotifications extends MiMeli
{
   public function notification_resource($token, $url)
   {
        $params = [];
        
        return Meli::withToken($token)->get($url, $params);
   }
}
