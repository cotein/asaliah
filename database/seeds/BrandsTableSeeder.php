<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('brands')->delete();
        
        \DB::table('brands')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'PIAMOND SA',
                'description' => NULL,
                'value_id' => NULL,
                'slug' => 'piamond-sa',
                'deleted_at' => NULL,
                'created_at' => '2021-03-11 14:10:31',
                'updated_at' => '2021-03-11 14:10:31',
            ),
        ));
        
        
    }
}