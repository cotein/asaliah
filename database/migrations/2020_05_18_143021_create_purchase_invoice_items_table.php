<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseInvoiceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_invoice_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('purchase_invoices_id')->unsigned()->nullable();
            $table->integer('article_id')->unsigned()->nullable();
            $table->integer('measure_unit_id')->unsigned()->nullable();
            $table->float('quantity', 8, 2)->default(0);
            $table->float('unit_price', 8, 2)->default(0);
            $table->integer('iva_id')->unsigned()->nullable();
            $table->float('iva_import', 8, 2)->default(0);
            $table->float('discount', 8, 2)->default(0);
            $table->float('total', 8, 2)->default(0);
            $table->string('description')->nullable();
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
        Schema::dropIfExists('purchase_invoice_items');
    }
}
