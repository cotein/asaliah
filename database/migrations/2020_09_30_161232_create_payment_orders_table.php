<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number')->unsigned()->nullable();
            $table->integer('provider_id')->unsigned()->nullable();
            $table->integer('voucher_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('status_id')->unsigned()->nullable();
            $table->integer('receipt_payment_to_provider_id')->unsigned()->nullable();
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
        Schema::dropIfExists('payment_orders');
    }
}
