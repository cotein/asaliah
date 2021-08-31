<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVariationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned()->nullable();
            $table->string('meli_id')->nullable();
            $table->string('seller_custom_field')->nullable();
            $table->json('attribute_combinations')->nullable();
            $table->json('attributes')->nullable();
            $table->boolean('published_meli')->nullable()->default(false);
            $table->boolean('published_here')->nullable()->default(false);
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
        Schema::dropIfExists('variations');
    }
}
