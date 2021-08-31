<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountingAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounting_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account')->unsigned()->nullable();
            $table->string('imputable')->nullable();
            $table->string('name')->nullable();
            $table->integer('parent_account')->unsigned()->nullable();
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
        Schema::dropIfExists('accounting_accounts');
    }
}
