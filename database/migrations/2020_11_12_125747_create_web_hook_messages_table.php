<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebHookMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_hook_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('message_id', 100)->nullable();
            $table->string('send_user_id')->nullable();
            $table->string('send_user_email')->nullable();
            $table->string('receive_user_id')->nullable();
            $table->string('receive_user_email')->nullable();
            $table->json('text')->nullable();
            $table->text('plain')->nullable();
            $table->string('status')->nullable();
            $table->string('site_id')->nullable();
            $table->string('date')->nullable();
            $table->string('date_created')->nullable();
            $table->string('date_received')->nullable();
            $table->string('date_available')->nullable();
            $table->string('date_notified')->nullable();
            $table->string('date_read')->nullable();
            $table->json('from')->nullable();
            $table->json('to')->nullable();
            $table->json('moderation')->nullable();
            $table->string('hold')->nullable();
            $table->text('answer')->nullable();
            $table->string('name')->nullable();
            $table->string('subject')->nullable();
            $table->string('resource')->nullable();
            $table->string('resource_id')->nullable();
            $table->string('client_id')->nullable();
            $table->integer('status_id')->nullable();
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
        Schema::dropIfExists('web_hook_messages');
    }
}
