<?php

use Illuminate\Database\Seeder;

class PaymentOrdersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('payment_orders')->delete();
        
        
        
    }
}