<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPolimorphicFieldsToDailyMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('daily_movements', function (Blueprint $table) {
            $table->integer('daily_movementable_id')->unsigned()->nullable();
            
            $table->string('daily_movementable_type')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('daily_movements', function (Blueprint $table) {
            //
        });
    }
}
