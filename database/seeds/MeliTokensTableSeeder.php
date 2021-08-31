<?php

use Illuminate\Database\Seeder;

class MeliTokensTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('meli_tokens')->delete();
        
        \DB::table('meli_tokens')->insert(array (
            0 => 
            array (
                'id' => 9,
                'company_id' => 1,
                'meli_user_id' => 438749068,
                'token_type' => 'bearer',
                'meli_token' => 'APP_USR-2472142019883490-060912-f5b78eedef66771926df1b837cfa066d-438749068',
                'meli_refresh_token' => 'TG-6099b6350a4f9b0008d4266c-438749068',
                'meli_token_expiration_time' => '2021-06-09 18:10:34',
                'meli_email' => NULL,
                'active' => 1,
                'created_at' => '2021-05-10 22:39:49',
                'updated_at' => '2021-06-09 12:10:34',
            ),
        ));
        
        
    }
}