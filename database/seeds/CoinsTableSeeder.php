<?php

use Illuminate\Database\Seeder;

class CoinsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('coins')->delete();
        
        \DB::table('coins')->insert(array (
            0 => 
            array (
                'id' => 1,
                'afip_code' => '000',
                'name' => 'OTRAS MONEDAS ',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'afip_code' => 'PES ',
                'name' => 'PESOS ',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'afip_code' => 'DOL ',
                'name' => 'Dólar ESTADOUNIDENSE ',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'afip_code' => '002',
                'name' => 'Dólar EEUU LIBRE ',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'afip_code' => '003',
                'name' => 'FRANCOS FRANCESES ',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'afip_code' => '004',
                'name' => 'LIRAS ITALIANAS ',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'afip_code' => '005',
                'name' => 'PESETAS ',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'afip_code' => '006',
                'name' => 'MARCOS ALEMANES ',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'afip_code' => '007',
                'name' => 'FLORINES HOLANDESES ',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'afip_code' => '008',
                'name' => 'FRANCOS BELGAS ',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'afip_code' => '009',
                'name' => 'FRANCOS SUIZOS ',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'afip_code' => '010',
                'name' => 'PESOS MEJICANOS ',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'afip_code' => '011',
                'name' => 'PESOS URUGUAYOS ',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'afip_code' => '012',
                'name' => 'REAL ',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'afip_code' => '013',
                'name' => 'ESCUDOS PORTUGUESES ',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'afip_code' => '014',
                'name' => 'CORONAS DANESAS ',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'afip_code' => '015',
                'name' => 'CORONAS NORUEGAS ',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'afip_code' => '016',
                'name' => 'CORONAS SUECAS ',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'afip_code' => '017',
                'name' => 'CHELINES AUTRIACOS ',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'afip_code' => '018',
                'name' => 'Dólar CANADIENSE ',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'afip_code' => '019',
                'name' => 'YENS ',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'afip_code' => '021',
                'name' => 'LIBRA ESTERLINA ',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'afip_code' => '022',
                'name' => 'MARCOS FINLANDESES ',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'afip_code' => '023',
            'name' => 'BOLIVAR (VENEZOLANO)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'afip_code' => '024',
                'name' => 'CORONA CHECA ',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'afip_code' => '025',
            'name' => 'DINAR (YUGOSLAVO) ',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'afip_code' => '026',
                'name' => 'Dólar AUSTRALIANO ',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'afip_code' => '027',
            'name' => 'DRACMA (GRIEGO) ',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'afip_code' => '028',
                'name' => 'FLORIN (ANTILLAS HOLA ',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
                29 => 
                array (
                    'id' => 30,
                    'afip_code' => '029',
                    'name' => 'GUARANI ',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
                30 => 
                array (
                    'id' => 31,
                    'afip_code' => '030',
                'name' => 'SHEKEL (ISRAEL) ',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
                31 => 
                array (
                    'id' => 32,
                    'afip_code' => '031',
                    'name' => 'PESO BOLIVIANO ',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
                32 => 
                array (
                    'id' => 33,
                    'afip_code' => '032',
                    'name' => 'PESO COLOMBIANO ',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
                33 => 
                array (
                    'id' => 34,
                    'afip_code' => '033',
                    'name' => 'PESO CHILENO ',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
                34 => 
                array (
                    'id' => 35,
                    'afip_code' => '034',
                'name' => 'RAND (SUDAFRICANO)',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
                35 => 
                array (
                    'id' => 36,
                    'afip_code' => '035',
                    'name' => 'NUEVO SOL PERUANO ',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
                36 => 
                array (
                    'id' => 37,
                    'afip_code' => '036',
                'name' => 'SUCRE (ECUATORIANO) ',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
                37 => 
                array (
                    'id' => 38,
                    'afip_code' => '040',
                    'name' => 'LEI RUMANOS ',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
                38 => 
                array (
                    'id' => 39,
                    'afip_code' => '041',
                    'name' => 'DERECHOS ESPECIALES DE GIRO ',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
                39 => 
                array (
                    'id' => 40,
                    'afip_code' => '042',
                    'name' => 'PESOS DOMINICANOS ',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
                40 => 
                array (
                    'id' => 41,
                    'afip_code' => '043',
                    'name' => 'BALBOAS PANAMEÑAS ',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
                41 => 
                array (
                    'id' => 42,
                    'afip_code' => '044',
                    'name' => 'CORDOBAS NICARAGÛENSES ',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
                42 => 
                array (
                    'id' => 43,
                    'afip_code' => '045',
                    'name' => 'DIRHAM MARROQUÍES ',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
                43 => 
                array (
                    'id' => 44,
                    'afip_code' => '046',
                    'name' => 'LIBRAS EGIPCIAS ',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
                44 => 
                array (
                    'id' => 45,
                    'afip_code' => '047',
                    'name' => 'RIYALS SAUDITAS ',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
                45 => 
                array (
                    'id' => 46,
                    'afip_code' => '048',
                    'name' => 'BRANCOS BELGAS FINANCIERAS',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
                46 => 
                array (
                    'id' => 47,
                    'afip_code' => '049',
                    'name' => 'GRAMOS DE ORO FINO ',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
                47 => 
                array (
                    'id' => 48,
                    'afip_code' => '050',
                    'name' => 'LIBRAS IRLANDESAS ',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
                48 => 
                array (
                    'id' => 49,
                    'afip_code' => '051',
                    'name' => 'Dólar DE HONG KONG ',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
                49 => 
                array (
                    'id' => 50,
                    'afip_code' => '052',
                    'name' => 'Dólar DE SINGAPUR ',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
                50 => 
                array (
                    'id' => 51,
                    'afip_code' => '053',
                    'name' => 'Dólar DE JAMAICA ',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
                51 => 
                array (
                    'id' => 52,
                    'afip_code' => '054',
                    'name' => 'Dólar DE TAIWAN ',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
                52 => 
                array (
                    'id' => 53,
                    'afip_code' => '055',
                'name' => 'QUETZAL (GUATEMALTECOS) ',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
                53 => 
                array (
                    'id' => 54,
                    'afip_code' => '056',
                'name' => 'FORINT (HUNGRIA) ',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
                54 => 
                array (
                    'id' => 55,
                    'afip_code' => '057',
                'name' => 'BAHT (TAILANDIA) ',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
                55 => 
                array (
                    'id' => 56,
                    'afip_code' => '058',
                    'name' => 'ECU ',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
                56 => 
                array (
                    'id' => 57,
                    'afip_code' => '059',
                    'name' => 'DINAR KUWAITI ',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
                57 => 
                array (
                    'id' => 58,
                    'afip_code' => '060',
                    'name' => 'EURO ',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
                58 => 
                array (
                    'id' => 59,
                    'afip_code' => '061',
                    'name' => 'ZLTYS POLACOS ',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
                59 => 
                array (
                    'id' => 60,
                    'afip_code' => '062',
                    'name' => 'RUPIAS HINDÚES ',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
                60 => 
                array (
                    'id' => 61,
                    'afip_code' => '063',
                    'name' => 'LEMPIRAS HONDUREÑAS ',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
                61 => 
                array (
                    'id' => 62,
                    'afip_code' => '064',
                'name' => 'YUAN (Rep. Pop. China)',
                    'created_at' => NULL,
                    'updated_at' => NULL,
                ),
            ));
        
        
    }
}