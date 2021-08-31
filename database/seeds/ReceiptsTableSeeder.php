<?php

use Illuminate\Database\Seeder;

class ReceiptsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('receipts')->delete();
        
        \DB::table('receipts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'number' => 1,
                'customer_id' => 1,
                'status_id' => 19,
                'created_at' => '2021-05-10 22:59:11',
                'updated_at' => '2021-05-10 22:59:11',
                'date' => '2021-05-18',
                'total_invoices_import' => 307.5,
                'cancelation_documents_import' => 307.5,
                'diff_import' => 0.0,
            ),
        ));
        
        
    }
}