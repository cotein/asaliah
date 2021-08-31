<?php

use Illuminate\Database\Seeder;

class BankAccountsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('bank_accounts')->delete();
        
        \DB::table('bank_accounts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'bank_accountable_id' => 1,
                'bank_accountable_type' => 'App\\Src\\Models\\Customer',
                'account_type_id' => 1,
                'bank_id' => 1,
                'money_id' => 1,
                'number' => '1111111',
                'cbu' => 'FFFFF',
                'alias' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}