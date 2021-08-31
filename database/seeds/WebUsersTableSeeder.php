<?php

use Illuminate\Database\Seeder;

class WebUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('web_users')->delete();
        
        
        
    }
}