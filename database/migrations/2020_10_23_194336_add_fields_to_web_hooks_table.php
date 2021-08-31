<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToWebHooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('web_hooks', function (Blueprint $table) {
            $table->string('_id')->nullable();
            $table->string('application_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('resource')->nullable();
            $table->string('topic')->nullable();
            $table->string('sent')->nullable();
            $table->string('received')->nullable();
            $table->string('attempts')->nullable();
            $table->string('created')->nullable();
            $table->integer('status_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('web_hooks', function (Blueprint $table) {
            //
        });
    }
}
