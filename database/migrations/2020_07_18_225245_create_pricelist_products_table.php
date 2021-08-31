<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricelistProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricelist_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pricelist_id')->unsigned()->nullable();
            $table->integer('product_id')->unsigned()->nullable();
            $table->float('price')->nullable()->default(0);
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
        Schema::dropIfExists('pricelist_products');
    }
}
