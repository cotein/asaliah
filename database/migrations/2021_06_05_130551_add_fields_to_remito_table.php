<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToRemitoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('remitos', function (Blueprint $table) {
            $table->string('code')->nullable();
            $table->string('geocoder')->nullable();
            $table->string('number')->nullable();
            $table->string('delivery_address')->nullable();
            $table->string('delivery_date')->nullable();
            $table->string('commercial_reference')->nullable();
            $table->integer('payment_type_id')->unsigned()->nullable();
            $table->integer('sale_invoice_id')->unsigned()->nullable();
            $table->integer('status_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->float('total', 12,2)->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('remitos', function (Blueprint $table) {
            //
        });
    }
}
