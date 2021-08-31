<?php

use Illuminate\Database\Seeder;

class DailyMovementsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('daily_movements')->delete();
        
        \DB::table('daily_movements')->insert(array (
            0 => 
            array (
                'id' => 17,
                'number' => 1,
                'accounting_year_id' => 1,
                'status_id' => 1,
                'created_at' => '2021-06-03 16:31:42',
                'updated_at' => '2021-06-03 16:31:42',
                'type_movement_id' => 2,
                'name' => 'FACTURAS B 00006 - 00000315',
                'daily_movementable_id' => 127,
                'daily_movementable_type' => 'App\\Src\\Models\\SaleInvoice',
            ),
            1 => 
            array (
                'id' => 18,
                'number' => 1,
                'accounting_year_id' => 1,
                'status_id' => 1,
                'created_at' => '2021-06-03 16:34:53',
                'updated_at' => '2021-06-03 16:34:53',
                'type_movement_id' => 2,
                'name' => 'FACTURAS A 00006 - 00000308',
                'daily_movementable_id' => 128,
                'daily_movementable_type' => 'App\\Src\\Models\\SaleInvoice',
            ),
            2 => 
            array (
                'id' => 20,
                'number' => 1,
                'accounting_year_id' => 1,
                'status_id' => 1,
                'created_at' => '2021-06-03 16:50:17',
                'updated_at' => '2021-06-03 16:50:17',
                'type_movement_id' => 2,
                'name' => 'FACTURAS A 00006 - 00000310',
                'daily_movementable_id' => 130,
                'daily_movementable_type' => 'App\\Src\\Models\\SaleInvoice',
            ),
            3 => 
            array (
                'id' => 21,
                'number' => 1,
                'accounting_year_id' => 1,
                'status_id' => 1,
                'created_at' => '2021-06-03 16:53:40',
                'updated_at' => '2021-06-03 16:53:40',
                'type_movement_id' => 2,
                'name' => 'NOTAS DE CREDITO A 00006 - 00000068',
                'daily_movementable_id' => 131,
                'daily_movementable_type' => 'App\\Src\\Models\\SaleInvoice',
            ),
            4 => 
            array (
                'id' => 22,
                'number' => 1,
                'accounting_year_id' => 1,
                'status_id' => 1,
                'created_at' => '2021-06-04 02:45:45',
                'updated_at' => '2021-06-04 02:45:45',
                'type_movement_id' => 2,
                'name' => 'FACTURAS B 00006 - 00000316',
                'daily_movementable_id' => 132,
                'daily_movementable_type' => 'App\\Src\\Models\\SaleInvoice',
            ),
            5 => 
            array (
                'id' => 23,
                'number' => 1,
                'accounting_year_id' => 1,
                'status_id' => 1,
                'created_at' => '2021-06-04 17:25:45',
                'updated_at' => '2021-06-04 17:25:45',
                'type_movement_id' => 2,
                'name' => 'NOTAS DE CREDITO B 00006 - 00000045',
                'daily_movementable_id' => 133,
                'daily_movementable_type' => 'App\\Src\\Models\\SaleInvoice',
            ),
            6 => 
            array (
                'id' => 24,
                'number' => 1,
                'accounting_year_id' => 1,
                'status_id' => 1,
                'created_at' => '2021-06-04 17:30:49',
                'updated_at' => '2021-06-04 17:30:49',
                'type_movement_id' => 2,
                'name' => 'NOTAS DE CREDITO B 00006 - 00000046 - BARRUETA DIEGO ADRIAN | Test Test',
                'daily_movementable_id' => 134,
                'daily_movementable_type' => 'App\\Src\\Models\\SaleInvoice',
            ),
            7 => 
            array (
                'id' => 25,
                'number' => 1,
                'accounting_year_id' => 1,
                'status_id' => 1,
                'created_at' => '2021-06-04 18:47:17',
                'updated_at' => '2021-06-04 18:47:17',
                'type_movement_id' => 2,
                'name' => 'FACTURAS B 00006 - 00000317 - BARRUETA DIEGO ADRIAN | Test Test',
                'daily_movementable_id' => 135,
                'daily_movementable_type' => 'App\\Src\\Models\\SaleInvoice',
            ),
            8 => 
            array (
                'id' => 26,
                'number' => 1,
                'accounting_year_id' => 1,
                'status_id' => 1,
                'created_at' => '2021-06-08 18:41:27',
                'updated_at' => '2021-06-08 18:41:27',
                'type_movement_id' => 2,
                'name' => 'FACTURAS B 00006 - 00000318 - MONZON ANDREA VANESA',
                'daily_movementable_id' => 136,
                'daily_movementable_type' => 'App\\Src\\Models\\SaleInvoice',
            ),
            9 => 
            array (
                'id' => 27,
                'number' => 1,
                'accounting_year_id' => 1,
                'status_id' => 1,
                'created_at' => '2021-06-08 18:44:45',
                'updated_at' => '2021-06-08 18:44:45',
                'type_movement_id' => 2,
                'name' => 'FACTURAS B 00006 - 00000319 - BARRUETA DIEGO ADRIAN | Test Test',
                'daily_movementable_id' => 137,
                'daily_movementable_type' => 'App\\Src\\Models\\SaleInvoice',
            ),
        ));
        
        
    }
}