<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->nullable();
            $table->string('number', 11)->nullable();
            $table->unsignedInteger('inscription_id')->nullable();
            $table->unsignedInteger('address_id')->nullable();
            $table->unsignedInteger('purchaser_document_id')->nullable();
            $table->json('datos_generales')->nullable();
            $table->json('regimen_general')->nullable();
            $table->json('monotributo')->nullable();
            $table->json('error_constancia')->nullable();
            $table->json('afip_data')->nullable();
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
        Schema::dropIfExists('providers');
    }
}
