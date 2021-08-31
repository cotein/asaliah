<?php

namespace App\Listeners;

use App\Src\Models\Publication;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\PriceAndQuantityWasUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;

class PublicationUpdate
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PriceAndQuantityWasUpdated  $event
     * @return void
     */
    public function handle(PriceAndQuantityWasUpdated $response_from_meli)
    {
        $response = $response_from_meli->publication['body'];
        //dd($response);

        $publication = Publication::where('meli_id', $response->id);
        
        $variations = json_decode(json_encode($response->variations), true);
        /* dd($array);
        $variations = collect($response->variations)->each(function($v){
           
        })->toArray(); */

        //dd($variations);
        $publication->update([
            'available_quantity' => $response->available_quantity,
            'price' => $response->price,
            'variations' => collect($variations)->toJson()
        ]);

    }
}
