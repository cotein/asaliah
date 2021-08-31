<?php

use Illuminate\Database\Seeder;

class SujetosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sujetos')->delete();
        
        \DB::table('sujetos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'afip_code' => '2',
                'name' => 'OTRO TIPO DE ENTIDAD',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'afip_code' => '1',
                'name' => 'FISICA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'afip_code' => '0',
                'name' => 'JURIDICA',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}