<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToReceiptInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('receipt_invoices', function (Blueprint $table) {
            $table->float('total_invoice')->nullable()->default(0);
            $table->float('payment')->nullable()->default(0);
            $table->float('debt')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('receipt_invoices', function (Blueprint $table) {
            //
        });
    }
}
