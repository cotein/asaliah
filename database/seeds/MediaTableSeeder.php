<?php

use Illuminate\Database\Seeder;

class MediaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('media')->delete();
        
        \DB::table('media')->insert(array (
            0 => 
            array (
                'id' => 3,
                'model_id' => 1,
                'model_type' => 'App\\Src\\Models\\Company',
                'collection_name' => 'logo',
                'name' => 'logo',
                'file_name' => 'logo-piamond.png',
                'mime_type' => 'image/png',
                'disk' => 'public',
                'size' => 162512,
                'manipulations' => '[]',
                'custom_properties' => '[]',
                'order_column' => 1,
                'created_at' => '2021-04-15 19:05:38',
                'updated_at' => '2021-04-15 19:05:38',
            ),
            1 => 
            array (
                'id' => 4,
                'model_id' => 2,
                'model_type' => 'App\\User',
                'collection_name' => 'avatar',
                'name' => 'user-default',
                'file_name' => 'user-default.png',
                'mime_type' => 'image/png',
                'disk' => 'public',
                'size' => 25417,
                'manipulations' => '[]',
                'custom_properties' => '[]',
                'order_column' => 2,
                'created_at' => '2021-05-14 12:29:00',
                'updated_at' => '2021-05-14 12:29:00',
            ),
        ));
        
        
    }
}