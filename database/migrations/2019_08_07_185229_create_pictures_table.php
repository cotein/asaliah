<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pictures', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned()->nullable();
            $table->string('meli_id')->nullable();
            $table->string('size')->nullable();
            $table->string('quality')->nullable();
            $table->string('max_size')->nullable();
            $table->string('url')->nullable()->default('text');
            $table->string('secure_url')->nullable()->default('text');
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
        Schema::dropIfExists('pictures');
    }
}
