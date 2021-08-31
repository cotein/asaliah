<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('provider_id')->unsigned()->nullable();
            $table->integer('voucher_id')->unsigned()->nullable();
            $table->integer('ptovta')->nullable();
            $table->integer('number')->nullable();
            $table->date('invoice_date')->nullable();
            $table->date('imputation_date')->nullable();
            $table->integer('status_id')->unsigned()->nullable();
            $table->float('total', 8, 2)->nullable();
            $table->integer('moneda_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
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
        Schema::dropIfExists('purchase_invoices');
    }
}
