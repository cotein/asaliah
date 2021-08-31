<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosClientesItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos_clientes_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pedido_cliente_id')->unsigned()->nullable();
            $table->integer('product_id')->unsigned()->nullable();
            $table->integer('pricelist_id')->unsigned()->nullable();
            $table->float('unit_price')->nullable()->default(0);
            $table->integer('quantity')->unsigned()->nullable()->default(1);
            $table->integer('discount_percentage')->unsigned()->nullable()->default(0);
            $table->float('discount_import')->nullable()->default(0);
            $table->integer('iva_id')->unsigned()->nullable();
            $table->float('iva_percentage')->nullable()->default(0);
            $table->float('iva_import')->nullable()->default(0);
            $table->float('neto_import')->nullable()->default(0);
            $table->float('total')->nullable()->default(0);
            $table->json('price_list')->nullable();
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
        Schema::dropIfExists('pedidos_clientes_items');
    }
}
