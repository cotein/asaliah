<?php

use Illuminate\Database\Seeder;

class AccountTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('account_types')->delete();
        
        \DB::table('account_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'CAJA DE AHORRO',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'CUENTA CORRIENTE',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}