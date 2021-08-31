<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProviderRegimensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers_regimen', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->nullable();
            $table->string('anexo')->nullable();
            $table->text('description')->nullable();
            $table->string('inscriptos')->nullable();
            $table->string('no_inscriptos')->nullable();
            $table->string('inscriptos_a')->nullable();
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
        Schema::dropIfExists('providers_regimen');
    }
}
