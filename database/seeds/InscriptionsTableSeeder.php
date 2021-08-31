<?php

use Illuminate\Database\Seeder;

class InscriptionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('inscriptions')->delete();
        
        \DB::table('inscriptions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'IVA Responsable Inscripto',
                'short' => 'IRI',
                'created_at' => '2021-04-03 12:02:54',
                'updated_at' => '2021-04-03 12:02:54',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'IVA Responsable no Inscripto',
                'short' => 'IRNI',
                'created_at' => '2021-04-03 12:02:54',
                'updated_at' => '2021-04-03 12:02:54',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'IVA no Responsable',
                'short' => 'INR',
                'created_at' => '2021-04-03 12:02:54',
                'updated_at' => '2021-04-03 12:02:54',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'IVA Sujeto Exento',
                'short' => 'ISE',
                'created_at' => '2021-04-03 12:02:54',
                'updated_at' => '2021-04-03 12:02:54',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Consumidor Final',
                'short' => 'CF',
                'created_at' => '2021-04-03 12:02:54',
                'updated_at' => '2021-04-03 12:02:54',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Responsable Monotributo',
                'short' => 'M',
                'created_at' => '2021-04-03 12:02:54',
                'updated_at' => '2021-04-03 12:02:54',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Sujeto no Categorizado',
                'short' => 'SNC',
                'created_at' => '2021-04-03 12:02:54',
                'updated_at' => '2021-04-03 12:02:54',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Proveedor del Exterior',
                'short' => 'PE',
                'created_at' => '2021-04-03 12:02:54',
                'updated_at' => '2021-04-03 12:02:54',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Cliente del Exterior',
                'short' => 'CE',
                'created_at' => '2021-04-03 12:02:54',
                'updated_at' => '2021-04-03 12:02:54',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'IVA Liberado – Ley Nº 19.640',
                'short' => 'IL',
                'created_at' => '2021-04-03 12:02:54',
                'updated_at' => '2021-04-03 12:02:54',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'IVA Responsable Inscripto – Agente de Percepción',
                'short' => 'IRI Perc.',
                'created_at' => '2021-04-03 12:02:54',
                'updated_at' => '2021-04-03 12:02:54',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Pequeño Contribuyente Eventual',
                'short' => 'PCE',
                'created_at' => '2021-04-03 12:02:54',
                'updated_at' => '2021-04-03 12:02:54',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Monotributista Social',
                'short' => 'MS',
                'created_at' => '2021-04-03 12:02:54',
                'updated_at' => '2021-04-03 12:02:54',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Pequeño Contribuyente Eventual Social',
                'short' => 'PCES',
                'created_at' => '2021-04-03 12:02:54',
                'updated_at' => '2021-04-03 12:02:54',
            ),
        ));
        
        
    }
}