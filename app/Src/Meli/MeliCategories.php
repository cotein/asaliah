<?php

namespace App\Src\Meli;

use App\Src\Meli\MiMeli;
use Kolovious\MeliSocialite\Facade\Meli;


class MeliCategories extends MiMeli
{
    public function fetch_main_categories()
    {
        return Meli::get('/sites/'.$this->site.'/categories');
    }

    public function fetch_children_categories($category_code)
    {
        return Meli::get('/categories/'.$category_code);
    }
}
