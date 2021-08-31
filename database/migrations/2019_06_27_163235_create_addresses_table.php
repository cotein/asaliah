<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->nullable();
            $table->integer('country_id')->unsigned()->nullable()->default(1);
            $table->integer('province_id')->unsigned()->nullable();
            $table->string('city')->nullable();
            $table->integer('city_id')->unsigned()->nullable();
            $table->string('address')->nullable();
            $table->string('number')->nullable();
            $table->string('cp')->nullable();
            $table->text('message')->nullable();
            $table->json('geocoder')->nullable();
            $table->integer('addressable_id')->unsigned()->nullable();
            $table->string('addressable_type')->nullable();
            $table->integer('type_id')->unsigned()->nullable();
            $table->integer('status_id')->unsigned()->nullable()->default(1);
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
        Schema::dropIfExists('addresses');
    }
}
