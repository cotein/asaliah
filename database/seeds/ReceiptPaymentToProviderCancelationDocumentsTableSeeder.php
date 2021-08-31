<?php

use Illuminate\Database\Seeder;

class ReceiptPaymentToProviderCancelationDocumentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('receipt_payment_to_provider_cancelation_documents')->delete();
        
        
        
    }
}