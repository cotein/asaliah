<?php

namespace App\Src\Meli;

use App\Src\Meli\MiMeli;
use Kolovious\MeliSocialite\Facade\Meli;
use MahdiMajidzadeh\LaravelUnsplash\Photo;


class MeliPictures extends MiMeli
{
    protected $unsplash;

    public function __construct()
    {
        $this->unsplash  = new Photo();
    }

    public function process_pictures($token, $pic = null)
    {
        $params = [];

        $picture = [
            'source' => $pic
        ];

        return Meli::withToken($token)->post('/pictures', $picture, $params);
    }

    public function add_picture_to_product($token, $product_id, $pic_id)
    {
        $params = [];

        $picture = [
            'id' => $pic_id
        ];

        return Meli::withToken($token)->post('/items/' . $product_id . '/pictures', $picture, $params);
    }

    public function give_me_error($token, $picture_id)
    {
        $params = [];

        $picture = [];

        return Meli::withToken($token)->get('/pictures/' . $picture_id . '/errors', $picture, $params);
    }

   
}
