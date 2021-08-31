<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('meli_id')->nullable();
            $table->integer('supplier_id')->unsigned()->default(1);
            $table->integer('brand_id')->unsigned()->nullable()->default(1);
            $table->json('attr_item_condition')->nullable();//
            $table->json('buying_mode')->nullable();//
            $table->json('main_category')->nullable();//
            $table->json('path_from_root')->nullable();//
            $table->json('children_category')->nullable();//
            $table->string('name')->nullable();
            $table->string('name_on_supplier')->nullable();
            $table->string('code')->nullable();
            $table->string('code_on_supplier')->nullable();
            $table->string('sub_title')->nullable();
            $table->text('description')->nullable();
            $table->float('original_price', 8, 2);
            $table->float('sale_price', 8, 2);
            $table->string('seller_custom_field')->nullable(); //SKU
            $table->string('meta_keywords')->nullable();//Full text search
            $table->json('iva')->nullable();
            $table->json('listing_type')->nullable();
            $table->json('money')->nullable();
            $table->integer( 'status_id' )->default( 1 );
            $table->integer('priority_id')->nullable();//para filtrar tipo de producto
            $table->json('attributes')->nullable();//
            $table->boolean('published_meli')->nullable()->default(false);
            $table->boolean('published_here')->nullable()->default(false);
            $table->boolean('hot_offert')->nullable()->default(false);
            $table->boolean('active')->nullable()->default(true);
            $table->integer( 'discount_percentage' )->default( 10 );
            $table->string('slug')->nullable();
            $table->integer('gender_id')->nullable();
            $table->integer('type_shoes_id')->nullable();
            $table->integer('material_id')->nullable();
            $table->integer('activity_id')->nullable();
            $table->integer('season_id')->nullable();
            $table->json('categories_path')->nullable();
            $table->json('selected_categories_from_root')->nullable();
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
        Schema::dropIfExists('products');
    }
}
