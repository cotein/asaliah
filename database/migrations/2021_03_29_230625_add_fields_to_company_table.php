<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            
            $table->integer('pto_vta_fe')->unsigned()->nullable();
            $table->integer('pto_vta_fe_exterior')->unsigned()->nullable();
            $table->integer('pto_vta_fce')->unsigned()->nullable();
            $table->integer('pto_vta_fce_exterior')->unsigned()->nullable();
            $table->integer('pto_vta_remito')->unsigned()->nullable();
            $table->integer('pto_vta_remito_exterior')->unsigned()->nullable();
            $table->integer('pto_vta_recibo')->unsigned()->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            //
        });
    }
}
