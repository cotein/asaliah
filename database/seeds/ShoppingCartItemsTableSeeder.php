<?php

use Illuminate\Database\Seeder;

class ShoppingCartItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('shopping_cart_items')->delete();
        
        
        
    }
}