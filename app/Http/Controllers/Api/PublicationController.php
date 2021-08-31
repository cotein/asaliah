<?php

namespace App\Http\Controllers\Api;

use App\Src\Models\Product;
use Illuminate\Http\Request;
use App\Src\Models\Variation;
use App\Src\Meli\MeliPictures;
use App\Src\Models\Publication;
use App\Src\Meli\MeliVariations;
use App\Src\Meli\MeliPublications;
use App\Events\PriceAndQuantityWasUpdated;
use App\Events\AvailableQuantityWasUpdated;
use App\Http\Controllers\Api\BaseController;
use App\Transformers\Publications\UpdatePrice;
use App\Src\Traits\PublicationTransformerTrait;
use App\Transformers\Publications\VariationTransformer;
use App\Exceptions\MercadoLibre\UpdatePriceAndQuantityException;
use App\Transformers\Publications\PublicationProductTransformer;
use App\Transformers\Publications\UpdateAvailableQuantityTransformer;
use App\Transformers\Publications\PublicationListComponentTransformer;

class PublicationController extends BaseController
{
    use PublicationTransformerTrait;
    
    protected $melipublications;
    
    protected $meli_variations;
    
    protected $meli_pictures;
    
    public function __construct(MeliPictures $meli_pictures, MeliPublications $melipublications, MeliVariations $meli_variations)
    {
        parent::__construct();

        $this->melipublications = $melipublications;
        
        $this->meli_variations = $meli_variations;
        
        $this->meli_pictures = $meli_pictures;

    }

    public function index()
    {
        $publis = Publication::all();

        $publications = fractal($publis, new PublicationListComponentTransformer())->toArray()['data'];

        return response()->json($publications, 200);
    }

    public function store($pub)
    {
        //dd($pub);
        $publication = new Publication;
        $pub = collect($pub['body'])->toArray();
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
    }

    public function publish(Request $request)
    {
        $data = $request->product;

        $variation = Variation::find($data['variation_id']);

        if ($data['available_quantity_here'] > 0) {
                
            $variation->product->is_now_published_here();
            
            $variation->is_now_published_here();
            
            $variation->stock->update_available_quantity_here($data['available_quantity_here']);

        }

        if ($data['available_quantity_meli'] > 0) {

            if (!$variation->product->is_published_meli()) {

                $previus_available_quantity_meli = $variation->stock->available_quantity_meli;
                
                $previus_total_stock = $variation->stock->available_quantity_meli;

                $variation->stock->update_available_quantity_meli($data['available_quantity_meli']);
                
                $variation->stock->update_total_stock(($variation->stock->total_stock - $data['available_quantity_meli']));
                
                $product_to_publish = fractal($variation, new PublicationProductTransformer())->toArray()['data'];
                
                activity('Product')
                    ->withProperties(['Publish' => $variation->product->id])
                    ->log(collect($product_to_publish)->toJson());
                //dd($product_to_publish);
                $response_from_meli = $this->melipublications->publish($this->auth_user->meli_token, $product_to_publish);

                activity('Product')
                    ->withProperties(['Publish' => $variation->product->id])
                    ->log(collect($response_from_meli)->toJson());

                if ($response_from_meli['httpCode'] == 400) {
                
                    $variation->stock->update_available_quantity_meli($previus_available_quantity_meli);
                
                    $variation->stock->update_total_stock($previus_total_stock);

                    $variation->product->save();
                    
                    $variation->product->refresh();

                    return response()->json([
                        'response_from_meli'=>$response_from_meli,
                        'prdct'=>$variation,
                    ], 400);
        
                }

                if ($response_from_meli['httpCode'] == 201) {
                
                    $variation->product->is_now_published_meli();
                
                    $variation->is_now_published_meli();
                    
                    $variation->product->add_meli_id($response_from_meli);
        
                    $variation->add_meli_id($response_from_meli);
                    
                    $variation->product->save();
                    
                    $variation->product->refresh();
        
                    $this->store($response_from_meli);

                    return response()->json([
                        'response_from_meli'=>$response_from_meli,
                        'prdct'=>$variation,
                    ], 201);
        
                }
                
                if ($response_from_meli['httpCode'] == 404) {

                    $variation->stock->update_available_quantity_meli($previus_available_quantity_meli);
                
                    $variation->stock->update_total_stock($previus_total_stock);

                    $variation->product->save();
                    
                    $variation->product->refresh();

                    return response()->json([
                        'response_from_meli'=>$response_from_meli,
                        'prdct'=>$variation,
                    ], 404);
                }
            }
        }
    }

