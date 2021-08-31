<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyMovementItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_movement_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('daily_movement_id')->unsigned()->nullable();
            $table->integer('number')->unsigned()->nullable();
            $table->date('date')->nullable();
            $table->string('name')->nullable();
            $table->integer('accounting_account_id')->unsigned()->nullable();
            $table->float('debe')->nullable();
            $table->float('haber')->nullable();
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
        Schema::dropIfExists('daily_movement_items');
    }
}
