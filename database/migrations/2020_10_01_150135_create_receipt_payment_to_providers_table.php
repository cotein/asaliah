<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiptPaymentToProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipt_payment_to_providers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number')->unsigned()->nullable();
            $table->integer('provider_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->float('total_orders')->nullable()->default(0);
            $table->float('total_paid')->nullable()->default(0);
            $table->float('balance')->nullable()->default(0);
            $table->integer('status_id')->unsigned()->nullable();
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
        Schema::dropIfExists('receipt_payment_to_providers');
    }
}
