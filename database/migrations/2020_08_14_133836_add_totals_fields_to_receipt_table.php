<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTotalsFieldsToReceiptTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('receipts', function (Blueprint $table) {
            $table->float('total_invoices_import')->nullable()->default(0);
            $table->float('cancelation_documents_import')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('receipts', function (Blueprint $table) {
            //
        });
    }
}
