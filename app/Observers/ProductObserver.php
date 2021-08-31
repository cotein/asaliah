<?php
namespace App\Observers;

use App\Src\Models\Product;
use App\Src\Meli\MeliPictures;
use App\Observers\ObserverBase;

class ProductObserver extends ObserverBase
{
    protected $meli_pictures;

    public function __construct(MeliPictures $meli_pictures)
    {
        $this->meli_pictures = $meli_pictures;
    }

    public function created(Product $product)
    {
        /* dd($product->getMedia('products'));
        $product->getMedia('products')->map(function($image){
            $ww = $this->meli_pictures->process_pictures(auth()->user()->company->mercadoLibre->meli_token, $image->getFullUrl());
            dd($ww);
        });

        dd('puto'); */
    }
   
    
}