<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => 'CHP',
                'parent_id' => 0,
                'name' => 'Chapas',
                'slug' => 'chapas',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:55',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            1 => 
            array (
                'id' => 2,
                'code' => 'PYT',
                'parent_id' => 0,
                'name' => 'Perfiles y Tubos',
                'slug' => 'perfiles-y-tubos',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:55',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            2 => 
            array (
                'id' => 3,
                'code' => 'MDC',
                'parent_id' => 0,
                'name' => 'Materiales de construcción',
                'slug' => 'materiales-de-construccion',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:55',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            3 => 
            array (
                'id' => 4,
                'code' => 'MYH',
                'parent_id' => 0,
                'name' => 'Máquinas y Herramientas',
                'slug' => 'maquinas-y-herramientas',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:55',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            4 => 
            array (
                'id' => 5,
                'code' => 'AST',
                'parent_id' => 0,
                'name' => 'Aislantes',
                'slug' => 'aislantes',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:55',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            5 => 
            array (
                'id' => 6,
                'code' => 'ZGS',
                'parent_id' => 0,
                'name' => 'Zinguerías',
                'slug' => 'zinguerias',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:55',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            6 => 
            array (
                'id' => 7,
                'code' => 'HYA',
                'parent_id' => 0,
                'name' => 'Herrajes y Accesorios',
                'slug' => 'herrajes-y-accesorios',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            7 => 
            array (
                'id' => 8,
                'code' => 'CHP-SDS',
                'parent_id' => 1,
                'name' => 'Sinusoidales',
                'slug' => 'sinusoidales',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            8 => 
            array (
                'id' => 9,
                'code' => 'CHP-TPZ',
                'parent_id' => 1,
                'name' => 'Trapezoides',
                'slug' => 'trapezoides',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            9 => 
            array (
                'id' => 10,
                'code' => 'CHP-SDS-CNM',
                'parent_id' => 8,
                'name' => 'Cincalum',
                'slug' => 'cincalum',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            10 => 
            array (
                'id' => 11,
                'code' => 'CHP-SDS-GVS',
                'parent_id' => 8,
                'name' => 'Galvanizadas',
                'slug' => 'galvanizadas',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            11 => 
            array (
                'id' => 12,
                'code' => 'CHP-SDS-PTS',
                'parent_id' => 8,
                'name' => 'Plásticas',
                'slug' => 'plasticas',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            12 => 
            array (
                'id' => 13,
                'code' => 'CHP-TPZ-T101',
                'parent_id' => 9,
                'name' => 'T-101',
                'slug' => 't-101',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            13 => 
            array (
                'id' => 14,
                'code' => 'CHP-TPZ-CNM',
                'parent_id' => 9,
                'name' => 'Cincalum',
                'slug' => 'cincalum',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            14 => 
            array (
                'id' => 15,
                'code' => 'CHP-TPZ-GVD',
                'parent_id' => 9,
                'name' => 'Galvanizadas',
                'slug' => 'galvanizadas',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            15 => 
            array (
                'id' => 16,
                'code' => 'CHP-TPZ-PTS',
                'parent_id' => 9,
                'name' => 'Plásticas',
                'slug' => 'plasticas',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            16 => 
            array (
                'id' => 17,
                'code' => 'PYT-EST',
                'parent_id' => 2,
                'name' => 'Estructurales',
                'slug' => 'estructurales',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            17 => 
            array (
                'id' => 18,
                'code' => 'PYT-SCYR',
                'parent_id' => 2,
                'name' => 'De sección cuadrada y rectangular',
                'slug' => 'de-seccion-cuadrada-y-rectangular',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            18 => 
            array (
                'id' => 19,
                'code' => 'PYT-SR',
                'parent_id' => 2,
                'name' => 'De sección redonda',
                'slug' => 'de-seccion-redonda',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            19 => 
            array (
                'id' => 20,
                'code' => 'MDC-CAL',
                'parent_id' => 3,
                'name' => 'Cal',
                'slug' => 'cal',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            20 => 
            array (
                'id' => 21,
                'code' => 'MDC-CMT',
                'parent_id' => 3,
                'name' => 'Cemento',
                'slug' => 'cemento',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            21 => 
            array (
                'id' => 22,
                'code' => 'MDC-ARN',
                'parent_id' => 3,
                'name' => 'Arena',
                'slug' => 'arena',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            22 => 
            array (
                'id' => 23,
                'code' => 'MDC-PDR',
                'parent_id' => 3,
                'name' => 'Piedra',
                'slug' => 'piedra',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            23 => 
            array (
                'id' => 24,
                'code' => 'MDC-ADH',
                'parent_id' => 3,
                'name' => 'Adhesivos',
                'slug' => 'adhesivos',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            24 => 
            array (
                'id' => 25,
                'code' => 'MDC-ADT',
                'parent_id' => 3,
                'name' => 'Aditivos',
                'slug' => 'aditivos',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            25 => 
            array (
                'id' => 26,
                'code' => 'MDC-SLL',
                'parent_id' => 3,
                'name' => 'Selladores',
                'slug' => 'selladores',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            26 => 
            array (
                'id' => 27,
                'code' => 'MDC-SLL',
                'parent_id' => 3,
                'name' => 'Selladores',
                'slug' => 'selladores',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            27 => 
            array (
                'id' => 28,
                'code' => 'MDC-HYD',
                'parent_id' => 3,
                'name' => 'Hidrófugos',
                'slug' => 'hidrofugos',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            28 => 
            array (
                'id' => 29,
                'code' => 'MYH-AML',
                'parent_id' => 4,
                'name' => 'Amoladoras',
                'slug' => 'amoladoras',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            29 => 
            array (
                'id' => 30,
                'code' => 'MYH-SLD',
                'parent_id' => 4,
                'name' => 'Soldadoras',
                'slug' => 'soldadoras',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            30 => 
            array (
                'id' => 31,
                'code' => 'MYH-AGJ',
                'parent_id' => 4,
                'name' => 'Agujereadoras',
                'slug' => 'agujereadoras',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            31 => 
            array (
                'id' => 32,
                'code' => 'MYH-ATR',
                'parent_id' => 4,
                'name' => 'Atornilladores',
                'slug' => 'atornilladores',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            32 => 
            array (
                'id' => 33,
                'code' => 'MYH-PUL',
                'parent_id' => 4,
                'name' => 'Pulidoras',
                'slug' => 'pulidoras',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            33 => 
            array (
                'id' => 34,
                'code' => 'MYH-PUL',
                'parent_id' => 4,
                'name' => 'Pulidoras',
                'slug' => 'pulidoras',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            34 => 
            array (
                'id' => 35,
                'code' => 'OTR',
                'parent_id' => 0,
                'name' => 'Otras',
                'slug' => 'otras',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            35 => 
            array (
                'id' => 36,
                'code' => 'OTR-FEI',
                'parent_id' => 35,
                'name' => 'Ferretería e insumos',
                'slug' => 'ferreteria-e-insumos',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            36 => 
            array (
                'id' => 37,
                'code' => 'FEI-CLV',
                'parent_id' => 36,
                'name' => 'Clavos',
                'slug' => 'clavos',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            37 => 
            array (
                'id' => 38,
                'code' => 'FEI-DDC',
                'parent_id' => 36,
                'name' => 'Disco de corte',
                'slug' => 'disco-de-corte',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            38 => 
            array (
                'id' => 39,
                'code' => 'FEI-MCH',
                'parent_id' => 36,
                'name' => 'Mechas',
                'slug' => 'mechas',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            39 => 
            array (
                'id' => 40,
                'code' => 'FEI-CDC',
                'parent_id' => 36,
                'name' => 'Cortador de Cerámicos',
                'slug' => 'cortador-de-ceramicos',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            40 => 
            array (
                'id' => 41,
                'code' => 'FEI-CDA',
                'parent_id' => 36,
                'name' => 'Cucharas de albanil',
                'slug' => 'cucharas-de-albanil',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            41 => 
            array (
                'id' => 42,
                'code' => 'FEI-BDA',
                'parent_id' => 36,
                'name' => 'Balde de albanil',
                'slug' => 'balde-de-albanil',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            42 => 
            array (
                'id' => 43,
                'code' => 'FEI-NVL',
                'parent_id' => 36,
                'name' => 'Niveles',
                'slug' => 'niveles',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            43 => 
            array (
                'id' => 44,
                'code' => 'FEI-CTM',
                'parent_id' => 36,
                'name' => 'Cinta métrica',
                'slug' => 'cinta-metrica',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            44 => 
            array (
                'id' => 45,
                'code' => 'AIS-PRT',
                'parent_id' => 5,
                'name' => 'Ailantes para techo',
                'slug' => 'ailantes-para-techo',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            45 => 
            array (
                'id' => 46,
                'code' => 'ZGS-CNT',
                'parent_id' => 6,
                'name' => 'Canaletas',
                'slug' => 'canaletas',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            46 => 
            array (
                'id' => 47,
                'code' => 'ZGS-BQT',
                'parent_id' => 6,
                'name' => 'Boquitas',
                'slug' => 'boquitas',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            47 => 
            array (
                'id' => 48,
                'code' => 'ZGS-CDD',
                'parent_id' => 6,
                'name' => 'Caños de descarga',
                'slug' => 'canos-de-descarga',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            48 => 
            array (
                'id' => 49,
                'code' => 'ZGS-ACC',
                'parent_id' => 6,
                'name' => 'Accesorios',
                'slug' => 'accesorios',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            49 => 
            array (
                'id' => 50,
                'code' => 'HYA-BSG',
                'parent_id' => 7,
                'name' => 'Bisagras',
                'slug' => 'bisagras',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            50 => 
            array (
                'id' => 51,
                'code' => 'HYA-CND',
                'parent_id' => 7,
                'name' => 'Candados',
                'slug' => 'candados',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            51 => 
            array (
                'id' => 52,
                'code' => 'HYA-CRR',
                'parent_id' => 7,
                'name' => 'Cerraduras',
                'slug' => 'cerraduras',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            52 => 
            array (
                'id' => 53,
                'code' => 'HYA-RPP',
                'parent_id' => 7,
                'name' => 'Ruedas para portón corredizo',
                'slug' => 'ruedas-para-porton-corredizo',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            53 => 
            array (
                'id' => 54,
                'code' => 'HYA-PPR',
                'parent_id' => 7,
                'name' => 'Pinches para rejas',
                'slug' => 'pinches-para-rejas',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            54 => 
            array (
                'id' => 55,
                'code' => 'HYA-DPR',
                'parent_id' => 7,
                'name' => 'Decorado para rejas',
                'slug' => 'decorado-para-rejas',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            55 => 
            array (
                'id' => 56,
                'code' => 'HYA-CDB',
                'parent_id' => 7,
                'name' => 'Canasto depósito de basura',
                'slug' => 'canasto-deposito-de-basura',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            56 => 
            array (
                'id' => 57,
                'code' => 'OTR-EPP',
                'parent_id' => 35,
                'name' => 'Elementos de protección personal',
                'slug' => 'elementos-de-proteccion-personal',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            57 => 
            array (
                'id' => 58,
                'code' => 'OTR-EPP-ZPT',
                'parent_id' => 57,
                'name' => 'Zapatos',
                'slug' => 'zapatos',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            58 => 
            array (
                'id' => 59,
                'code' => 'OTR-EPP-ATP',
                'parent_id' => 57,
                'name' => 'Antiparras',
                'slug' => 'antiparras',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            59 => 
            array (
                'id' => 60,
                'code' => 'OTR-EPP-CDS',
                'parent_id' => 57,
                'name' => 'Caretas de soldar',
                'slug' => 'caretas-de-soldar',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            60 => 
            array (
                'id' => 61,
                'code' => 'OTR-EPP-ROP',
                'parent_id' => 57,
                'name' => 'Ropa',
                'slug' => 'ropa',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            61 => 
            array (
                'id' => 62,
                'code' => 'OTR-EPP-FJL',
                'parent_id' => 57,
                'name' => 'Fajas lumbares',
                'slug' => 'fajas-lumbares',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            62 => 
            array (
                'id' => 63,
                'code' => 'OTR-EPP-ARS',
                'parent_id' => 57,
                'name' => 'Arneses',
                'slug' => 'arneses',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            63 => 
            array (
                'id' => 64,
                'code' => 'OTR-EPP-SLT',
                'parent_id' => 57,
                'name' => 'Silletas',
                'slug' => 'silletas',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            64 => 
            array (
                'id' => 65,
                'code' => 'OTR-EPP-GDA',
                'parent_id' => 57,
                'name' => 'Grilletes de amarre',
                'slug' => 'grilletes-de-amarre',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            65 => 
            array (
                'id' => 66,
                'code' => 'OTR-EPP-ELG',
                'parent_id' => 57,
                'name' => 'Eslingas',
                'slug' => 'eslingas',
                'deleted_at' => NULL,
                'created_at' => '2021-06-29 16:34:56',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            66 => 
            array (
                'id' => 67,
                'code' => NULL,
                'parent_id' => 1,
                'name' => 'qqqqqqqqq',
                'slug' => 'qqqqqqqqq',
                'deleted_at' => NULL,
                'created_at' => '2021-07-02 20:56:26',
                'updated_at' => '2021-07-02 20:56:26',
            ),
            67 => 
            array (
                'id' => 68,
                'code' => NULL,
                'parent_id' => 30,
                'name' => 'Barrueta',
                'slug' => 'barrueta',
                'deleted_at' => NULL,
                'created_at' => '2021-07-02 20:59:28',
                'updated_at' => '2021-07-02 20:59:28',
            ),
            68 => 
            array (
                'id' => 69,
                'code' => NULL,
                'parent_id' => 30,
                'name' => 'Barrueta',
                'slug' => 'barrueta',
                'deleted_at' => NULL,
                'created_at' => '2021-07-02 21:00:02',
                'updated_at' => '2021-07-02 21:00:02',
            ),
            69 => 
            array (
                'id' => 70,
                'code' => NULL,
                'parent_id' => 68,
                'name' => 'aaaaaa',
                'slug' => 'aaaaaa',
                'deleted_at' => NULL,
                'created_at' => '2021-07-02 21:00:53',
                'updated_at' => '2021-07-02 21:00:53',
            ),
            70 => 
            array (
                'id' => 71,
                'code' => NULL,
                'parent_id' => 1,
                'name' => 'Diego',
                'slug' => 'diego',
                'deleted_at' => NULL,
                'created_at' => '2021-07-02 21:02:56',
                'updated_at' => '2021-07-02 21:02:56',
            ),
            71 => 
            array (
                'id' => 72,
                'code' => NULL,
                'parent_id' => 35,
                'name' => 'aaaa',
                'slug' => 'aaaa',
                'deleted_at' => NULL,
                'created_at' => '2021-07-02 21:03:09',
                'updated_at' => '2021-07-02 21:03:09',
            ),
            72 => 
            array (
                'id' => 73,
                'code' => NULL,
                'parent_id' => 1,
                'name' => 'uuuuuu',
                'slug' => 'uuuuuu',
                'deleted_at' => NULL,
                'created_at' => '2021-07-03 14:54:51',
                'updated_at' => '2021-07-03 14:54:51',
            ),
            73 => 
            array (
                'id' => 74,
                'code' => NULL,
                'parent_id' => NULL,
                'name' => 'hierros',
                'slug' => 'hierros',
                'deleted_at' => NULL,
                'created_at' => '2021-07-08 17:37:30',
                'updated_at' => '2021-07-08 17:37:30',
            ),
        ));
        
        
    }
}