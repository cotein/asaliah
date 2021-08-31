<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiptCancelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipt_cancelations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('receip_id')->unsigned()->nullable();
            $table->integer('payment_type_id')->unsigned()->nullable();
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
        Schema::dropIfExists('receipt_cancelations');
    }
}
