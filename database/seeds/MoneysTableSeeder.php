<?php

use Illuminate\Database\Seeder;

class MoneysTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('moneys')->delete();
        
        \DB::table('moneys')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => 'PES',
                'name' => 'PESOS',
                'symbol' => '$',
                'value' => '1',
                'description' => 'name',
                'created_at' => '2021-04-03 12:02:53',
                'updated_at' => '2021-04-03 12:02:53',
            ),
            1 => 
            array (
                'id' => 2,
                'code' => 'DOL',
                'name' => 'Dólar ESTADOUNIDENSE',
                'symbol' => 'U$S',
                'value' => '1',
                'description' => 'name',
                'created_at' => '2021-04-03 12:02:53',
                'updated_at' => '2021-04-03 12:02:53',
            ),
            2 => 
            array (
                'id' => 3,
                'code' => '002',
                'name' => 'Dólar EEUU LIBRE',
                'symbol' => '$',
                'value' => '1',
                'description' => 'name',
                'created_at' => '2021-04-03 12:02:53',
                'updated_at' => '2021-04-03 12:02:53',
            ),
            3 => 
            array (
                'id' => 4,
                'code' => '003',
                'name' => 'FRANCOS FRANCESES',
                'symbol' => '$',
                'value' => '1',
                'description' => 'name',
                'created_at' => '2021-04-03 12:02:53',
                'updated_at' => '2021-04-03 12:02:53',
            ),
            4 => 
            array (
                'id' => 5,
                'code' => '004',
                'name' => 'LIRAS ITALIANAS',
                'symbol' => '$',
                'value' => '1',
                'description' => 'name',
                'created_at' => '2021-04-03 12:02:53',
                'updated_at' => '2021-04-03 12:02:53',
            ),
            5 => 
            array (
                'id' => 6,
                'code' => '005',
                'name' => 'PESETAS',
                'symbol' => '$',
                'value' => '1',
                'description' => 'name',
                'created_at' => '2021-04-03 12:02:53',
                'updated_at' => '2021-04-03 12:02:53',
            ),
            6 => 
            array (
                'id' => 7,
                'code' => '006',
                'name' => 'MARCOS ALEMANES',
                'symbol' => '$',
                'value' => '1',
                'description' => 'name',
                'created_at' => '2021-04-03 12:02:53',
                'updated_at' => '2021-04-03 12:02:53',
            ),
            7 => 
            array (
                'id' => 8,
                'code' => '007',
                'name' => 'FLORINES HOLANDESES',
                'symbol' => '$',
                'value' => '1',
                'description' => 'name',
                'created_at' => '2021-04-03 12:02:53',
                'updated_at' => '2021-04-03 12:02:53',
            ),
            8 => 
            array (
                'id' => 9,
                'code' => '008',
                'name' => 'FRANCOS BELGAS',
                'symbol' => '$',
                'value' => '1',
                'description' => 'name',
                'created_at' => '2021-04-03 12:02:53',
                'updated_at' => '2021-04-03 12:02:53',
            ),
            9 => 
            array (
                'id' => 10,
                'code' => '009',
                'name' => 'FRANCOS SUIZOS',
                'symbol' => '$',
                'value' => '1',
                'description' => 'name',
                'created_at' => '2021-04-03 12:02:53',
                'updated_at' => '2021-04-03 12:02:53',
            ),
            10 => 
            array (
                'id' => 11,
                'code' => '010',
                'name' => 'PESOS MEJICANOS',
                'symbol' => '$',
                'value' => '1',
                'description' => 'name',
                'created_at' => '2021-04-03 12:02:53',
                'updated_at' => '2021-04-03 12:02:53',
            ),
            11 => 
            array (
                'id' => 12,
                'code' => '011',
                'name' => 'PESOS URUGUAYOS',
                'symbol' => '$',
                'value' => '1',
                'description' => 'name',
                'created_at' => '2021-04-03 12:02:53',
                'updated_at' => '2021-04-03 12:02:53',
            ),
            12 => 
            array (
                'id' => 13,
                'code' => '012',
                'name' => 'REAL',
                'symbol' => '$',
                'value' => '1',
                'description' => 'name',
                'created_at' => '2021-04-03 12:02:53',
                'updated_at' => '2021-04-03 12:02:53',
            ),
            13 => 
            array (
                'id' => 14,
                'code' => '013',
                'name' => 'ESCUDOS PORTUGUESES',
                'symbol' => '$',
                'value' => '1',
                'description' => 'name',
                'created_at' => '2021-04-03 12:02:53',
                'updated_at' => '2021-04-03 12:02:53',
            ),
            14 => 
            array (
                'id' => 15,
                'code' => '014',
                'name' => 'CORONAS DANESAS',
                'symbol' => '$',
                'value' => '1',
                'description' => 'name',
                'created_at' => '2021-04-03 12:02:53',
                'updated_at' => '2021-04-03 12:02:53',
            ),
            15 => 
            array (
                'id' => 16,
                'code' => '015',
                'name' => 'CORONAS NORUEGAS',
                'symbol' => '$',
                'value' => '1',
                'description' => 'name',
                'created_at' => '2021-04-03 12:02:53',
                'updated_at' => '2021-04-03 12:02:53',
            ),
            16 => 
            array (
                'id' => 17,
                'code' => '016',
                'name' => 'CORONAS SUECAS',
                'symbol' => '$',
                'value' => '1',
                'description' => 'name',
                'created_at' => '2021-04-03 12:02:53',
                'updated_at' => '2021-04-03 12:02:53',
            ),
            17 => 
            array (
                'id' => 18,
                'code' => '017',
                'name' => 'CHELINES AUTRIACOS',
                'symbol' => '$',
                'value' => '1',
                'description' => 'name',
                'created_at' => '2021-04-03 12:02:53',
                'updated_at' => '2021-04-03 12:02:53',
            ),
            18 => 
            array (
                'id' => 19,
                'code' => '018',
                'name' => 'Dólar CANADIENSE',
                'symbol' => '$',
                'value' => '1',
                'description' => 'name',
                'created_at' => '2021-04-03 12:02:53',
                'updated_at' => '2021-04-03 12:02:53',
            ),
            19 => 
            array (
                'id' => 20,
                'code' => '019',
                'name' => 'YENS',
                'symbol' => '$',
                'value' => '1',
                'description' => 'name',
                'created_at' => '2021-04-03 12:02:53',
                'updated_at' => '2021-04-03 12:02:53',
            ),
            20 => 
            array (
                'id' => 21,
                'code' => '021',
                'name' => 'LIBRA ESTERLINA',
                'symbol' => '$',
                'value' => '1',
                'description' => 'name',
                'created_at' => '2021-04-03 12:02:53',
                'updated_at' => '2021-04-03 12:02:53',
            ),
            21 => 
            array (
                'id' => 22,
                'code' => '022',
                'name' => 'MARCOS FINLANDESES',
                'symbol' => '$',
                'value' => '1',
                'description' => 'name',
                'created_at' => '2021-04-03 12:02:53',
                'updated_at' => '2021-04-03 12:02:53',
            ),
            22 => 
            array (
                'id' => 23,
                'code' => '023',
            'name' => 'BOLIVAR (VENEZOLANO)',
                'symbol' => '$',
                'value' => '1',
                'description' => 'name',
                'created_at' => '2021-04-03 12:02:53',
                'updated_at' => '2021-04-03 12:02:53',
            ),
            23 => 
            array (
                'id' => 24,
                'code' => '024',
                'name' => 'CORONA CHECA',
                'symbol' => '$',
                'value' => '1',
                'description' => 'name',
                'created_at' => '2021-04-03 12:02:53',
                'updated_at' => '2021-04-03 12:02:53',
            ),
            24 => 
            array (
                'id' => 25,
                'code' => '025',
            'name' => 'DINAR (YUGOSLAVO)',
                'symbol' => '$',
                'value' => '1',
                'description' => 'name',
                'created_at' => '2021-04-03 12:02:53',
                'updated_at' => '2021-04-03 12:02:53',
            ),
            25 => 
            array (
                'id' => 26,
                'code' => '026',
                'name' => 'Dólar AUSTRALIANO',
                'symbol' => '$',
                'value' => '1',
                'description' => 'name',
                'created_at' => '2021-04-03 12:02:53',
                'updated_at' => '2021-04-03 12:02:53',
            ),
            26 => 
            array (
                'id' => 27,
                'code' => '027',
            'name' => 'DRACMA (GRIEGO)',
                'symbol' => '$',
                'value' => '1',
                'description' => 'name',
                'created_at' => '2021-04-03 12:02:53',
                'updated_at' => '2021-04-03 12:02:53',
            ),
            27 => 
            array (
                'id' => 28,
                'code' => '028',
                'name' => 'FLORIN (ANTILLAS HOLA',
                    'symbol' => '$',
                    'value' => '1',
                    'description' => 'name',
                    'created_at' => '2021-04-03 12:02:53',
                    'updated_at' => '2021-04-03 12:02:53',
                ),
                28 => 
                array (
                    'id' => 29,
                    'code' => '029',
                    'name' => 'GUARANI',
                    'symbol' => '$',
                    'value' => '1',
                    'description' => 'name',
                    'created_at' => '2021-04-03 12:02:53',
                    'updated_at' => '2021-04-03 12:02:53',
                ),
                29 => 
                array (
                    'id' => 30,
                    'code' => '030',
                'name' => 'SHEKEL (ISRAEL)',
                    'symbol' => '$',
                    'value' => '1',
                    'description' => 'name',
                    'created_at' => '2021-04-03 12:02:53',
                    'updated_at' => '2021-04-03 12:02:53',
                ),
                30 => 
                array (
                    'id' => 31,
                    'code' => '031',
                    'name' => 'PESO BOLIVIANO',
                    'symbol' => '$',
                    'value' => '1',
                    'description' => 'name',
                    'created_at' => '2021-04-03 12:02:53',
                    'updated_at' => '2021-04-03 12:02:53',
                ),
                31 => 
                array (
                    'id' => 32,
                    'code' => '032',
                    'name' => 'PESO COLOMBIANO',
                    'symbol' => '$',
                    'value' => '1',
                    'description' => 'name',
                    'created_at' => '2021-04-03 12:02:53',
                    'updated_at' => '2021-04-03 12:02:53',
                ),
                32 => 
                array (
                    'id' => 33,
                    'code' => '033',
                    'name' => 'PESO CHILENO',
                    'symbol' => '$',
                    'value' => '1',
                    'description' => 'name',
                    'created_at' => '2021-04-03 12:02:53',
                    'updated_at' => '2021-04-03 12:02:53',
                ),
                33 => 
                array (
                    'id' => 34,
                    'code' => '034',
                'name' => 'RAND (SUDAFRICANO)',
                    'symbol' => '$',
                    'value' => '1',
                    'description' => 'name',
                    'created_at' => '2021-04-03 12:02:53',
                    'updated_at' => '2021-04-03 12:02:53',
                ),
                34 => 
                array (
                    'id' => 35,
                    'code' => '035',
                    'name' => 'NUEVO SOL PERUANO',
                    'symbol' => '$',
                    'value' => '1',
                    'description' => 'name',
                    'created_at' => '2021-04-03 12:02:53',
                    'updated_at' => '2021-04-03 12:02:53',
                ),
                35 => 
                array (
                    'id' => 36,
                    'code' => '036',
                'name' => 'SUCRE (ECUATORIANO)',
                    'symbol' => '$',
                    'value' => '1',
                    'description' => 'name',
                    'created_at' => '2021-04-03 12:02:53',
                    'updated_at' => '2021-04-03 12:02:53',
                ),
                36 => 
                array (
                    'id' => 37,
                    'code' => '040',
                    'name' => 'LEI RUMANOS',
                    'symbol' => '$',
                    'value' => '1',
                    'description' => 'name',
                    'created_at' => '2021-04-03 12:02:53',
                    'updated_at' => '2021-04-03 12:02:53',
                ),
                37 => 
                array (
                    'id' => 38,
                    'code' => '041',
                    'name' => 'DERECHOS ESPECIALES DE GIRO',
                    'symbol' => '$',
                    'value' => '1',
                    'description' => 'name',
                    'created_at' => '2021-04-03 12:02:53',
                    'updated_at' => '2021-04-03 12:02:53',
                ),
                38 => 
                array (
                    'id' => 39,
                    'code' => '042',
                    'name' => 'PESOS DOMINICANOS',
                    'symbol' => '$',
                    'value' => '1',
                    'description' => 'name',
                    'created_at' => '2021-04-03 12:02:53',
                    'updated_at' => '2021-04-03 12:02:53',
                ),
                39 => 
                array (
                    'id' => 40,
                    'code' => '043',
                    'name' => 'BALBOAS PANAMEÑAS',
                    'symbol' => '$',
                    'value' => '1',
                    'description' => 'name',
                    'created_at' => '2021-04-03 12:02:53',
                    'updated_at' => '2021-04-03 12:02:53',
                ),
                40 => 
                array (
                    'id' => 41,
                    'code' => '044',
                    'name' => 'CORDOBAS NICARAGÛENSES',
                    'symbol' => '$',
                    'value' => '1',
                    'description' => 'name',
                    'created_at' => '2021-04-03 12:02:53',
                    'updated_at' => '2021-04-03 12:02:53',
                ),
                41 => 
                array (
                    'id' => 42,
                    'code' => '045',
                    'name' => 'DIRHAM MARROQUÍES',
                    'symbol' => '$',
                    'value' => '1',
                    'description' => 'name',
                    'created_at' => '2021-04-03 12:02:53',
                    'updated_at' => '2021-04-03 12:02:53',
                ),
                42 => 
                array (
                    'id' => 43,
                    'code' => '046',
                    'name' => 'LIBRAS EGIPCIAS',
                    'symbol' => '$',
                    'value' => '1',
                    'description' => 'name',
                    'created_at' => '2021-04-03 12:02:53',
                    'updated_at' => '2021-04-03 12:02:53',
                ),
                43 => 
                array (
                    'id' => 44,
                    'code' => '047',
                    'name' => 'RIYALS SAUDITAS',
                    'symbol' => '$',
                    'value' => '1',
                    'description' => 'name',
                    'created_at' => '2021-04-03 12:02:53',
                    'updated_at' => '2021-04-03 12:02:53',
                ),
                44 => 
                array (
                    'id' => 45,
                    'code' => '048',
                    'name' => 'BRANCOS BELGAS FINANCIERAS',
                    'symbol' => '$',
                    'value' => '1',
                    'description' => 'name',
                    'created_at' => '2021-04-03 12:02:53',
                    'updated_at' => '2021-04-03 12:02:53',
                ),
                45 => 
                array (
                    'id' => 46,
                    'code' => '049',
                    'name' => 'GRAMOS DE ORO FINO',
                    'symbol' => '$',
                    'value' => '1',
                    'description' => 'name',
                    'created_at' => '2021-04-03 12:02:53',
                    'updated_at' => '2021-04-03 12:02:53',
                ),
                46 => 
                array (
                    'id' => 47,
                    'code' => '050',
                    'name' => 'LIBRAS IRLANDESAS',
                    'symbol' => '$',
                    'value' => '1',
                    'description' => 'name',
                    'created_at' => '2021-04-03 12:02:53',
                    'updated_at' => '2021-04-03 12:02:53',
                ),
                47 => 
                array (
                    'id' => 48,
                    'code' => '051',
                    'name' => 'Dólar DE HONG KONG',
                    'symbol' => '$',
                    'value' => '1',
                    'description' => 'name',
                    'created_at' => '2021-04-03 12:02:53',
                    'updated_at' => '2021-04-03 12:02:53',
                ),
                48 => 
                array (
                    'id' => 49,
                    'code' => '052',
                    'name' => 'Dólar DE SINGAPUR',
                    'symbol' => '$',
                    'value' => '1',
                    'description' => 'name',
                    'created_at' => '2021-04-03 12:02:53',
                    'updated_at' => '2021-04-03 12:02:53',
                ),
                49 => 
                array (
                    'id' => 50,
                    'code' => '053',
                    'name' => 'Dólar DE JAMAICA',
                    'symbol' => '$',
                    'value' => '1',
                    'description' => 'name',
                    'created_at' => '2021-04-03 12:02:53',
                    'updated_at' => '2021-04-03 12:02:53',
                ),
                50 => 
                array (
                    'id' => 51,
                    'code' => '054',
                    'name' => 'Dólar DE TAIWAN',
                    'symbol' => '$',
                    'value' => '1',
                    'description' => 'name',
                    'created_at' => '2021-04-03 12:02:53',
                    'updated_at' => '2021-04-03 12:02:53',
                ),
                51 => 
                array (
                    'id' => 52,
                    'code' => '055',
                'name' => 'QUETZAL (GUATEMALTECOS)',
                    'symbol' => '$',
                    'value' => '1',
                    'description' => 'name',
                    'created_at' => '2021-04-03 12:02:53',
                    'updated_at' => '2021-04-03 12:02:53',
                ),
                52 => 
                array (
                    'id' => 53,
                    'code' => '056',
                'name' => 'FORINT (HUNGRIA)',
                    'symbol' => '$',
                    'value' => '1',
                    'description' => 'name',
                    'created_at' => '2021-04-03 12:02:53',
                    'updated_at' => '2021-04-03 12:02:53',
                ),
                53 => 
                array (
                    'id' => 54,
                    'code' => '057',
                'name' => 'BAHT (TAILANDIA)',
                    'symbol' => '$',
                    'value' => '1',
                    'description' => 'name',
                    'created_at' => '2021-04-03 12:02:53',
                    'updated_at' => '2021-04-03 12:02:53',
                ),
                54 => 
                array (
                    'id' => 55,
                    'code' => '058',
                    'name' => 'ECU',
                    'symbol' => '$',
                    'value' => '1',
                    'description' => 'name',
                    'created_at' => '2021-04-03 12:02:53',
                    'updated_at' => '2021-04-03 12:02:53',
                ),
                55 => 
                array (
                    'id' => 56,
                    'code' => '059',
                    'name' => 'DINAR KUWAITI',
                    'symbol' => '$',
                    'value' => '1',
                    'description' => 'name',
                    'created_at' => '2021-04-03 12:02:53',
                    'updated_at' => '2021-04-03 12:02:53',
                ),
                56 => 
                array (
                    'id' => 57,
                    'code' => '060',
                    'name' => 'EURO',
                    'symbol' => '$',
                    'value' => '1',
                    'description' => 'name',
                    'created_at' => '2021-04-03 12:02:53',
                    'updated_at' => '2021-04-03 12:02:53',
                ),
                57 => 
                array (
                    'id' => 58,
                    'code' => '061',
                    'name' => 'ZLTYS POLACOS',
                    'symbol' => '$',
                    'value' => '1',
                    'description' => 'name',
                    'created_at' => '2021-04-03 12:02:53',
                    'updated_at' => '2021-04-03 12:02:53',
                ),
                58 => 
                array (
                    'id' => 59,
                    'code' => '062',
                    'name' => 'RUPIAS HINDÚES',
                    'symbol' => '$',
                    'value' => '1',
                    'description' => 'name',
                    'created_at' => '2021-04-03 12:02:53',
                    'updated_at' => '2021-04-03 12:02:53',
                ),
                59 => 
                array (
                    'id' => 60,
                    'code' => '063',
                    'name' => 'LEMPIRAS HONDUREÑAS',
                    'symbol' => '$',
                    'value' => '1',
                    'description' => 'name',
                    'created_at' => '2021-04-03 12:02:53',
                    'updated_at' => '2021-04-03 12:02:53',
                ),
                60 => 
                array (
                    'id' => 61,
                    'code' => '064',
                'name' => 'YUAN (Rep. Pop. China)',
                    'symbol' => '$',
                    'value' => '1',
                    'description' => 'name',
                    'created_at' => '2021-04-03 12:02:53',
                    'updated_at' => '2021-04-03 12:02:53',
                ),
                61 => 
                array (
                    'id' => 62,
                    'code' => '000',
                    'name' => 'OTRAS nameS',
                    'symbol' => '$',
                    'value' => '1',
                    'description' => 'name',
                    'created_at' => '2021-04-03 12:02:53',
                    'updated_at' => '2021-04-03 12:02:53',
                ),
            ));
        
        
    }
}