<?php

namespace App\Src\Meli;

use App\Src\Meli\MiMeli;
use App\Src\Models\Publication;
use Kolovious\MeliSocialite\Facade\Meli;
use App\Events\PublicationWasSynchronized;


class MeliPublications extends MiMeli
{
    const SELLER = 438749068;

    const HALF_SECOND = 500000;

    const ACTIVE_STATUS = 'active';

    const PAUSED_STATUS = 'paused';

    public function publish($token, $params)
    {
        return Meli::withToken($token)->post('/items', $params);
        //return Meli::withToken($token)->post('/items/validate', $params);
    }

    /**
     * Retorna los id de las publicaciones
     * 
     */
    public function get_publications($token,  $offset=0, $limit=50)
    {
        $params = [
            'limit' => $limit, //cantidad que trae
            'offset' => $offset, //(opcional) posición desde la que se devuelven los resultados de la búsqueda.
        ];
        
        return Meli::withToken($token)->get('/users/' . auth()->user()->company->mercadoLibre->meli_user_id . '/items/search', $params);
    }

    public function get_thousands_publications($scroll_id=null)
    {
        $seller_id = auth()->user()->company->mercadoLibre->meli_user_id;
        $params = [
            'search_type'=>'scan'
        ];
        return Meli::withToken(auth()->user()->company->mercadoLibre->meli_token)->get('/users/' . $seller_id . '/items/search', $params);
    }

    /**
     * Retorna una publicación
     */
    public function get_items($ids)
    {
        return Meli::get('/items?ids=' . $ids);
    }

    public function get_headers($token)
    {
        $meli_attributes = [
            'id',
            'status',
            'category_id',
            'title',
            'available_quantity',
            'listing_type_id',
            'start_time',
            'permalink',
            'thumbnail',
            'price',
            'status',
        ];

        $attributes =  implode(",", $meli_attributes);
        //dd($attributes);
        $array = $this->get_publications_id(auth()->user()->company->mercadoLibre->meli_token);

        $flatten = collect($array)->flatten();

        $total = $flatten->count();

        $iterator = ceil($total / 20);

        $r = [];

        for ($i=0; $i < $iterator ; $i++) { 
            $page = $flatten->forPage($i+1, 20);

            $ids =  implode(",",  $page->toArray());
            
            $result = Meli::withToken($token)->get('/items?ids=' . $ids . '&attributes=' . $attributes);
            array_push($r, $result['body']); 
            usleep(500000);
        }
        //dd(collect($r)->flatten()->toArray());
        return collect($r)->flatten()->toArray();
            
            //dd($ids);
            
            
        //return Meli::withToken($token)->get('/items?ids=MLA797944105,MLA799726667&attributes=id,category_id,title,available_quantity,listing_type_id,start_time,thumbnail');
        //return Meli::withToken($token)->get('/items?ids=' . $ids . '&attributes=' . $attributes);
    }

    public function get_scroll_id($token, $seller_id=null, $scroll_id=null)
    {
        $seller_id = self::SELLER;
        $params = [
            'search_type'=>'scan'
        ];
        $result = Meli::withToken($token)->get('/users/' . $seller_id . '/items/search', $params);

        return $result['body']->scroll_id;
    }

    /**
     * @return publications_id on mercado libre
     */
    public function get_publications_id($token)
    {
        $result = [];
        $tt = $this->get_publications($token);

        $total = $of = $tt['body']->paging->total;
        //dd($total);
        array_push($result, $tt['body']->results);

        $iter = ceil($total / 50);

        for ($i=1; $i < $iter; $i++) { 
            $off = $i * 50;
            usleep(self::HALF_SECOND);
            $r = $this->get_publications($token, $off);
            array_push($result, $r['body']->results);
        }
       
        return $result;
    }

    public function change_status($token, $item_id, $status)
    {
        $change = [
            'status' => $status,
        ];
        
        $params = [
                        
        ];

        $body = null;

        return Meli::withToken($token)->put('/items/'.$item_id, $change, $params);
    }

    public function syncro_meli_account($publication_id)
    {
        if (!(Publication::where('meli_id', '=', $publication_id)->count() > 0)) {

            $publication = $this->get_items($publication_id);

            $this->error_handle_get_items($publication);

            $body = $publication['body'][0]->body;

            Publication::create([
                'meli_id' => $body->id,
                'site_id' => $body->site_id,
                'title' => $body->title,
                'subtitle' => $body->subtitle,
                'seller_id' => $body->seller_id,
                'category_id' => $body->category_id,
                'official_store_id' => $body->official_store_id,
                'price' => $body->price,
                'base_price' => $body->base_price,
                'currency_id' => $body->currency_id,
                'initial_quantity' => $body->initial_quantity,
                'available_quantity' => $body->available_quantity,
                'sold_quantity' => $body->sold_quantity,
                'sale_terms' => $body->sale_terms,
                'buying_mode' => $body->buying_mode,
                'listing_type_id' => $body->listing_type_id,
                'start_time' => $body->start_time,
                'stop_time' => $body->stop_time,
                'condition' => $body->condition,
                'permalink' => $body->permalink,
                'pictures' => $body->pictures,
                'variations' => $body->variations,
                'attributes' => $body->attributes,
                'thumbnail' => $body->thumbnail,
                'secure_thumbnail' => $body->secure_thumbnail,
                'status' => $body->status,
                'sub_status' => $body->sub_status,
                'tags' => $body->tags,
                'warranty' => $body->warranty,
                'catalog_product_id' => $body->catalog_product_id,
                'domain_id' => $body->domain_id,
                'parent_item_id' => $body->parent_item_id,
                'differential_pricing' => $body->differential_pricing,
                'deal_ids' => $body->deal_ids,
                'automatic_relist' => $body->automatic_relist,
                'date_created' => $body->date_created,
                'last_updated' => $body->last_updated,
                'health' => $body->health,
                'catalog_listing' => $body->catalog_listing,
            ]);
            
            activity('Publication')
                ->withProperties('Syncro')
                ->log(collect($body)->toJson());

            event(new PublicationWasSynchronized($body));   

        }
    }


    public function update_price_on_publication($item_id, $price, $token)
    {
        $body = [
            'price' => $price
        ];

        $params = null;

        return Meli::withToken($token)->put('/items/'.$item_id, $body, $params);
    }

    

    public function update_price_on_variations($item_id, $variations, $token)
    {
        $body = [
            'variations' => $variations
        ];

        $params = null;

        return Meli::withToken($token)->put('/items/'.$item_id, $body, $params);
    }

    public function update_available_quantity_on_publication($item_id, $available_quantity, $token)
    {
        $body = [
            'available_quantity' => $available_quantity
        ];

        $params = null;

        return Meli::withToken($token)->put('/items/'.$item_id, $body, $params);
    }

    public function update_available_quantity_on_variations($item_id, $variations, $token)
    {
        $body = [
            
            'variations' => $variations
        ];

        $params = null;

        return Meli::withToken($token)->put('/items/'.$item_id, $body, $params);
    }


    public function total($token)
    {
        $result = $this->get_publications($token);

        return $result;
    }

    public function get_publications_multiget($ids)
    {
        $ids = collect($ids)->implode(',');
        
        $params = [
            
            'ids'=> $ids,
        ];

        $body = null;

        return Meli::withToken(auth()->user()->company->mercadoLibre->meli_token)->get('/items', $params, $body);
    }

}
