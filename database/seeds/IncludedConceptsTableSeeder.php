<?php

use Illuminate\Database\Seeder;

class IncludedConceptsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('included_concepts')->delete();
        
        \DB::table('included_concepts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'afip_code' => '1',
                'name' => 'Producto / Exportación definitiva de bienes',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'afip_code' => '2',
                'name' => 'Servicios',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'afip_code' => '3',
                'name' => 'Productos y Servicios',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'afip_code' => '4',
                'name' => 'Otros',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}