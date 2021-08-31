<?php

namespace App\Listeners;

use App\Src\Meli\MeliPictures;
use App\Events\ProductWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProccessPicturesOnMeli
{
    protected $meli_pictures;
    

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(MeliPictures $meli_pictures)
    {
        $this->meli_pictures = $meli_pictures;
    }

    /**
     * Handle the event.
     *
     * @param  ProductWasCreated  $event
     * @return void
     */
    public function handle(ProductWasCreated $event)
    {
        $event->product->getMedia('products')->each(function($image) use($event){
            
            $pic = $this->meli_pictures->process_pictures(auth()->user()->company->mercadoLibre->meli_token, $image->getFullUrl());

            $event->product->pictures()->create([
                'product_id' => $event->product->id,
                'meli_id' => $pic['body']->id,
                'max_size' => $pic['body']->max_size,
                'variations' => $pic['body']->variations,
            ]);
            
        });
    }
}
