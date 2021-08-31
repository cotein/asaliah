<?php

namespace App\Http\Controllers\Api\MercadoLibre;

use App\Src\SyncroProducts;
use App\Src\Meli\MeliVisits;
use Illuminate\Http\Request;
use App\Src\Meli\MeliPictures;
use App\Src\Traits\ErrorTrait;
use App\Src\Models\Publication;
use App\Src\Meli\MeliPublications;
use App\Http\Controllers\Controller;
use App\Events\PublicationWasSynchronized;
use App\Src\Repositories\App\PublicationRepository;
use App\Exceptions\MercadoLibre\UpdatePriceAndQuantityException;

class PublicationController extends Controller
{
    use ErrorTrait;
    
    protected $publications;
    
    protected $meli_pictures;
    
    protected $publication_repository;
    
    protected $metrics;

    public function __construct(MeliPictures $meli_pictures)
    {
        $this->publications = new MeliPublications;
        
        $this->publication_repository = new PublicationRepository;
        
        $this->metrics = new MeliVisits;

        $this->meli_pictures = $meli_pictures;
    }

    public function index()
    {
        $ids = $this->publications->get_publications(auth()->user()->company->mercadoLibre->meli_token, 1);

        return response()->json($ids, 200);
    }

    public function publication_headers()
    {
        $publications = $this->publications->get_headers(auth()->user()->company->mercadoLibre->meli_token);

        return response()->json($publications, 200);
    }

    public function change_status(Request $request)
    {
        $data = $request->status;

        $publication_id = $data['publication_id'];

        $status = $data['status'];

        $publication = $this->publications->change_status(auth()->user()->company->mercadoLibre->meli_token, $publication_id, $status);

        $this->response_error_hanlde_get_publications($publication);

        activity('Publication')
                    ->withProperties('Status')
                    ->log(collect($publication['body'])->toJson());
        
        $p = Publication::where('meli_id', $publication['body']->id)->first();
        
        $p->change_status($publication['body']->status);

        return response()->json($publication, 200);
    }

    public function syncro(Request $request)
    {
        $publications = $this->publications->syncro_meli_account($request->meli_id);

        return response()->json($publications, 200);
    }

    public function get_products_id()
    {
       $syncro_products = new SyncroProducts; 

       return $syncro_products->get_products_ids();
    }

