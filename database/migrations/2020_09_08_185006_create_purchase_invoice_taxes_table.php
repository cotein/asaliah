<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseInvoiceTaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_invoice_taxes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('purchase_invoice_id')->unsigned()->nullable();
            $table->integer('tax_id')->unsigned()->nullable();
            $table->integer('state_id')->unsigned()->nullable();
            $table->float('tax_import')->nullable()->default(0);
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
        Schema::dropIfExists('purchase_invoice_taxes');
    }
}
