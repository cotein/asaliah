<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRemitoItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remito_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('remito_id')->unsigned()->nullable();
            $table->integer('quantity')->unsigned()->nullable();
            $table->string('product_id')->nullable();
            $table->float('neto')->nullable()->default(0);
            $table->float('iva')->nullable()->default(0);
            $table->float('total')->nullable()->default(0);
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
        Schema::dropIfExists('remito_items');
    }
}
