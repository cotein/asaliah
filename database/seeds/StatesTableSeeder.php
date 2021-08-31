<?php

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('states')->delete();
        
        \DB::table('states')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'CABA',
                'afip_code' => 0,
                'codigo31662' => 'AR-C',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Buenos Aires',
                'afip_code' => 1,
                'codigo31662' => 'AR-B',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Catamarca',
                'afip_code' => 2,
                'codigo31662' => 'AR-K',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Córdoba',
                'afip_code' => 3,
                'codigo31662' => 'AR-X',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Corrientes',
                'afip_code' => 4,
                'codigo31662' => 'AR-W',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Entre Ríos',
                'afip_code' => 5,
                'codigo31662' => 'AR-E',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Jujuy',
                'afip_code' => 6,
                'codigo31662' => 'AR-Y',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Mendoza',
                'afip_code' => 7,
                'codigo31662' => 'AR-M',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'La Rioja',
                'afip_code' => 8,
                'codigo31662' => 'AR-F',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Salta',
                'afip_code' => 9,
                'codigo31662' => 'AR-A',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'San Juan',
                'afip_code' => 10,
                'codigo31662' => 'AR-J',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'San Luis',
                'afip_code' => 11,
                'codigo31662' => 'AR-D',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Santa Fe',
                'afip_code' => 12,
                'codigo31662' => 'AR-S',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Santiago del Estero',
                'afip_code' => 13,
                'codigo31662' => 'AR-G',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Tucumán',
                'afip_code' => 14,
                'codigo31662' => 'AR-T',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Chaco',
                'afip_code' => 16,
                'codigo31662' => 'AR-H',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Chubut',
                'afip_code' => 17,
                'codigo31662' => 'AR-U',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Formosa',
                'afip_code' => 18,
                'codigo31662' => 'AR-P',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Misiones',
                'afip_code' => 19,
                'codigo31662' => 'AR-N',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Neuquén',
                'afip_code' => 20,
                'codigo31662' => 'AR-Q',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'La Pampa',
                'afip_code' => 21,
                'codigo31662' => 'AR-L',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Río Negro',
                'afip_code' => 22,
                'codigo31662' => 'AR-R',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Santa Cruz',
                'afip_code' => 23,
                'codigo31662' => 'AR-Z',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Tierra del Fuego',
                'afip_code' => 24,
                'codigo31662' => 'AR-V',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'CABA',
                'afip_code' => 0,
                'codigo31662' => 'AR-C',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Buenos Aires',
                'afip_code' => 1,
                'codigo31662' => 'AR-B',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Catamarca',
                'afip_code' => 2,
                'codigo31662' => 'AR-K',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Córdoba',
                'afip_code' => 3,
                'codigo31662' => 'AR-X',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'Corrientes',
                'afip_code' => 4,
                'codigo31662' => 'AR-W',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'Entre Ríos',
                'afip_code' => 5,
                'codigo31662' => 'AR-E',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'Jujuy',
                'afip_code' => 6,
                'codigo31662' => 'AR-Y',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'Mendoza',
                'afip_code' => 7,
                'codigo31662' => 'AR-M',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'La Rioja',
                'afip_code' => 8,
                'codigo31662' => 'AR-F',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'Salta',
                'afip_code' => 9,
                'codigo31662' => 'AR-A',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'San Juan',
                'afip_code' => 10,
                'codigo31662' => 'AR-J',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'San Luis',
                'afip_code' => 11,
                'codigo31662' => 'AR-D',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'Santa Fe',
                'afip_code' => 12,
                'codigo31662' => 'AR-S',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'Santiago del Estero',
                'afip_code' => 13,
                'codigo31662' => 'AR-G',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'Tucumán',
                'afip_code' => 14,
                'codigo31662' => 'AR-T',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'Chaco',
                'afip_code' => 16,
                'codigo31662' => 'AR-H',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'Chubut',
                'afip_code' => 17,
                'codigo31662' => 'AR-U',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'Formosa',
                'afip_code' => 18,
                'codigo31662' => 'AR-P',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'Misiones',
                'afip_code' => 19,
                'codigo31662' => 'AR-N',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'Neuquén',
                'afip_code' => 20,
                'codigo31662' => 'AR-Q',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'La Pampa',
                'afip_code' => 21,
                'codigo31662' => 'AR-L',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'Río Negro',
                'afip_code' => 22,
                'codigo31662' => 'AR-R',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'Santa Cruz',
                'afip_code' => 23,
                'codigo31662' => 'AR-Z',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'Tierra del Fuego',
                'afip_code' => 24,
                'codigo31662' => 'AR-V',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}