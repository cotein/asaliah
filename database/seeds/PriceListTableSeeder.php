<?php

use Illuminate\Database\Seeder;

class PriceListTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('price_list')->delete();
        
        \DB::table('price_list')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'MINORISTA',
                'enable' => 1,
                'created_at' => '2021-07-06 14:10:08',
                'updated_at' => '2021-07-06 14:10:09',
                'benefit' => 50.0,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'GREMIO',
                'enable' => 1,
                'created_at' => '2021-07-06 14:10:34',
                'updated_at' => '2021-07-06 14:10:34',
                'benefit' => 25.0,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'MAYORISTA',
                'enable' => 1,
                'created_at' => '2021-07-06 14:10:44',
                'updated_at' => '2021-07-06 14:10:45',
                'benefit' => 15.0,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'WEB',
                'enable' => 1,
                'created_at' => '2021-07-06 14:10:58',
                'updated_at' => '2021-07-06 14:10:58',
                'benefit' => 40.0,
            ),
        ));
        
        
    }
}