<?php

namespace App\Listeners;

use App\Src\Models\Brand;
use App\Src\Models\Picture;
use App\Src\Models\Product;
use Illuminate\Http\Request;
use App\Events\PersistedProduct;
use App\Src\Meli\MeliCategories;

//use App\Src\Traits\ProductTrait;
use App\Src\Meli\MeliDescriptions;

use App\Src\Categories\CategoryBase;
use App\Src\Models\PriceListProduct;
use App\Src\Traits\GenerateFilterTrait;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\PublicationWasSynchronized;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateProductByPublication
{
    use GenerateFilterTrait;
    
    const MAX_PRIORITY = 10;

    const CRITICAL_STOCK = 10;

    protected $meli_categories;
    
    protected $meli_descriptions;
    
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(MeliCategories $meli_categories, MeliDescriptions $meli_descriptions)
    {
        $this->meli_categories = $meli_categories;
        
        $this->meli_descriptions = $meli_descriptions;
    }

    public function status($status)
    {
        if ($status == 'paused') {
            return 3;
        }

        if ($status == 'active') {
            return 1;
        }

        return 1;
    }

    
    /**
     * Handle the event.
     *
     * @param  PublicationWasSynchronized  $event
     * @return void
     */
    public function handle(PublicationWasSynchronized $event)
    {

        $pr = Product::where('meli_id', $event->publication->id)->get();
        //dd($event->publication);
        if ($pr->isEmpty()) {

            $category = $this->meli_categories->fetch_children_categories($event->publication->category_id);
            sleep(1);
            $description = $this->meli_descriptions->get_description(auth()->user()->company->mercadoLibre->meli_token, $event->publication->id);

            $product = new Product;
            $product->meli_id = $event->publication->id;
            $product->supplier_id = 1;
            $product->brand_id = 1;
            $product->attr_item_condition = ["name" => "Nuevo", "value_id" => "2230284"];
            $product->buying_mode =  ["name" => property_exists($event->publication, "buying_mode") ? $event->publication->buying_mode: 'but_it_now'];
            $product->main_category =  $category['body']->path_from_root[0];
            $product->path_from_root = $category['body']->path_from_root;
            $product->children_category = $category['body']->path_from_root;
            $product->name = $event->publication->title;
            $product->code = $event->publication->category_id; 
            $product->sub_title = null;
            $product->description = property_exists($description['body'], "plain_text") ? $description['body']->plain_text : '';
            $product->original_price = 0;
            $product->sale_price = property_exists($event->publication, "price") ? $event->publication->price / 1.21 : 0;
            $product->seller_custom_field = $event->publication->category_id  . '-0000'; 
            $product->meta_keywords = null;
            $product->iva = null;
            $product->listing_type = null;
            $product->money = property_exists($event->publication, "currency_id") ? $event->publication->currency_id : 'ARS';
            $product->status_id = property_exists($event->publication, "status") ? $this->status($event->publication->status) : 1;
            $product->priority_id = self::MAX_PRIORITY;
            $product->attributes = property_exists($event->publication, "attributes") ? $event->publication->attributes : null;
            $product->published_meli = true;
            $product->published_here = true;
            $product->gender_id = null;
            $product->type_shoes_id = null;
            $product->material_id = null;
            $product->season_id = null;
            
            $text = '';
            collect($product->attributes)->map(function($a, $index) use ($product, $text){
                
                $text = $text . ' ' . $a['value_name'];
            });
            $product->search_by = $text . ' ' . $product->name . ' ' . $product->meli_id;
            $product->save();

            $product->refresh();

            $price_list = new PriceListProduct;
            $price_list->pricelist_id = 4; //Mercado libre
            $price_list->product_id = $product->id;
            $price_list->price = $product->sale_price;
            $price_list->save();

            if (property_exists($event->publication, "pictures")) {
                
                collect($event->publication->pictures)->each(function($image, $key) use($product, $event) {
                    $picture = new Picture;
                    $picture->product_id = $product->id;
                    $picture->meli_id = $image->id;
                    $picture->size = $image->size;
                    $picture->quality = $image->quality;
                    $picture->max_size = $image->max_size;
                    $picture->url = $image->url;
                    $picture->secure_url = $image->secure_url;
                    $picture->save();
                });
            }
            
            if (property_exists($event->publication, "variations")) {

                collect($event->publication->variations)->each(function($variation, $index) use($product, $event) {
                    
                    $v = $product->variations()->create([
                        'product_id' => $product->id,
                        'meli_id' => $variation->id,
                        'seller_custom_field' => $product->seller_custom_field,
                        'attribute_combinations' => $variation->attribute_combinations,
                        'published_meli' => true,
                        'published_here' => true,
                        'attributes' => (isset($variation->attributes) ) ? $variation->attributes : '',
                    ]);
                        
                    $v->stock()->create([
                        'variation_id' => $variation->id,
                        'total_stock' => $event->publication->initial_quantity,
                        'available_quantity_meli' => $variation->available_quantity,
                        'published_meli_history' => 0,
                        'available_quantity_here' => 1,
                        'published_here_history' => 0,
                        'sold_on_meli' => $variation->sold_quantity,
                        'sold_on_here' => 0,
                        'critical_stock' => self::CRITICAL_STOCK,
                    ]);
                        
                });
            }
            
            CategoryBase::handler($category['body']->path_from_root);
        }
        
    }
}
