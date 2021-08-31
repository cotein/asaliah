<?php

namespace App\Src\Meli;

use App\Src\Meli\MiMeli;
use Kolovious\MeliSocialite\Facade\Meli;


class MeliVisits extends MiMeli
{
    public function total_visits()
    {
        //https://api.mercadolibre.com/users/{User_id}/items_visits?date_from={Date_from}&date_to={Date_to}

        return Meli::get('/sites/'.$this->site.'/listing_types');
    }

    public function visits_by_publication($publication_id)
    {
        return Meli::get('/visits/items?ids='.$publication_id);
    }

    public function visits_by_publication_between_dates($from = null, $to = null, $publication_id)
    {
        return Meli::get('/visits/items?ids=' . $publication_id . '&date_from=' . $from . '&date_to=' . $to);
    }

    public function visits_response_time()
    {
        return Meli::withToken(auth()->user()->company->mercadoLibre->meli_token)->get('\/users\/' . auth()->user()->company->mercadoLibre->meli_user_id . '/questions/response_time');
    }
}