    public function add_variation(Request $request)
    {
        $data = $request->data;

        $variation = Variation::find($data['variation_id']);

        if ($data['available_quantity_here'] > 0) {
                
            $variation->is_now_published_here();

            $variation->stock->update_available_quantity_here($data['available_quantity_here']);

        }

        if ($data['available_quantity_meli'] > 0) {

            $previus_available_quantity_meli = $variation->stock->available_quantity_meli;
                
            $previus_total_stock = $variation->stock->available_quantity_meli;

            $variation->update_meli_stock($data['available_quantity_meli']);
            
            $variation->update_total_stock(($variation->stock->total_stock - $data['available_quantity_meli']));

            $variation_to_publish = fractal($variation, new VariationTransformer())->toArray()['data'];

            activity('Variation')
                ->withProperties(['Add_Variation' => $variation->id])
                ->log(collect($variation_to_publish)->toJson());

            $response_from_meli = $this->meli_variations->add_new($this->auth_user->meli_token, $variation->product, $variation_to_publish);
            
            activity('Variation')
                ->withProperties(['Add_Variation' => $variation->id])
                ->log(collect($response_from_meli)->toJson());
            
            if ($response_from_meli['httpCode'] == 201) {

                $variation->is_now_published_meli();

                $variation->add_meli_id($response_from_meli);

                $publication = Publication::where('meli_id', $variation->product->meli_id)->first();

                $vs = $publication->variations;

                $vs = collect($response_from_meli['body'])->toArray();

                $publication->variations = $vs;

                $publication->save();
            
                return response()->json([
                    'response_from_meli'=>$response_from_meli,
                    'prdct'=>$variation,
                ], 201);
    
            }

            if ($response_from_meli['httpCode'] == 404) {

                $variation->stock->update_available_quantity_meli($previus_available_quantity_meli);
            
                $variation->stock->update_total_stock($previus_total_stock);

                $variation->refresh();

                return response()->json([
                    'response_from_meli'=>$response_from_meli,
                    'prdct'=>$variation,
                ], 404);
            }

            if ($response_from_meli['httpCode'] == 400) {
                
                $variation->stock->update_available_quantity_meli($previus_available_quantity_meli);
            
                $variation->stock->update_total_stock($previus_total_stock);

                $variation->refresh();

                return response()->json([
                    'response_from_meli'=>$response_from_meli,
                    'prdct'=>$variation,
                ], 400);
    
            }
        }
    }

    public function modify_quantity(Request $request)
    {
        $data = $request->data;

        $variation = Variation::find($data['variation_id']);

        if ($data['available_quantity_here'] > 0) {

            $variation->is_now_published_here();
                
            $variation->stock->update_available_quantity_here($data['available_quantity_here']);

        }

        if ($data['available_quantity_meli'] > 0) {

            $previus_available_quantity_meli = $variation->stock->available_quantity_meli;
                
            $previus_total_stock = $variation->stock->available_quantity_meli;
                
            $variation->update_meli_stock($data['available_quantity_meli']);
            
            $variation->update_total_stock(($variation->stock->total_stock - $data['available_quantity_meli']));

            activity('Variation')
                ->withProperties(['Modify Quantity' => $variation->id])
                ->log(collect($variation)->toJson());

            $response_from_meli = $this->meli_variations->modify_available_quantity(auth()->user()->company->mercadoLibre->meli_token, $variation->product->meli_id, $variation->meli_id, $data['available_quantity_meli']);
            
            activity('Variation')
                ->withProperties(['Modify Quantity' => $variation->id])
                ->log(collect($response_from_meli)->toJson());
            
            if ($response_from_meli['httpCode'] == 400 || $response_from_meli['httpCode'] == 404) {
            
                $variation->stock->update_available_quantity_meli($previus_available_quantity_meli);
            
                $variation->stock->update_total_stock($previus_total_stock);

                $variation->refresh();

                return response()->json([
                    'response_from_meli'=>$response_from_meli,
                    'prdct'=>$variation,
                ], 400);
    
            }

            if ($response_from_meli['httpCode'] == 200) {
                
                return response()->json([
                    'response_from_meli'=>$response_from_meli,
                    'prdct'=>$variation,
                ], 200);
            }
        }
        
    }

    public function update_price(Request $request)
    {
        $row = $request->all();
        //dd($row);
        $transformated_row = fractal($row, new UpdatePrice())->toArray()['data'];
        //dd($transformated_row);
        $result =  $this->melipublications->update_price($this->auth_user->meli_token, $transformated_row[0]);
        
        
        if ($result['httpCode'] == 400){

            activity('Publication')
                    ->withProperties('Update Price')
                    ->log(collect($result['body'])->toJson());

            throw new UpdatePriceAndQuantityException($result['body']->message, $result['httpCode']);
        } 
        
        event(new PriceAndQuantityWasUpdated($result));   

        activity('Publication')
                ->withProperties('Update Price')
                ->log(collect($result['body'])->toJson());

        return response()->json($result, 200);
    }

    public function update_available_quantity(Request $request)
    {
        $variation = $request->variation;

        $result =  $this->melipublications->update_available_quantity($this->auth_user->meli_token, $variation);

        $this->response_error_hanlde_get_publications($result);

        event(new AvailableQuantityWasUpdated($result));
        
        activity('Publication')
                ->withProperties('Update Available Quantity')
                ->log(collect($result['body'])->toJson());

        return response()->json($result, 200);
    }

    /**
     * Número total de publicaciones
     */
    public function publications_total()
    {
        $result = $this->melipublications->get_publications($this->auth_user->meli_token);

        $this->response_error_hanlde_get_publications($result);

        return $result['body']->paging->total;
    }


    /**
     * Número total de publicaciones
     */
    public function get_publications_id()
    {
        $ids = collect([]);
        $i = 0;
        $offset = 0;
        $limit = 50;

        do {
            
            $result = $this->melipublications->get_publications(auth()->user()->company->mercadoLibre->meli_token, $offset);
            //dd($result);
            $total = $result['body']->paging->total;
            
            $ids->push($result['body']->results);
            
            $page = $total / $limit;
            
            $offset = $offset + $limit;
            
            sleep(2);
            
            $i++;

        } while ($i < $page);

        return $ids->flatten();
    }
    
}
