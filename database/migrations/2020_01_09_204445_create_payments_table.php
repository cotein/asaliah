<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mercadopago_id')->unsigned()->nullable();
            $table->string('operation_type', 100)->nullable();
            $table->string('issuer_id', 100)->nullable();
            $table->string('payment_method_id', 100)->nullable();
            $table->string('payment_type_id', 100)->nullable();
            $table->string('status', 100)->nullable();
            $table->string('status_detail', 100)->nullable();
            $table->string('currency_id', 100)->nullable();
            $table->string('description')->nullable();
            $table->float('taxes_amount')->nullable()->default(0);
            $table->float('shipping_amount')->nullable()->default(0);
            $table->integer('collector_id')->unsigned()->nullable()->default(0);
            $table->json('payer')->nullable();
            $table->string('marketplace_owner', 100)->nullable();
            $table->json('additional_info')->nullable();
            $table->float('transaction_amount')->nullable()->default(0);
            $table->float('transaction_amount_refunded')->nullable()->default(0);
            $table->float('coupon_amount')->nullable()->default(0);
            $table->json('transaction_details')->nullable();
            $table->json('fee_details')->nullable();
            $table->string('statement_descriptor', 100)->nullable();
            $table->integer('installments')->unsigned()->nullable()->default(1);
            $table->json('card')->nullable();
            $table->integer('order_id')->unsigned()->nullable();
            $table->string('processing_mode', 100)->nullable();
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
        Schema::dropIfExists('payments');
    }
}
