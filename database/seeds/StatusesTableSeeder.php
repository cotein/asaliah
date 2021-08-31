<?php

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('statuses')->delete();
        
        \DB::table('statuses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'ACTIVO',
                'created_at' => '2020-09-07 16:12:20',
                'updated_at' => '2020-09-07 16:12:20',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'PUBLICADO',
                'created_at' => '2020-09-07 16:12:20',
                'updated_at' => '2020-09-07 16:12:20',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'PAUSADO',
                'created_at' => '2020-09-07 16:12:20',
                'updated_at' => '2020-09-07 16:12:20',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'REVISION',
                'created_at' => '2020-09-07 16:12:20',
                'updated_at' => '2020-09-07 16:12:20',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'NO PUBLICADO',
                'created_at' => '2020-09-07 16:12:20',
                'updated_at' => '2020-09-07 16:12:20',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'PENDIENTE',
                'created_at' => '2020-09-07 16:12:20',
                'updated_at' => '2020-09-07 16:12:20',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'ELIMINADO',
                'created_at' => '2020-09-07 16:12:20',
                'updated_at' => '2020-09-07 16:12:20',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'PRIMER CONTACTO',
                'created_at' => '2020-09-07 16:12:20',
                'updated_at' => '2020-09-07 16:12:20',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'LISTADO',
                'created_at' => '2020-09-07 16:12:20',
                'updated_at' => '2020-09-07 16:12:20',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'REMITIDO',
                'created_at' => '2020-09-07 16:12:20',
                'updated_at' => '2020-09-07 16:12:20',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'FACTURADO',
                'created_at' => '2020-09-07 16:12:20',
                'updated_at' => '2020-09-07 16:12:20',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'EN PRODUCCION',
                'created_at' => '2020-09-07 16:12:20',
                'updated_at' => '2020-09-07 16:12:20',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'EN STOCK',
                'created_at' => '2020-09-07 16:12:20',
                'updated_at' => '2020-09-07 16:12:20',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'CROSS OVER',
                'created_at' => '2020-09-07 16:12:20',
                'updated_at' => '2020-09-07 16:12:20',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'DESPACHADO',
                'created_at' => '2020-09-07 16:12:20',
                'updated_at' => '2020-09-07 16:12:20',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'ENTREGADO',
                'created_at' => '2020-09-07 16:12:20',
                'updated_at' => '2020-09-07 16:12:20',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'REPORTADO',
                'created_at' => '2020-09-07 16:12:20',
                'updated_at' => '2020-09-07 16:12:20',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'PAGADA',
                'created_at' => '2020-09-07 16:12:20',
                'updated_at' => '2020-09-07 16:12:20',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'CERRADO',
                'created_at' => '2020-09-07 16:12:20',
                'updated_at' => '2020-09-07 16:12:20',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'A PAGAR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'NOTIFICACION EN PROCESO',
                'created_at' => '2020-11-11 17:30:58',
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'NOTIFICACION LEIDA',
                'created_at' => '2020-11-11 17:32:15',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}