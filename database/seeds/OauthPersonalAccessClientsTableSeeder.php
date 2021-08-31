<?php

use Illuminate\Database\Seeder;

class OauthPersonalAccessClientsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('oauth_personal_access_clients')->delete();
        
        \DB::table('oauth_personal_access_clients')->insert(array (
            0 => 
            array (
                'id' => 1,
                'client_id' => 1,
                'created_at' => '2021-04-03 12:09:47',
                'updated_at' => '2021-04-03 12:09:47',
            ),
            1 => 
            array (
                'id' => 2,
                'client_id' => 3,
                'created_at' => '2021-04-08 01:31:48',
                'updated_at' => '2021-04-08 01:31:48',
            ),
            2 => 
            array (
                'id' => 3,
                'client_id' => 5,
                'created_at' => '2021-04-12 12:48:16',
                'updated_at' => '2021-04-12 12:48:16',
            ),
            3 => 
            array (
                'id' => 4,
                'client_id' => 7,
                'created_at' => '2021-04-13 16:25:57',
                'updated_at' => '2021-04-13 16:25:57',
            ),
            4 => 
            array (
                'id' => 5,
                'client_id' => 9,
                'created_at' => '2021-04-18 17:13:53',
                'updated_at' => '2021-04-18 17:13:53',
            ),
            5 => 
            array (
                'id' => 6,
                'client_id' => 11,
                'created_at' => '2021-05-13 16:03:58',
                'updated_at' => '2021-05-13 16:03:58',
            ),
            6 => 
            array (
                'id' => 7,
                'client_id' => 13,
                'created_at' => '2021-05-14 18:56:43',
                'updated_at' => '2021-05-14 18:56:43',
            ),
        ));
        
        
    }
}