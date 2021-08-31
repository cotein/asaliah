<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
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
            $table->integer('type_user_id')->unsigned()->default(1);
            $table->integer('company_id')->unsigned()->nullable()->default(1);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

           /*  $table->foreign('type_user_id')->references('id')
            ->on('type_users')
            ->onDelete('cascade'); */
            //refresh_token = TG-5c98fc17de6cb70006b5739d-1157128
            //pra la app test_meli_coto
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
