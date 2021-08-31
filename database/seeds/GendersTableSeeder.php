<?php

use Illuminate\Database\Seeder;

class GendersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('genders')->delete();
        
        
        
    }
}