    public function save_product_by_id()
    {
        try {
            $pub = Publication::where('meli_id', request()->product_id)->get();

            if ($pub->isNotEmpty()) {
                return response()->json(false, 200);
            }
            
            $publication = $this->publications->get_items(request()->product_id);

            $body = $publication['body'][0]->body;

            $product = $this->publication_repository->create($body);
            
            event(new PublicationWasSynchronized($body));   

            return response()->json($product, 201);

        } catch (\Exception $e) {

            activity('Sincro products')
                    ->withProperties(['Product' => request()->product_id])
                    ->log(collect(['Code'=>$e->getCode(),'Message'=>$e->getMessage()])->toJson());
                    
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * Retorna los id de las publicaciones
     * 
     */
    public function get_publications_id()
    {
        $ids = collect([]);
        $i = 0;
        $offset = 0;
        $limit = 50;

        do {
            
            $result = $this->publications->get_publications(auth()->user()->company->mercadoLibre->meli_token, $offset);
            
            $total = $result['body']->paging->total;
            
            $ids->push($result['body']->results);
            
            $page = $total / $limit;
            
            $offset = $offset + $limit;
            
            sleep(2);
            
            $i++;

        } while ($i < $page);

        return response()->json($ids->flatten(), 200);
    }

    public function avalilable_quantity_change()
    {
        
        $result = $this->publications->avalilable_quantity_change(request()->item_id, request()->quantity);
        //dd($result);
        if(property_exists($result['body'], "error")) throw new UpdatePriceAndQuantityException($result['body']->message, $result['httpCode']);
        $publication_id = $result['body']->id;

        $pub = Publication::where('meli_id', $publication_id)->get()->first();
        $pub->available_quantity = $result['body']->available_quantity;
        $pub->save();

        return response()->json($result, 200);
    }

    public function update_price_on_publication()
    {
        $result = $this->publications->update_price_on_publication(request()->item_id, request()->price, auth()->user()->company->mercadoLibre->meli_token);
        if(property_exists($result['body'], "error")) 
        {
            activity('update_price_on_publication')
                    ->withProperties(['Publication' => request()->item_id])
                    ->log(collect($result['body']->message)->toJson());
            throw new UpdatePriceAndQuantityException($result['body']->message, $result['httpCode']);
        }

        $publication_id = $result['body']->id;
        //dd($variation);
        $publication = Publication::where('meli_id', $publication_id)->get()->first();
        $pub = collect($result['body'])->toArray();
        $publication->meli_id = $pub['id'];
        $publication->site_id = $pub['site_id'];
        $publication->title = $pub['title'];
        $publication->variations = $pub['variations'];
        $publication->subtitle = $pub['subtitle'];
        $publication->seller_id = $pub['seller_id'];
        $publication->category_id = $pub['category_id'];
        $publication->official_store_id = $pub['official_store_id'];
        $publication->price = $pub['price'];
        $publication->base_price = $pub['base_price'];
        $publication->currency_id = $pub['currency_id'];
        $publication->initial_quantity = $pub['initial_quantity'];
        $publication->available_quantity = $pub['available_quantity'];
        $publication->sold_quantity = $pub['sold_quantity'];
        $publication->sale_terms = $pub['sale_terms'];
        $publication->buying_mode = $pub['buying_mode'];
        $publication->listing_type_id = $pub['listing_type_id'];
        $publication->start_time = $pub['start_time'];
        $publication->stop_time = $pub['stop_time'];
        $publication->end_time = $pub['end_time'];
        $publication->expiration_time = $pub['expiration_time'];
        $publication->condition = $pub['condition'];
        $publication->permalink = $pub['permalink'];
        $publication->pictures = $pub['pictures'];
        $publication->video_id = $pub['video_id'];
        $publication->descriptions = $pub['descriptions'];
        $publication->accepts_mercadopago = $pub['accepts_mercadopago'];
        $publication->non_mercado_pago_payment_methods = $pub['non_mercado_pago_payment_methods'];
        $publication->shipping = $pub['shipping'];
        $publication->international_delivery_mode = $pub['international_delivery_mode'];
        $publication->seller_address = $pub['seller_address'];
        $publication->seller_contact = $pub['seller_contact'];
        $publication->location = $pub['location'];
        $publication->geolocation = $pub['geolocation'];
        $publication->coverage_areas = $pub['coverage_areas'];
        $publication->attributes = $pub['attributes'];
        $publication->warnings = $pub['warnings'];
        $publication->listing_source = $pub['listing_source'];
        $publication->thumbnail = $pub['thumbnail'];
        $publication->secure_thumbnail = $pub['secure_thumbnail'];
        $publication->status = $pub['status'];
        $publication->sub_status = $pub['sub_status'];
        $publication->tags = $pub['tags'];
        $publication->warranty = $pub['warranty'];
        $publication->catalog_product_id = $pub['catalog_product_id'];
        $publication->domain_id = $pub['domain_id'];
        $publication->seller_custom_field = $pub['seller_custom_field'];
        $publication->parent_item_id = $pub['parent_item_id'];
        $publication->differential_pricing = $pub['differential_pricing'];
        $publication->deal_ids = $pub['deal_ids'];
        $publication->automatic_relist = $pub['automatic_relist'];
        $publication->date_created = $pub['date_created'];
        $publication->last_updated = $pub['last_updated'];
        $publication->health = $pub['health'];
        $publication->catalog_listing = $pub['catalog_listing'];
        $publication->item_relations = $pub['item_relations'];

        $publication->save();

        return response()->json($result, 200);
    }

    public function update_available_quantity_on_publication()
    {
        $result = $this->publications->update_available_quantity_on_publication(request()->item_id, request()->available_quantity, auth()->user()->company->mercadoLibre->meli_token);
        if(property_exists($result['body'], "error")) 
        {
            activity('update_available_quantity_on_publication')
                    ->withProperties(['Publication' => request()->item_id])
                    ->log(collect($result['body']->message)->toJson());
            throw new UpdatePriceAndQuantityException($result['body']->message, $result['httpCode']);
        }

        $publication_id = $result['body']->id;
        //dd($variation);
        $publication = Publication::where('meli_id', $publication_id)->get()->first();
        $pub = collect($result['body'])->toArray();
        $publication->meli_id = $pub['id'];
        $publication->site_id = $pub['site_id'];
        $publication->title = $pub['title'];
        $publication->variations = $pub['variations'];
        $publication->subtitle = $pub['subtitle'];
        $publication->seller_id = $pub['seller_id'];
        $publication->category_id = $pub['category_id'];
        $publication->official_store_id = $pub['official_store_id'];
        $publication->price = $pub['price'];
        $publication->base_price = $pub['base_price'];
        $publication->currency_id = $pub['currency_id'];
        $publication->initial_quantity = $pub['initial_quantity'];
        $publication->available_quantity = $pub['available_quantity'];
        $publication->sold_quantity = $pub['sold_quantity'];
        $publication->sale_terms = $pub['sale_terms'];
        $publication->buying_mode = $pub['buying_mode'];
        $publication->listing_type_id = $pub['listing_type_id'];
        $publication->start_time = $pub['start_time'];
        $publication->stop_time = $pub['stop_time'];
        $publication->end_time = $pub['end_time'];
        $publication->expiration_time = $pub['expiration_time'];
        $publication->condition = $pub['condition'];
        $publication->permalink = $pub['permalink'];
        $publication->pictures = $pub['pictures'];
        $publication->video_id = $pub['video_id'];
        $publication->descriptions = $pub['descriptions'];
        $publication->accepts_mercadopago = $pub['accepts_mercadopago'];
        $publication->non_mercado_pago_payment_methods = $pub['non_mercado_pago_payment_methods'];
        $publication->shipping = $pub['shipping'];
        $publication->international_delivery_mode = $pub['international_delivery_mode'];
        $publication->seller_address = $pub['seller_address'];
        $publication->seller_contact = $pub['seller_contact'];
        $publication->location = $pub['location'];
        $publication->geolocation = $pub['geolocation'];
        $publication->coverage_areas = $pub['coverage_areas'];
        $publication->attributes = $pub['attributes'];
        $publication->warnings = $pub['warnings'];
        $publication->listing_source = $pub['listing_source'];
        $publication->thumbnail = $pub['thumbnail'];
        $publication->secure_thumbnail = $pub['secure_thumbnail'];
        $publication->status = $pub['status'];
        $publication->sub_status = $pub['sub_status'];
        $publication->tags = $pub['tags'];
        $publication->warranty = $pub['warranty'];
        $publication->catalog_product_id = $pub['catalog_product_id'];
        $publication->domain_id = $pub['domain_id'];
        $publication->seller_custom_field = $pub['seller_custom_field'];
        $publication->parent_item_id = $pub['parent_item_id'];
        $publication->differential_pricing = $pub['differential_pricing'];
        $publication->deal_ids = $pub['deal_ids'];
        $publication->automatic_relist = $pub['automatic_relist'];
        $publication->date_created = $pub['date_created'];
        $publication->last_updated = $pub['last_updated'];
        $publication->health = $pub['health'];
        $publication->catalog_listing = $pub['catalog_listing'];
        $publication->item_relations = $pub['item_relations'];

        $publication->save();

        return response()->json($result, 200);
    }

    public function update_available_quantity_on_variation()
    {
        $result = $this->publications->update_available_quantity_on_variations(request()->item_id, request()->variations, auth()->user()->company->mercadoLibre->meli_token);
        if(property_exists($result['body'], "error")) 
        {
            activity('update_available_quantity_on_variation')
                    ->withProperties(['Publication' => request()->item_id])
                    ->log(collect($result['body']->message)->toJson());
            throw new UpdatePriceAndQuantityException($result['body']->message, $result['httpCode']);
        }

        $publication_id = $result['body']->id;
        //dd($variation);
        $publication = Publication::where('meli_id', $publication_id)->get()->first();
        $pub = collect($result['body'])->toArray();
        $publication->meli_id = $pub['id'];
        $publication->site_id = $pub['site_id'];
        $publication->title = $pub['title'];
        $publication->variations = $pub['variations'];
        $publication->subtitle = $pub['subtitle'];
        $publication->seller_id = $pub['seller_id'];
        $publication->category_id = $pub['category_id'];
        $publication->official_store_id = $pub['official_store_id'];
        $publication->price = $pub['price'];
        $publication->base_price = $pub['base_price'];
        $publication->currency_id = $pub['currency_id'];
        $publication->initial_quantity = $pub['initial_quantity'];
        $publication->available_quantity = $pub['available_quantity'];
        $publication->sold_quantity = $pub['sold_quantity'];
        $publication->sale_terms = $pub['sale_terms'];
        $publication->buying_mode = $pub['buying_mode'];
        $publication->listing_type_id = $pub['listing_type_id'];
        $publication->start_time = $pub['start_time'];
        $publication->stop_time = $pub['stop_time'];
        $publication->end_time = $pub['end_time'];
        $publication->expiration_time = $pub['expiration_time'];
        $publication->condition = $pub['condition'];
        $publication->permalink = $pub['permalink'];
        $publication->pictures = $pub['pictures'];
        $publication->video_id = $pub['video_id'];
        $publication->descriptions = $pub['descriptions'];
        $publication->accepts_mercadopago = $pub['accepts_mercadopago'];
        $publication->non_mercado_pago_payment_methods = $pub['non_mercado_pago_payment_methods'];
        $publication->shipping = $pub['shipping'];
        $publication->international_delivery_mode = $pub['international_delivery_mode'];
        $publication->seller_address = $pub['seller_address'];
        $publication->seller_contact = $pub['seller_contact'];
        $publication->location = $pub['location'];
        $publication->geolocation = $pub['geolocation'];
        $publication->coverage_areas = $pub['coverage_areas'];
        $publication->attributes = $pub['attributes'];
        $publication->warnings = $pub['warnings'];
        $publication->listing_source = $pub['listing_source'];
        $publication->thumbnail = $pub['thumbnail'];
        $publication->secure_thumbnail = $pub['secure_thumbnail'];
        $publication->status = $pub['status'];
        $publication->sub_status = $pub['sub_status'];
        $publication->tags = $pub['tags'];
        $publication->warranty = $pub['warranty'];
        $publication->catalog_product_id = $pub['catalog_product_id'];
        $publication->domain_id = $pub['domain_id'];
        $publication->seller_custom_field = $pub['seller_custom_field'];
        $publication->parent_item_id = $pub['parent_item_id'];
        $publication->differential_pricing = $pub['differential_pricing'];
        $publication->deal_ids = $pub['deal_ids'];
        $publication->automatic_relist = $pub['automatic_relist'];
        $publication->date_created = $pub['date_created'];
        $publication->last_updated = $pub['last_updated'];
        $publication->health = $pub['health'];
        $publication->catalog_listing = $pub['catalog_listing'];
        $publication->item_relations = $pub['item_relations'];

        $publication->save();

        return response()->json($result, 200);
    }

    public function update_price_on_variation()
    {
        
        $v = collect(request()->variations)->collapse()->all();
        $result = $this->publications->update_price_on_variations(request()->item_id, $v , auth()->user()->company->mercadoLibre->meli_token);

        if(property_exists($result['body'], "error")) 
        {
            activity('update_price_on_variation')
                    ->withProperties(['Publication' => request()->item_id])
                    ->log(collect($result['body']->message)->toJson());
            throw new UpdatePriceAndQuantityException($result['body']->message, $result['httpCode']);
        }

        $publication_id = $result['body']->id;

        $publication = Publication::where('meli_id', $publication_id)->get()->first();
        $pub = collect($result['body'])->toArray();
        $publication->meli_id = $pub['id'];
        $publication->site_id = $pub['site_id'];
        $publication->title = $pub['title'];
        $publication->variations = $pub['variations'];
        $publication->subtitle = $pub['subtitle'];
        $publication->seller_id = $pub['seller_id'];
        $publication->category_id = $pub['category_id'];
        $publication->official_store_id = $pub['official_store_id'];
        $publication->price = $pub['price'];
        $publication->base_price = $pub['base_price'];
        $publication->currency_id = $pub['currency_id'];
        $publication->initial_quantity = $pub['initial_quantity'];
        $publication->available_quantity = $pub['available_quantity'];
        $publication->sold_quantity = $pub['sold_quantity'];
        $publication->sale_terms = $pub['sale_terms'];
        $publication->buying_mode = $pub['buying_mode'];
        $publication->listing_type_id = $pub['listing_type_id'];
        $publication->start_time = $pub['start_time'];
        $publication->stop_time = $pub['stop_time'];
        $publication->end_time = $pub['end_time'];
        $publication->expiration_time = $pub['expiration_time'];
        $publication->condition = $pub['condition'];
        $publication->permalink = $pub['permalink'];
        $publication->pictures = $pub['pictures'];
        $publication->video_id = $pub['video_id'];
        $publication->descriptions = $pub['descriptions'];
        $publication->accepts_mercadopago = $pub['accepts_mercadopago'];
        $publication->non_mercado_pago_payment_methods = $pub['non_mercado_pago_payment_methods'];
        $publication->shipping = $pub['shipping'];
        $publication->international_delivery_mode = $pub['international_delivery_mode'];
        $publication->seller_address = $pub['seller_address'];
        $publication->seller_contact = $pub['seller_contact'];
        $publication->location = $pub['location'];
        $publication->geolocation = $pub['geolocation'];
        $publication->coverage_areas = $pub['coverage_areas'];
        $publication->attributes = $pub['attributes'];
        $publication->warnings = $pub['warnings'];
        $publication->listing_source = $pub['listing_source'];
        $publication->thumbnail = $pub['thumbnail'];
        $publication->secure_thumbnail = $pub['secure_thumbnail'];
        $publication->status = $pub['status'];
        $publication->sub_status = $pub['sub_status'];
        $publication->tags = $pub['tags'];
        $publication->warranty = $pub['warranty'];
        $publication->catalog_product_id = $pub['catalog_product_id'];
        $publication->domain_id = $pub['domain_id'];
        $publication->seller_custom_field = $pub['seller_custom_field'];
        $publication->parent_item_id = $pub['parent_item_id'];
        $publication->differential_pricing = $pub['differential_pricing'];
        $publication->deal_ids = $pub['deal_ids'];
        $publication->automatic_relist = $pub['automatic_relist'];
        $publication->date_created = $pub['date_created'];
        $publication->last_updated = $pub['last_updated'];
        $publication->health = $pub['health'];
        $publication->catalog_listing = $pub['catalog_listing'];
        $publication->item_relations = $pub['item_relations'];

        $publication->save();

        return response()->json($result, 200);
    }

    public function visits_by_publication()
    {
        return $this->metrics->visits_by_publication(request()->publication_id);
    }

    public function visits_by_publication_between_dates()
    {
        return $this->metrics->visits_by_publication_between_dates(request()->from, request()->to, request()->publication_id);
    }
}
