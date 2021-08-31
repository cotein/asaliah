<?php

use Illuminate\Database\Seeder;

class RemitosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('remitos')->delete();
        
        \DB::table('remitos')->insert(array (
            0 => 
            array (
                'id' => 2,
                'created_at' => '2021-06-07 15:31:32',
                'updated_at' => '2021-06-07 15:31:32',
                'code' => 'PD-2021-5-4-1-232',
                'number' => NULL,
                'delivery_address' => 'FISCAL - www - MOREA - 6507 - Buenos Aires - AGENTINA',
                'delivery_date' => '2021-06-07',
                'geocoder' => NULL,
                'total' => 0.0,
                'status_id' => 6,
                'user_id' => 1,
                'pedido_cliente_id' => 232,
                'commercial_reference' => NULL,
                'payment_type_id' => 1,
                'sale_invoice_id' => NULL,
            ),
            1 => 
            array (
                'id' => 3,
                'created_at' => '2021-06-07 15:33:04',
                'updated_at' => '2021-06-07 15:33:04',
                'code' => 'PD-2021-5-24-1-196',
                'number' => NULL,
                'delivery_address' => 'FISCAL - www - MOREA - 6507 - Buenos Aires - AGENTINA',
                'delivery_date' => '2021-06-07',
                'geocoder' => NULL,
                'total' => 0.0,
                'status_id' => 6,
                'user_id' => 1,
                'pedido_cliente_id' => 196,
                'commercial_reference' => '999999999999',
                'payment_type_id' => 1,
                'sale_invoice_id' => NULL,
            ),
            2 => 
            array (
                'id' => 4,
                'created_at' => '2021-06-08 18:03:26',
                'updated_at' => '2021-06-08 18:03:26',
                'code' => 'PD-20210608-28-257',
                'number' => NULL,
                'delivery_address' => 'FISCAL - PEDRO MORAN 1264 - FLORENCIO VARELA - 1888 - Buenos Aires - AGENTINA',
                'delivery_date' => '2021-06-08',
                'geocoder' => NULL,
                'total' => 0.0,
                'status_id' => 6,
                'user_id' => 1,
                'pedido_cliente_id' => 257,
                'commercial_reference' => NULL,
                'payment_type_id' => 1,
                'sale_invoice_id' => NULL,
            ),
            3 => 
            array (
                'id' => 5,
                'created_at' => '2021-06-08 18:44:32',
                'updated_at' => '2021-06-08 18:44:32',
                'code' => 'PD-2021-5-10-1-256',
                'number' => NULL,
                'delivery_address' => 'FISCAL - www - MOREA - 6507 - Buenos Aires - AGENTINA',
                'delivery_date' => '2021-06-08',
                'geocoder' => NULL,
                'total' => 0.0,
                'status_id' => 6,
                'user_id' => 1,
                'pedido_cliente_id' => 256,
                'commercial_reference' => NULL,
                'payment_type_id' => 1,
                'sale_invoice_id' => NULL,
            ),
        ));
        
        
    }
}