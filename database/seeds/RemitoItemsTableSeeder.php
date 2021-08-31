<?php

use Illuminate\Database\Seeder;

class RemitoItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('remito_items')->delete();
        
        \DB::table('remito_items')->insert(array (
            0 => 
            array (
                'id' => 1,
                'remito_id' => 2,
                'quantity' => 2,
                'product_id' => 'MLA830661742',
                'neto' => 366.94,
                'iva' => 77.06,
                'total' => 444.0,
                'created_at' => '2021-06-07 15:31:32',
                'updated_at' => '2021-06-07 15:31:32',
            ),
            1 => 
            array (
                'id' => 2,
                'remito_id' => 3,
                'quantity' => 1,
                'product_id' => 'MLA830661440',
                'neto' => 247.93,
                'iva' => 52.07,
                'total' => 300.0,
                'created_at' => '2021-06-07 15:33:04',
                'updated_at' => '2021-06-07 15:33:04',
            ),
            2 => 
            array (
                'id' => 3,
                'remito_id' => 4,
                'quantity' => 23,
                'product_id' => '24',
                'neto' => 34279.2,
                'iva' => 7198.63,
                'total' => 41477.83,
                'created_at' => '2021-06-08 18:03:26',
                'updated_at' => '2021-06-08 18:03:26',
            ),
            3 => 
            array (
                'id' => 4,
                'remito_id' => 5,
                'quantity' => 1,
                'product_id' => 'MLA819953868',
                'neto' => 247.93,
                'iva' => 52.07,
                'total' => 300.0,
                'created_at' => '2021-06-08 18:44:32',
                'updated_at' => '2021-06-08 18:44:32',
            ),
        ));
        
        
    }
}