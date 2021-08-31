<?php

namespace App\Http\Controllers\Api\MercadoLibre;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PictureController extends Controller
{
    protected $meli_pictures;

    public function __construct(MeliPictures $meli_pictures)
    {
        $this->meli_pictures = $meli_pictures;
    }

    public function process_pictures($pictures)
    {
        return $this->meli_pictures->process_pictures(auth()->user()->company->mercadoLibre->meli_token, $pictures);
    }
}
