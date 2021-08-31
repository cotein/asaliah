<?php

use Illuminate\Database\Seeder;

class DailyMovementTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('daily_movement_types')->delete();
        
        \DB::table('daily_movement_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'COMPRAS',
                'created_at' => '2020-09-23 11:14:07',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'VENTAS',
                'created_at' => '2020-09-23 11:13:50',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}