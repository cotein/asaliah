<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiptPaymentToProviderRceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipt_payment_to_provider_receipts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('receipt_payment_to_provider_id')->unsigned()->nullable();
            $table->integer('receipt_provider_id')->unsigned()->nullable();
            $table->float('import')->nullable()->default(0);
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
        Schema::dropIfExists('receipt_payment_to_provider_receipts');
    }
}
