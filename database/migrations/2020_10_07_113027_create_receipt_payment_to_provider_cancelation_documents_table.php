<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiptPaymentToProviderCancelationDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipt_payment_to_provider_cancelation_documents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('receipt_payment_to_provider_id')->unsigned()->nullable();
            $table->integer('payment_type_id')->unsigned()->nullable();
            $table->integer('bank_id')->unsigned()->nullable();
            $table->string('description')->nullable();
            $table->string('number')->nullable();
            $table->date('expirate_date')->nullable();
            $table->float('import')->nullable()->default(0);
            $table->string('owner')->nullable();
            $table->integer('status_id')->unsigned()->nullable()->default(1);
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
        Schema::dropIfExists('receipt_payment_to_provider_cancelation_documents');
    }
}
