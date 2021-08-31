<?php

use Illuminate\Database\Seeder;

class ReceiptInvoicesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('receipt_invoices')->delete();
        
        \DB::table('receipt_invoices')->insert(array (
            0 => 
            array (
                'id' => 1,
                'receipt_id' => 1,
                'invoice_id' => 7,
                'created_at' => '2021-05-10 22:59:11',
                'updated_at' => '2021-05-10 22:59:11',
                'total_invoice' => 0.0,
                'payment' => 0.0,
                'debt' => 0.0,
            ),
        ));
        
        
    }
}