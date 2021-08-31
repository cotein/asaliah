<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeShoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_shoes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->default('Una Marca');
            $table->string('description')->nullable();
            $table->string('value_id')->nullable();
            $table->string('slug')->nullable();
            $table->softDeletes();            
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
        Schema::dropIfExists('type_shoes');
    }
}
