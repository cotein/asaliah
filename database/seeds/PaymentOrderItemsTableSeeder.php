<?php

use Illuminate\Database\Seeder;

class PaymentOrderItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('payment_order_items')->delete();
        
        
        
    }
}