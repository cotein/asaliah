<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRetAndPercepFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->boolean('percep_iibb')->default(false)->after('monotributo');
            $table->boolean('percep_iva')->default(false);
            $table->boolean('ret_suss')->default(false);
            $table->boolean('ret_iva')->default(false);
            $table->boolean('ret_iibb')->default(false);
            $table->boolean('ret_gcias')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            //
        });
    }
}
