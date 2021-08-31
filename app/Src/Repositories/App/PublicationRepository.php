<?php

namespace App\Src\Repositories\App;

use App\Src\Models\Publication;
use Illuminate\Database\Eloquent\Model;

class PublicationRepository extends Model
{
    public function create($body)
    {
        return Publication::create([
            'meli_id' => (property_exists($body, 'id')) ? $body->id : '',
            'site_id' => (property_exists($body, 'site_id')) ? $body->site_id : '',
            'title' => (property_exists($body, 'title')) ? $body->title : '',
            'subtitle' => (property_exists($body, 'subtitle')) ? $body->subtitle : '',
            'seller_id' => (property_exists($body, 'seller_id')) ? $body->seller_id : '',
            'category_id' => (property_exists($body, 'category_id')) ? $body->category_id : '',
            'official_store_id' => (property_exists($body, 'official_store_id')) ? $body->official_store_id : '',
            'price' => (property_exists($body, 'price')) ? $body->price : 0,
            'base_price' => (property_exists($body, 'base_price')) ? $body->base_price : 0,
            'currency_id' => (property_exists($body, 'currency_id')) ? $body->currency_id : '',
            'initial_quantity' => (property_exists($body, 'initial_quantity')) ? $body->initial_quantity : 1,
            'available_quantity' => (property_exists($body, 'available_quantity')) ? $body->available_quantity : 0,
            'sold_quantity' => (property_exists($body, 'sold_quantity')) ? $body->sold_quantity : 0,
            'sale_terms' => (property_exists($body, 'sale_terms')) ? $body->sale_terms : '',
            'buying_mode' => (property_exists($body, 'buying_mode')) ? $body->buying_mode : '',
            'listing_type_id' => (property_exists($body, 'listing_type_id')) ? $body->listing_type_id : '',
            'start_time' => (property_exists($body, 'start_time')) ? $body->start_time : '',
            'stop_time' => (property_exists($body, 'stop_time')) ? $body->stop_time : '',
            'condition' => (property_exists($body, 'condition')) ? $body->condition : '',
            'permalink' => (property_exists($body, 'permalink')) ? $body->permalink : '',
            'pictures' => (property_exists($body, 'pictures')) ? $body->pictures : '',
            'variations' => (property_exists($body, 'variations')) ? $body->variations : '',
            'attributes' => (property_exists($body, 'attributes')) ? $body->attributes : '',
            'thumbnail' => (property_exists($body, 'thumbnail')) ? $body->thumbnail : '',
            'secure_thumbnail' => (property_exists($body, 'secure_thumbnail')) ? $body->secure_thumbnail : '',
            'status' => (property_exists($body, 'status')) ? $body->status : '',
            'sub_status' => (property_exists($body, 'sub_status')) ? $body->sub_status : '',
            'tags' => (property_exists($body, 'tags')) ? $body->tags : '',
            'warranty' => (property_exists($body, 'warranty')) ? $body->warranty : '',
            'catalog_product_id' => (property_exists($body, 'catalog_product_id')) ? $body->catalog_product_id : '',
            'domain_id' => (property_exists($body, 'domain_id')) ? $body->domain_id : '',
            'parent_item_id' => (property_exists($body, 'parent_item_id')) ? $body->parent_item_id : '',
            'differential_pricing' => (property_exists($body, 'differential_pricing')) ? $body->differential_pricing : '',
            'deal_ids' => (property_exists($body, 'deal_ids')) ? $body->deal_ids : '',
            'automatic_relist' => (property_exists($body, 'automatic_relist')) ? $body->automatic_relist : 0,
            'date_created' => (property_exists($body, 'date_created')) ? $body->date_created : '',
            'last_updated' => (property_exists($body, 'last_updated')) ? $body->last_updated : '',
            'health' => (property_exists($body, 'health')) ? $body->health : '',
            'catalog_listing' => (property_exists($body, 'catalog_listing')) ? $body->catalog_listing : 1,
        ]);
    }
}
