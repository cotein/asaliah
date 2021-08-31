<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('Nombre');
            $table->string('last_name')->default('Apellido');
            $table->string('email')->unique()->default('diego.barrueta@gmail.com');
            $table->string('password')->default('$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm');
            $table->boolean('active')->default(false);
            $table->text('token')->nullable();
            $table->string('refresh_token')->nullable();
            $table->string('activation_token')->nullable();
            $table->string('token_type')->nullable()->default('bearer');
            $table->string('meli_token')->nullable()->default('');
            $table->string('meli_refresh_token')->nullable()->default('');
            $table->string('meli_token_expiration_time')->nullable()->default('');
            $table->string('meli_scope')->nullable();
            $table->string('meli_token_type')->nullable()->default('bearer');
            $table->integer('meli_user_id')->nullable();
            $table->tinyInteger('type_user_id')->unsigned()->default(1);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('web_users');
    }
}
