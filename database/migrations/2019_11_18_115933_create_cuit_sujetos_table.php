<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuitSujetosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuit_sujetos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('afip_code', 100)->nullable();
            $table->string('name', 100)->nullable();
            $table->string('sujeto_id', 100)->nullable();
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
        Schema::dropIfExists('cuit_sujetos');
    }
}
