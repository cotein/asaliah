<?php

namespace App\Src\Meli;

use App\Src\Meli\MiMeli;
use Kolovious\MeliSocialite\Facade\Meli;


class MeliProductos extends MiMeli
{
    public function fetch_listing_types()
    {
        return Meli::get('/sites/'.$this->site.'/listing_types');
    }

    public function fetch_attributes($category)
    {
        return Meli::get('/categories/'.$category.'/attributes');
    }

    public function fetch_sub_categories($category)
    {
        return Meli::get('/categories/'.$category);
    }
    
    public function validate($token, $params)
    {
        return Meli::withToken($token)->post('/items/validate', $params);
    }

}
