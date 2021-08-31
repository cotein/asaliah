<?php

use Illuminate\Database\Seeder;

class CustomerTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('customer_types')->delete();
        
        \DB::table('customer_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'MINORISTA',
                'created_at' => '2020-11-04 17:29:16',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'MAYORISTA',
                'created_at' => '2020-11-04 17:29:27',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}