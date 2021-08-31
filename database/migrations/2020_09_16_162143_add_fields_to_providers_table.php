<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('providers', function (Blueprint $table) {
            $table->integer('regimen_id')->unsigned()->nullable();
            $table->boolean('iibb_exempt')->nullable()->default(true);
            $table->boolean('iva_exempt')->nullable()->default(true);
            $table->boolean('gcias_exempt')->nullable()->default(true);
            $table->boolean('suss_exempt')->nullable()->default(true);
            $table->boolean('has_afip_data')->nullable()->default(true);
            $table->string('contact')->nullable();
            $table->string('cell_phone')->nullable();
            $table->string('phone_1')->nullable();
            $table->string('phone_2')->nullable();
            $table->string('phone_3')->nullable();
            $table->string('email')->nullable();
            $table->json('others')->nullable();
            $table->integer('status_id')->unsigned()->nullable()->default(1);
            $table->integer('pay_condition')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('providers', function (Blueprint $table) {
            //
        });
    }
}
