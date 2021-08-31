<?php

use Illuminate\Database\Seeder;

class ReceiptCancelationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('receipt_cancelations')->delete();
        
        \DB::table('receipt_cancelations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'receipt_id' => 1,
                'payment_type_id' => 2,
                'description' => NULL,
                'number' => '7777',
                'expirate_date' => '2021-05-10',
                'import' => 307.5,
                'owner' => 'BCVCVCVCV',
                'status_id' => 1,
                'created_at' => '2021-05-10 22:59:11',
                'updated_at' => '2021-05-10 22:59:11',
                'invoice_id' => NULL,
                'bank_id' => 34,
                'receipt_id_cancelation' => NULL,
            ),
        ));
        
        
    }
}