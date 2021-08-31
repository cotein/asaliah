<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidoClienteAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_cliente_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pedido_cliente_id')->unsigned()->nullable();
            $table->string('fiscal_address_id')->nullable();
            $table->string('delivery_address_id')->nullable();
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
        Schema::dropIfExists('pedido_cliente_addresses');
    }
}
