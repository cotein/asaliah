<?php

use Illuminate\Database\Seeder;

class ShippmentModesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('shippment_modes')->delete();
        
        \DB::table('shippment_modes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'custom',
                'created_at' => '2021-04-03 12:02:54',
                'updated_at' => '2021-04-03 12:02:54',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'not_specified',
                'created_at' => '2021-04-03 12:02:54',
                'updated_at' => '2021-04-03 12:02:54',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'me1',
                'created_at' => '2021-04-03 12:02:54',
                'updated_at' => '2021-04-03 12:02:54',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'me2',
                'created_at' => '2021-04-03 12:02:54',
                'updated_at' => '2021-04-03 12:02:54',
            ),
        ));
        
        
    }
}