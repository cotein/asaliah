<?php

use Illuminate\Database\Seeder;

class PurchaserDocumentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('purchaser_documents')->delete();
        
        \DB::table('purchaser_documents')->insert(array (
            0 => 
            array (
                'id' => 1,
                'afip_code' => '0',
                'name' => 'CI Policía Federal',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'afip_code' => '1',
                'name' => 'CI Buenos Aires',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'afip_code' => '2',
                'name' => 'CI Catamarca',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'afip_code' => '3',
                'name' => 'CI Córdoba',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'afip_code' => '4',
                'name' => 'CI Corrientes',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'afip_code' => '5',
                'name' => 'CI Entre Ríos',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'afip_code' => '6',
                'name' => 'CI Jujuy',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'afip_code' => '7',
                'name' => 'CI Mendoza',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'afip_code' => '8',
                'name' => 'CI La Rioja',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'afip_code' => '9',
                'name' => 'CI Salta',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'afip_code' => '10',
                'name' => 'CI San Juan',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'afip_code' => '11',
                'name' => 'CI San Luis',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'afip_code' => '12',
                'name' => 'CI Santa Fe',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'afip_code' => '13',
                'name' => 'CI Santiago del Estero',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'afip_code' => '14',
                'name' => 'CI Tucumán',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'afip_code' => '16',
                'name' => 'CI Chaco',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'afip_code' => '17',
                'name' => 'CI Chubut',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'afip_code' => '18',
                'name' => 'CI Formosa',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'afip_code' => '19',
                'name' => 'CI Misiones',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'afip_code' => '20',
                'name' => 'CI Neuquén',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'afip_code' => '21',
                'name' => 'CI La Pampa',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'afip_code' => '22',
                'name' => 'CI Río Negro',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'afip_code' => '23',
                'name' => 'CI Santa Cruz',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'afip_code' => '24',
                'name' => 'CI Tierra del Fuego',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'afip_code' => '80',
                'name' => 'CUIT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'afip_code' => '86',
                'name' => 'CUIL',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'afip_code' => '87',
                'name' => 'CDI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'afip_code' => '89',
                'name' => 'LE',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'afip_code' => '90',
                'name' => 'LC',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'afip_code' => '91',
                'name' => 'CI extranjera',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'afip_code' => '92',
                'name' => 'en trámite',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'afip_code' => '93',
                'name' => 'Acta nacimiento',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'afip_code' => '94',
                'name' => 'Pasaporte',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'afip_code' => '95',
                'name' => 'CI Bs. As. RNP',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'afip_code' => '96',
                'name' => 'DNI',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'afip_code' => '99',
                'name' => 'Sin identificar/venta global diaria',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'afip_code' => '30',
                'name' => 'Certificado de Migración',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'afip_code' => '88',
                'name' => 'Usado por Anses para Padrón',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}