<?php

namespace App\Src;

use App\Src\Meli\MeliUsers;
use App\Src\Models\Picture;
use App\Src\Models\Product;
use App\Src\Meli\MeliOrders;
use App\Src\Meli\MeliCategories;
use App\Src\Meli\MeliDescriptions;
use App\Src\Categories\CategoryBase;
use App\Src\Models\PriceListProduct;
use App\Src\Traits\GenerateFilterTrait;
use Kolovious\MeliSocialite\Facade\Meli;
use App\Listeners\CreateProductByPublication;

class SyncroProducts 
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
    public function __construct()
    {
        $this->meli_categories = new MeliCategories;
        
        $this->meli_descriptions = new MeliDescriptions;
        
        $this->meli_orders = new MeliOrders;

        ini_set('max_execution_time', 500); //3 minutes

    }

    public function status($status)
    {
        if ($status == 'paused') {
            return 3;
        }

        if ($status == 'active') {
            return 1;
        }

        return 3;
    }

    public function get_products_ids()
    {
        $ml = new MeliUsers;
        $limit = 50;
        $result = $ml->get_publication_ids(); 
        $ids = collect([]);
        $ids->push($result['body']->results);
        
        $total = $result['body']->paging->total;
        $pages = $total / 50;
        
        for ($i=1; $i < $pages; $i++) { 
            $r = $ml->get_publication_ids($limit * $i, $limit);
            $resu = $ids->push($r['body']->results);
        } 
        
        $flatten = collect($ids->flatten());

        return $flatten;
    }

    public function save_product_from_meli($id)
    {
        $params = [
            'ids' => $id
        ];
        
        $result = Meli::withToken(auth()->user()->company->mercadoLibre->meli_token)->get('/items', $params );
        
        $pr = Product::where('meli_id',$result['body'][0]->body->id)->get();

        if ($pr->isEmpty()) {
            $meli_categories = new MeliCategories;
            $meli_descriptions = new MeliDescriptions;
            $category = $meli_categories->fetch_children_categories($result['body'][0]->body->category_id);
            //sleep(1);
            $description = $meli_descriptions->get_description(auth()->user()->company->mercadoLibre->meli_token,$result['body'][0]->body->id);

            $product = new Product;
            $product->meli_id =$result['body'][0]->body->id;
            $product->supplier_id = 1;
            $product->brand_id = $this->save_brand($result['body'][0]->body->attributes);
            $product->attr_item_condition =$result['body'][0]->body->attributes;
            $product->buying_mode =  ["name" =>$result['body'][0]->body->buying_mode];
            $product->main_category =  $category['body']->path_from_root[0];
            $product->path_from_root = $category['body']->path_from_root;
            $product->children_category = $category['body']->path_from_root;
            $product->name =$result['body'][0]->body->title;
            $product->code =$result['body'][0]->body->category_id; 
            $product->sub_title = null;
            $product->description = (property_exists($description['body'], "plain_text")) ? $description['body']->plain_text : '';
            $product->original_price = 0;
            $product->sale_price =$result['body'][0]->body->price / 1.21;
            $product->seller_custom_field =$result['body'][0]->body->category_id  . '-0000'; 
            $product->meta_keywords = null;
            $product->iva = null;
            $product->listing_type = null;
            $product->money =$result['body'][0]->body->currency_id;
            $product->status_id = $this->status($result['body'][0]->body->status);
            $product->priority_id = self::MAX_PRIORITY;
            $product->attributes =$result['body'][0]->body->attributes;
            $product->published_meli = true;
            $product->published_here = true;
            $product->gender_id = $this->save_gender($result['body'][0]->body->attributes);
            $product->type_shoes_id = $this->save_type_shoes($result['body'][0]->body->attributes);
            $product->material_id = $this->save_material($result['body'][0]->body->attributes);
            $product->season_id = $this->save_season($result['body'][0]->body->attributes);
            $product->meli_info = $result['body'][0]->body;
            $product->save();

            $product->refresh();

            $price_list = new PriceListProduct;
            $price_list->pricelist_id = 4; //Mercado libre
            $price_list->product_id = $product->id;
            $price_list->price = $product->sale_price;
            $price_list->save();
            
            collect($result['body'][0]->body->pictures)->each(function($image, $key) use($product, $result) {
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

            collect($result['body'][0]->body->variations)->each(function($variation, $index) use($product, $result) {
            
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
                    'total_stock' =>$result['body'][0]->body->initial_quantity,
                    'available_quantity_meli' => $variation->available_quantity,
                    'published_meli_history' => 0,
                    'available_quantity_here' => 1,
                    'published_here_history' => 0,
                    'sold_on_meli' => $variation->sold_quantity,
                    'sold_on_here' => 0,
                    'critical_stock' => self::CRITICAL_STOCK,
                ]);

            });
            
            CategoryBase::handler($category['body']->path_from_root);

            return $product;
        }
        
        return false;
    }

    public function syncro()
    {
        $ml = new MeliUsers;
        $limit = 50;
        $result = $ml->get_publication_ids(); 
        $ids = collect([]);
        $ids->push($result['body']->results);
        
        $total = $result['body']->paging->total;
        $pages = $total / 50;
        
        for ($i=1; $i < $pages; $i++) { 
            $r = $ml->get_publication_ids($limit * $i, $limit);
            $resu = $ids->push($r['body']->results);
        } 
        
        $flatten = collect($ids->flatten());

        foreach (collect($flatten)->chunk(50) as $chunk){
            collect($chunk)->each(function($i){
                $params = [
                    'ids' => $i
                ];
                $result = Meli::withToken(auth()->user()->company->mercadoLibre->meli_token)->get('/items', $params );
    
                $pr = Product::where('meli_id',$result['body'][0]->body->id)->get();
                
                sleep(1);
                if ($pr->isEmpty()) {
                    $meli_categories = new MeliCategories;
                    $meli_descriptions = new MeliDescriptions;
                    $category = $meli_categories->fetch_children_categories($result['body'][0]->body->category_id);
                    $description = $meli_descriptions->get_description(auth()->user()->company->mercadoLibre->meli_token,$result['body'][0]->body->id);
    
                    $product = new Product;
                    $product->meli_id =$result['body'][0]->body->id;
                    $product->supplier_id = 1;
                    $product->brand_id = $this->save_brand($result['body'][0]->body->attributes);
                    $product->attr_item_condition =$result['body'][0]->body->attributes;
                    $product->buying_mode =  ["name" =>$result['body'][0]->body->buying_mode];
                    $product->main_category =  $category['body']->path_from_root[0];
                    $product->path_from_root = $category['body']->path_from_root;
                    $product->children_category = $category['body']->path_from_root;
                    $product->name =$result['body'][0]->body->title;
                    $product->code =$result['body'][0]->body->category_id; 
                    $product->sub_title = null;
                    $product->description = (property_exists($description['body'], "plain_text")) ? $description['body']->plain_text : '';
                    $product->original_price = 0;
                    $product->sale_price =$result['body'][0]->body->price / 1.21;
                    $product->seller_custom_field =$result['body'][0]->body->category_id  . '-0000'; 
                    $product->meta_keywords = null;
                    $product->iva = null;
                    $product->listing_type = null;
                    $product->money =$result['body'][0]->body->currency_id;
                    $product->status_id = $this->status($result['body'][0]->body->status);
                    $product->priority_id = self::MAX_PRIORITY;
                    $product->attributes =$result['body'][0]->body->attributes;
                    $product->published_meli = true;
                    $product->published_here = true;
                    $product->gender_id = $this->save_gender($result['body'][0]->body->attributes);
                    $product->type_shoes_id = $this->save_type_shoes($result['body'][0]->body->attributes);
                    $product->material_id = $this->save_material($result['body'][0]->body->attributes);
                    $product->season_id = $this->save_season($result['body'][0]->body->attributes);
                    $product->meli_info = $result['body'][0]->body;
                    $product->save();
    
                    $product->refresh();
    
                    $price_list = new PriceListProduct;
                    $price_list->pricelist_id = 4; //Mercado libre
                    $price_list->product_id = $product->id;
                    $price_list->price = $product->sale_price;
                    $price_list->save();
                    
                    collect($result['body'][0]->body->pictures)->each(function($image, $key) use($product, $result) {
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
    
                    collect($result['body'][0]->body->variations)->each(function($variation, $index) use($product, $result) {
                    
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
                            'total_stock' =>$result['body'][0]->body->initial_quantity,
                            'available_quantity_meli' => $variation->available_quantity,
                            'published_meli_history' => 0,
                            'available_quantity_here' => 1,
                            'published_here_history' => 0,
                            'sold_on_meli' => $variation->sold_quantity,
                            'sold_on_here' => 0,
                            'critical_stock' => self::CRITICAL_STOCK,
                        ]);
    
                    });
                    
                    CategoryBase::handler($category['body']->path_from_root);
                }
    
                echo date('h:i:s') . 'Núumero : ' .  '<br>'; 
            });
            
        }
        //return false;
    }

    public function syncro_recent()
    {
        return $this->meli_orders->orders_recent(auth()->user()->company->mercadoLibre->meli_token, auth()->user()->company->mercadoLibre->meli_user_id);
    }
}
