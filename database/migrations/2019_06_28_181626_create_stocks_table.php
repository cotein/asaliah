<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('variation_id')->unsigned()->default(1);
            $table->integer('total_stock')->default(1);
            $table->integer('available_quantity_meli')->default(1);
            $table->integer('published_meli_history')->default(1);
            $table->integer('available_quantity_here')->default(1);
            $table->integer('published_here_history')->default(1);
            $table->integer('sold_on_meli')->default(1);
            $table->integer('sold_on_here')->default(1);
            $table->integer('critical_stock')->default(1);
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
        Schema::dropIfExists('stocks');
    }
}
