<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressTypeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('address_type')->delete();
        
        DB::table('address_type')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'FISCAL',
                'created_at' => '2021-04-03 12:02:54',
                'updated_at' => '2021-04-03 12:02:54',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'ENTREGA',
                'created_at' => '2021-04-03 12:02:55',
                'updated_at' => '2021-04-03 12:02:55',
            ),
        ));
        
        
    }
}