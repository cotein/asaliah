<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiptPaymentToProviderOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipt_payment_to_provider_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('payment_order_id')->unsigned()->nullable();
            $table->integer('receipt_payment_to_provider_id')->unsigned()->nullable();
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
        Schema::dropIfExists('receipt_payment_to_provider_orders');
    }
}
