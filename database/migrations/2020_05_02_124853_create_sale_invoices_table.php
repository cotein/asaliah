<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned()->nullable(); 
            $table->integer('customer_id')->unsigned()->nullable(); 
            $table->string('doc_nro', 100)->nullable();
            $table->integer('voucher_id')->unsigned()->nullable(); //CbeTipo
            $table->integer('pto_vta')->unsigned()->nullable(); 
            $table->integer('cbte_desde')->unsigned()->nullable(); 
            $table->integer('cbte_hasta')->unsigned()->nullable(); 
            $table->string('cbte_fch', 100)->nullable();
            $table->string('cae', 100)->nullable();
            $table->string('cae_fch_vto', 100)->nullable();
            $table->integer('status_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->float('percerp_iibb')->default(0);
            $table->float('total')->default(0);
            $table->json('afip_data')->nullable();
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
        Schema::dropIfExists('sales_invoices');
    }
}
