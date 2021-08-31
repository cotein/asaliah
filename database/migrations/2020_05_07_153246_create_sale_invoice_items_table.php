<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleInvoiceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_invoice_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sale_invoice_id')->unsigned()->nullable();
            $table->integer('product_id')->unsigned()->nullable();
            $table->integer('quantity')->unsigned()->nullable();
            $table->float('neto_import')->nullable();
            $table->float('iva_import')->nullable();
            $table->integer('iva_id')->unsigned()->nullable();
            $table->integer('discount')->unsigned()->nullable();
            $table->float('discount_import')->nullable();
            $table->float('total')->nullable();
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
        Schema::dropIfExists('sale_invoice_items');
    }
}





