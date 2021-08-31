<?php

namespace App\Listeners;

use App\Src\Models\Publication;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\AvailableQuantityWasUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateAvailableQuantityOnVariation
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
     * @param  AvailableQuantityWasUpdated  $event
     * @return void
     */
    public function handle(AvailableQuantityWasUpdated $publication)
    {
        //dd($publication);
        $response = $publication->response_from_meli['body'];

        $publication = Publication::where('meli_id', $publication->response_from_meli['body']->id)->first();

        $variations = $publication->variations;

        $modify_variations = collect($variations)->map(function($variation) use($response) {
            
            if ($variation['id'] == $response->variations[0]->id) {
            
                $variation['available_quantity'] = $response->variations[0]->available_quantity;
            
                return $variation;
            }

            return $variation;

        })->all();
        
        $publication->variations = $modify_variations;

        $publication->save();

        //dd($publication);
    }
}
