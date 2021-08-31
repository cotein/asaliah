<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeliTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meli_tokens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->nullable();
            $table->integer('meli_user_id')->nullable();
            $table->string('token_type')->nullable()->default('bearer');
            $table->text('meli_token')->nullable();
            $table->text('meli_refresh_token')->nullable();
            $table->string('meli_token_expiration_time')->nullable();
            $table->string('meli_email')->nullable();
            $table->boolean('active')->nullable()->default(false);
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
        Schema::dropIfExists('meli_tokens');
    }
}
