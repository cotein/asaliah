<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_carts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('email')->nullable();
            $table->float('amount')->nullable()->default(0);
            $table->integer('country_id')->unsigned()->default(1);
            $table->integer('province_id')->unsigned()->default(1);
            $table->integer('city_id')->unsigned()->default(1);
            $table->integer('payment_id')->unsigned()->default(1);
            $table->string('message')->nullable();
            $table->string('status')->nullable();
            $table->float('shipping_amount')->nullable()->default(0);
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
        Schema::dropIfExists('shopping_carts');
    }
}
