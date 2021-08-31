<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('meli_id')->nullable();
            $table->string('site_id')->nullable();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('seller_id')->nullable();
            $table->string('category_id')->nullable();
            $table->string('official_store_id')->nullable();
            $table->float('price', 8, 2)->default(0);
            $table->float('base_price', 8, 2)->default(0);
            $table->string('currency_id')->nullable();
            $table->integer('initial_quantity')->nullable();
            $table->integer('available_quantity')->nullable();
            $table->integer('sold_quantity')->nullable();
            $table->json('sale_terms')->nullable();
            $table->string('buying_mode')->nullable();
            $table->string('listing_type_id')->nullable();
            $table->string('start_time')->nullable();
            $table->string('stop_time')->nullable();
            $table->string('end_time')->nullable();
            $table->string('expiration_time')->nullable();
            $table->string('condition')->nullable();
            $table->string('permalink')->nullable();
            $table->json('pictures')->nullable();
            $table->json('video_id')->nullable();
            $table->json('descriptions')->nullable();
            $table->boolean('accepts_mercadopago')->default(true);
            $table->json('non_mercado_pago_payment_methods')->nullable();
            $table->json('shipping')->nullable();
            $table->string('international_delivery_mode')->nullable();
            $table->json('seller_address')->nullable();
            $table->json('seller_contact')->nullable();
            $table->json('location')->nullable();
            $table->json('geolocation')->nullable();
            $table->json('coverage_areas')->nullable();
            $table->json('attributes')->nullable();
            $table->json('warnings')->nullable();
            $table->json('listing_source')->nullable();
            $table->json('variations')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('secure_thumbnail')->nullable();
            $table->string('status')->nullable();
            $table->json('sub_status')->nullable();
            $table->json('tags')->nullable();
            $table->string('warranty')->nullable();
            $table->string('catalog_product_id')->nullable();
            $table->string('domain_id')->nullable();
            $table->string('seller_custom_field')->nullable();
            $table->string('parent_item_id')->nullable();
            $table->string('differential_pricing')->nullable();
            $table->json('deal_ids')->nullable();
            $table->boolean('automatic_relist')->default(false);
            $table->string('date_created')->nullable();
            $table->string('last_updated')->nullable();
            $table->string('health')->nullable();
            $table->boolean('catalog_listing')->default(false);
            $table->json('item_relations')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publications');
    }
}
