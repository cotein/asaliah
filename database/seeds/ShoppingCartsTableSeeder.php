<?php

use Illuminate\Database\Seeder;

class ShoppingCartsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('shopping_carts')->delete();
        
        
        
    }
}