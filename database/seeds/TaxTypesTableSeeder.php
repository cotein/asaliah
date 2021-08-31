<?php

use Illuminate\Database\Seeder;

class TaxTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tax_types')->delete();
        
        \DB::table('tax_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'PERCEP. IIBB',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'PERCEP. IVA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'IMPUESTOS NACIONALES',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}