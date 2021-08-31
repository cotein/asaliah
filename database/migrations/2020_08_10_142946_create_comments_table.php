<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description')->nullable();
            $table->integer('commentable_id')->unsigned()->nullable();
            $table->string('commentable_type')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('user_name')->nullable();
            $table->integer('pedido_status_id')->unsigned()->nullable();
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
        Schema::dropIfExists('comments');
    }
}
