<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commissions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pedido_cliente_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('status_id')->unsigned()->nullable();
            $table->integer('pay_method_id')->unsigned()->nullable();
            $table->float('base_imponible')->nullable()->default(0);
            $table->float('percentage')->nullable()->default(0);
            $table->float('commission')->nullable()->default(0);
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
        Schema::dropIfExists('commissions');
    }
}
