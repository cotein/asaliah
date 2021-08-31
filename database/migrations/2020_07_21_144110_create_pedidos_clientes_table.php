<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos_clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned()->nullable();
            $table->string('code', 100)->nullable();
            $table->integer('number')->unsigned()->nullable();
            $table->string('delivery_address')->nullable();
            $table->date('delivery_date')->nullable();
            $table->json('geocoder')->nullable();
            $table->float('total')->nullable()->default(0);
            $table->integer('status_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
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
        Schema::dropIfExists('pedidos_clientes');
    }
}
