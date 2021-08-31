<?php

use Illuminate\Database\Seeder;

class PublicationTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('publication_types')->delete();
        
        \DB::table('publication_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'site_id' => 'MLA',
                'code' => 'gold_pro',
                'name' => 'Premium',
                'created_at' => '2021-04-03 12:02:54',
                'updated_at' => '2021-04-03 12:02:54',
            ),
            1 => 
            array (
                'id' => 2,
                'site_id' => 'MLA',
                'code' => 'gold_premium',
                'name' => 'Oro Premium',
                'created_at' => '2021-04-03 12:02:54',
                'updated_at' => '2021-04-03 12:02:54',
            ),
            2 => 
            array (
                'id' => 3,
                'site_id' => 'MLA',
                'code' => 'gold_special',
                'name' => 'Clásica',
                'created_at' => '2021-04-03 12:02:54',
                'updated_at' => '2021-04-03 12:02:54',
            ),
            3 => 
            array (
                'id' => 4,
                'site_id' => 'MLA',
                'code' => 'gold',
                'name' => 'Oro',
                'created_at' => '2021-04-03 12:02:54',
                'updated_at' => '2021-04-03 12:02:54',
            ),
            4 => 
            array (
                'id' => 5,
                'site_id' => 'MLA',
                'code' => 'silver',
                'name' => 'Plata',
                'created_at' => '2021-04-03 12:02:54',
                'updated_at' => '2021-04-03 12:02:54',
            ),
            5 => 
            array (
                'id' => 6,
                'site_id' => 'MLA',
                'code' => 'bronze',
                'name' => 'Bronce',
                'created_at' => '2021-04-03 12:02:54',
                'updated_at' => '2021-04-03 12:02:54',
            ),
            6 => 
            array (
                'id' => 7,
                'site_id' => 'MLA',
                'code' => 'free',
                'name' => 'Gratuita',
                'created_at' => '2021-04-03 12:02:54',
                'updated_at' => '2021-04-03 12:02:54',
            ),
        ));
        
        
    }
}