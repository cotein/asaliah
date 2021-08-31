<?php

namespace App\Src\Meli;
use App\Src\Meli\MiMeli;
use Kolovious\MeliSocialite\Facade\Meli;

class MeliReviews extends MiMeli
{
    public function reviews($publication_id)
    {
        return Meli::get('/reviews/item/'.$publication_id);
    }
}
