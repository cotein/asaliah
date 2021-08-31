<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebHookQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_hook_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('meli_id', 100)->nullable();
            $table->string('seller_id', 100)->nullable();
            $table->text('text')->nullable();
            $table->string('status')->nullable();
            $table->string('item_id')->nullable();
            $table->string('date_created')->nullable();
            $table->string('hold')->nullable();
            $table->boolean('deleted_from_listing')->nullable();
            $table->text('answer')->nullable();
            $table->json('from')->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('web_hook_questions');
    }
}
