<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiptPaymentToProvidersInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipt_payment_to_providers_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('receipt_payment_to_provider_id')->unsigned()->nullable();
            $table->integer('payment_order_id')->unsigned()->nullable();
            $table->integer('invoice_id')->unsigned()->nullable();
            $table->float('paid')->unsigned()->nullable();
            $table->float('balance')->unsigned()->nullable();
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
        Schema::dropIfExists('receipt_payment_to_providers_invoices');
    }
}
