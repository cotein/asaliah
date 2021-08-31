<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddObsFieldToSaleInvoiceItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sale_invoice_items', function (Blueprint $table) {
            $table->string('obs')->nullable()->after('total');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    /* public function down()
    {
        Schema::table('sale_invoice_items', function (Blueprint $table) {
            //
        });
    } */
}
