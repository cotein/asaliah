<?php

use Illuminate\Database\Seeder;

class CuitSujetosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cuit_sujetos')->delete();
        
        \DB::table('cuit_sujetos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'afip_code' => '51600000016',
                'name' => 'URUGUAY',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'afip_code' => '55000000018',
                'name' => 'URUGUAY',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'afip_code' => '50000000024',
                'name' => 'PARAGUAY',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'afip_code' => '51600000024',
                'name' => 'PARAGUAY',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'afip_code' => '55000000026',
                'name' => 'PARAGUAY',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'afip_code' => '50000000032',
                'name' => 'CHILE',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'afip_code' => '51600000032',
                'name' => 'CHILE',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'afip_code' => '55000000034',
                'name' => 'CHILE',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'afip_code' => '50000000040',
                'name' => 'BOLIVIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'afip_code' => '51600000040',
                'name' => 'BOLIVIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'afip_code' => '55000000042',
                'name' => 'BOLIVIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'afip_code' => '50000000059',
                'name' => 'BRASIL',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'afip_code' => '51600000059',
                'name' => 'BRASIL',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'afip_code' => '55000000050',
                'name' => 'BRASIL',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'afip_code' => '50000001012',
                'name' => 'BURKINA FASO',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'afip_code' => '51600001012',
                'name' => 'BURKINA FASO',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'afip_code' => '55000001014',
                'name' => 'BURKINA FASO',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'afip_code' => '50000001020',
                'name' => 'ARGELIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'afip_code' => '51600001020',
                'name' => 'ARGELIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'afip_code' => '55000001022',
                'name' => 'ARGELIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'afip_code' => '50000001039',
                'name' => 'BOTSWANA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'afip_code' => '51600001039',
                'name' => 'BOTSWANA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'afip_code' => '55000001030',
                'name' => 'BOTSWANA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'afip_code' => '50000001047',
                'name' => 'BURUNDI',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'afip_code' => '51600001047',
                'name' => 'BURUNDI',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'afip_code' => '55000001049',
                'name' => 'BURUNDI',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'afip_code' => '50000001055',
                'name' => 'CAMERUN',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'afip_code' => '51600001055',
                'name' => 'CAMERUN',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'afip_code' => '55000001057',
                'name' => 'CAMERUN',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'afip_code' => '50000001071',
                'name' => 'CENTRO AFRICANO, REP.',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'afip_code' => '51600001071',
                'name' => 'CENTRO AFRICANO, REP.',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'afip_code' => '55000001073',
                'name' => 'CENTRO AFRICANO, REP.',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'afip_code' => '50000001101',
                'name' => 'COSTA DE MARFIL',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'afip_code' => '51600001101',
                'name' => 'COSTA DE MARFIL',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'afip_code' => '55000001103',
                'name' => 'COSTA DE MARFIL',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'afip_code' => '50000001136',
                'name' => 'EGIPTO',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'afip_code' => '51600001136',
                'name' => 'EGIPTO',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'afip_code' => '55000001138',
                'name' => 'EGIPTO',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 39,
                'afip_code' => '50000001144',
                'name' => 'ETIOPIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 40,
                'afip_code' => '51600001144',
                'name' => 'ETIOPIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 41,
                'afip_code' => '55000001146',
                'name' => 'ETIOPIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 42,
                'afip_code' => '50000001152',
                'name' => 'GABON',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 43,
                'afip_code' => '51600001152',
                'name' => 'GABON',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 44,
                'afip_code' => '55000001154',
                'name' => 'GABON',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 45,
                'afip_code' => '50000001160',
                'name' => 'GAMBIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 46,
                'afip_code' => '51600001160',
                'name' => 'GAMBIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 47,
                'afip_code' => '55000001162',
                'name' => 'GAMBIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 48,
                'afip_code' => '50000001179',
                'name' => 'GHANA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 49,
                'afip_code' => '51600001179',
                'name' => 'GHANA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 50,
                'afip_code' => '55000001170',
                'name' => 'GHANA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 51,
                'afip_code' => '50000001187',
                'name' => 'GUINEA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 52,
                'afip_code' => '51600001187',
                'name' => 'GUINEA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 53,
                'afip_code' => '55000001189',
                'name' => 'GUINEA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 54,
                'afip_code' => '50000001195',
                'name' => 'GUINEA ECUATORIAL',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 55,
                'afip_code' => '51600001195',
                'name' => 'GUINEA ECUATORIAL',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 56,
                'afip_code' => '55000001197',
                'name' => 'GUINEA ECUATORIAL',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 57,
                'afip_code' => '50000001209',
                'name' => 'KENIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 58,
                'afip_code' => '51600001209',
                'name' => 'KENIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 59,
                'afip_code' => '55000001200',
                'name' => 'KENIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 60,
                'afip_code' => '50000001217',
                'name' => 'LESOTHO',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 61,
                'afip_code' => '51600001217',
                'name' => 'LESOTHO',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 62,
                'afip_code' => '55000001219',
                'name' => 'LESOTHO',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 63,
                'afip_code' => '50000001225',
            'name' => 'REPUBLICA DE LIBERIA (Estado independiente)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 64,
                'afip_code' => '51600001225',
            'name' => 'REPUBLICA DE LIBERIA (Estado independiente)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 65,
                'afip_code' => '55000001227',
            'name' => 'REPUBLICA DE LIBERIA (Estado independiente)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 66,
                'afip_code' => '50000001233',
                'name' => 'LIBIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 67,
                'afip_code' => '51600001233',
                'name' => 'LIBIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 68,
                'afip_code' => '55000001235',
                'name' => 'LIBIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 69,
                'afip_code' => '50000001241',
                'name' => 'MADAGASCAR',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 70,
                'afip_code' => '51600001241',
                'name' => 'MADAGASCAR',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 71,
                'afip_code' => '55000001243',
                'name' => 'MADAGASCAR',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 72,
                'afip_code' => '50000001276',
                'name' => 'MARRUECOS',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 73,
                'afip_code' => '51600001276',
                'name' => 'MARRUECOS',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 74,
                'afip_code' => '55000001278',
                'name' => 'MARRUECOS',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 75,
                'afip_code' => '50000001284',
                'name' => 'REPUBLICA DE MAURICIO',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 76,
                'afip_code' => '51600001284',
                'name' => 'REPUBLICA DE MAURICIO',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 77,
                'afip_code' => '55000001286',
                'name' => 'REPUBLICA DE MAURICIO',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 78,
                'afip_code' => '50000001292',
                'name' => 'MAURITANIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 79,
                'afip_code' => '51600001292',
                'name' => 'MAURITANIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 80,
                'afip_code' => '55000001294',
                'name' => 'MAURITANIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 81,
                'afip_code' => '50000001306',
                'name' => 'NIGER',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 82,
                'afip_code' => '51600001306',
                'name' => 'NIGER',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 83,
                'afip_code' => '55000001308',
                'name' => 'NIGER',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 84,
                'afip_code' => '50000001314',
                'name' => 'NIGERIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 85,
                'afip_code' => '51600001314',
                'name' => 'NIGERIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 86,
                'afip_code' => '55000001316',
                'name' => 'NIGERIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 87,
                'afip_code' => '50000001322',
                'name' => 'ZIMBABWE',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'id' => 88,
                'afip_code' => '51600001322',
                'name' => 'ZIMBABWE',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            88 => 
            array (
                'id' => 89,
                'afip_code' => '55000001324',
                'name' => 'ZIMBABWE',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'id' => 90,
                'afip_code' => '50000001330',
                'name' => 'RUANDA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'id' => 91,
                'afip_code' => '51600001330',
                'name' => 'RUANDA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            91 => 
            array (
                'id' => 92,
                'afip_code' => '55000001332',
                'name' => 'RUANDA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            92 => 
            array (
                'id' => 93,
                'afip_code' => '50000001349',
                'name' => 'SENEGAL',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            93 => 
            array (
                'id' => 94,
                'afip_code' => '51600001349',
                'name' => 'SENEGAL',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            94 => 
            array (
                'id' => 95,
                'afip_code' => '55000001340',
                'name' => 'SENEGAL',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            95 => 
            array (
                'id' => 96,
                'afip_code' => '50000001357',
                'name' => 'SIERRA LEONA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            96 => 
            array (
                'id' => 97,
                'afip_code' => '51600001357',
                'name' => 'SIERRA LEONA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            97 => 
            array (
                'id' => 98,
                'afip_code' => '55000001359',
                'name' => 'SIERRA LEONA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            98 => 
            array (
                'id' => 99,
                'afip_code' => '50000001365',
                'name' => 'SOMALIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            99 => 
            array (
                'id' => 100,
                'afip_code' => '51600001365',
                'name' => 'SOMALIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            100 => 
            array (
                'id' => 101,
                'afip_code' => '55000001367',
                'name' => 'SOMALIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            101 => 
            array (
                'id' => 102,
                'afip_code' => '50000001373',
            'name' => 'REINO DE SWAZILANDIA (Estado independiente)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            102 => 
            array (
                'id' => 103,
                'afip_code' => '51600001373',
            'name' => 'REINO DE SWAZILANDIA (Estado independiente)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            103 => 
            array (
                'id' => 104,
                'afip_code' => '55000001375',
            'name' => 'REINO DE SWAZILANDIA (Estado independiente)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            104 => 
            array (
                'id' => 105,
                'afip_code' => '50000001381',
                'name' => 'SUDAN',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            105 => 
            array (
                'id' => 106,
                'afip_code' => '51600001381',
                'name' => 'SUDAN',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            106 => 
            array (
                'id' => 107,
                'afip_code' => '55000001383',
                'name' => 'SUDAN',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            107 => 
            array (
                'id' => 108,
                'afip_code' => '50000001403',
                'name' => 'TOGO',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            108 => 
            array (
                'id' => 109,
                'afip_code' => '51600001403',
                'name' => 'TOGO',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            109 => 
            array (
                'id' => 110,
                'afip_code' => '55000001405',
                'name' => 'TOGO',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            110 => 
            array (
                'id' => 111,
                'afip_code' => '50000001411',
                'name' => 'REPUBLICA TUNECINA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            111 => 
            array (
                'id' => 112,
                'afip_code' => '51600001411',
                'name' => 'REPUBLICA TUNECINA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            112 => 
            array (
                'id' => 113,
                'afip_code' => '55000001413',
                'name' => 'REPUBLICA TUNECINA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            113 => 
            array (
                'id' => 114,
                'afip_code' => '50000001446',
                'name' => 'ZAMBIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            114 => 
            array (
                'id' => 115,
                'afip_code' => '51600001446',
                'name' => 'ZAMBIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            115 => 
            array (
                'id' => 116,
                'afip_code' => '55000001448',
                'name' => 'ZAMBIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            116 => 
            array (
                'id' => 117,
                'afip_code' => '50000001454',
            'name' => 'POS.BRITANICA (AFRICA)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            117 => 
            array (
                'id' => 118,
                'afip_code' => '51600001454',
            'name' => 'POS.BRITANICA (AFRICA)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            118 => 
            array (
                'id' => 119,
                'afip_code' => '55000001456',
            'name' => 'POS.BRITANICA (AFRICA)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            119 => 
            array (
                'id' => 120,
                'afip_code' => '50000001462',
            'name' => 'POS.ESPAÑOLA (AFRICA)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            120 => 
            array (
                'id' => 121,
                'afip_code' => '51600001462',
            'name' => 'POS.ESPAÑOLA (AFRICA)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            121 => 
            array (
                'id' => 122,
                'afip_code' => '55000001464',
            'name' => 'POS.ESPAÑOLA (AFRICA)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            122 => 
            array (
                'id' => 123,
                'afip_code' => '50000001470',
            'name' => 'POS.FRANCESA (AFRICA)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            123 => 
            array (
                'id' => 124,
                'afip_code' => '51600001470',
            'name' => 'POS.FRANCESA (AFRICA)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            124 => 
            array (
                'id' => 125,
                'afip_code' => '55000001472',
            'name' => 'POS.FRANCESA (AFRICA)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            125 => 
            array (
                'id' => 126,
                'afip_code' => '50000001489',
            'name' => 'POS.PORTUGUESA (AFRICA)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            126 => 
            array (
                'id' => 127,
                'afip_code' => '51600001489',
            'name' => 'POS.PORTUGUESA (AFRICA)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            127 => 
            array (
                'id' => 128,
                'afip_code' => '55000001480',
            'name' => 'POS.PORTUGUESA (AFRICA)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            128 => 
            array (
                'id' => 129,
                'afip_code' => '50000001497',
                'name' => 'REPUBLICA DE ANGOLA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            129 => 
            array (
                'id' => 130,
                'afip_code' => '51600001497',
                'name' => 'REPUBLICA DE ANGOLA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            130 => 
            array (
                'id' => 131,
                'afip_code' => '55000001499',
                'name' => 'REPUBLICA DE ANGOLA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            131 => 
            array (
                'id' => 132,
                'afip_code' => '50000001500',
            'name' => 'REPUBLICA DE CABO VERDE (Estado independiente)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            132 => 
            array (
                'id' => 133,
                'afip_code' => '51600001500',
            'name' => 'REPUBLICA DE CABO VERDE (Estado independiente)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            133 => 
            array (
                'id' => 134,
                'afip_code' => '55000001502',
            'name' => 'REPUBLICA DE CABO VERDE (Estado independiente)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            134 => 
            array (
                'id' => 135,
                'afip_code' => '50000001519',
                'name' => 'MOZAMBIQUE',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            135 => 
            array (
                'id' => 136,
                'afip_code' => '51600001519',
                'name' => 'MOZAMBIQUE',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            136 => 
            array (
                'id' => 137,
                'afip_code' => '55000001510',
                'name' => 'MOZAMBIQUE',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            137 => 
            array (
                'id' => 138,
                'afip_code' => '50000001527',
                'name' => 'CONGO REP.POPULAR',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            138 => 
            array (
                'id' => 139,
                'afip_code' => '51600001527',
                'name' => 'CONGO REP.POPULAR',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            139 => 
            array (
                'id' => 140,
                'afip_code' => '55000001529',
                'name' => 'CONGO REP.POPULAR',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            140 => 
            array (
                'id' => 141,
                'afip_code' => '50000001535',
                'name' => 'CHAD',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            141 => 
            array (
                'id' => 142,
                'afip_code' => '51600001535',
                'name' => 'CHAD',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            142 => 
            array (
                'id' => 143,
                'afip_code' => '55000001537',
                'name' => 'CHAD',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            143 => 
            array (
                'id' => 144,
                'afip_code' => '50000001543',
                'name' => 'MALAWI',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            144 => 
            array (
                'id' => 145,
                'afip_code' => '51600001543',
                'name' => 'MALAWI',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            145 => 
            array (
                'id' => 146,
                'afip_code' => '55000001545',
                'name' => 'MALAWI',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            146 => 
            array (
                'id' => 147,
                'afip_code' => '50000001551',
                'name' => 'TANZANIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            147 => 
            array (
                'id' => 148,
                'afip_code' => '51600001551',
                'name' => 'TANZANIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            148 => 
            array (
                'id' => 149,
                'afip_code' => '55000001553',
                'name' => 'TANZANIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            149 => 
            array (
                'id' => 150,
                'afip_code' => '50000001586',
                'name' => 'COSTA RICA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            150 => 
            array (
                'id' => 151,
                'afip_code' => '51600001586',
                'name' => 'COSTA RICA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            151 => 
            array (
                'id' => 152,
                'afip_code' => '55000001588',
                'name' => 'COSTA RICA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            152 => 
            array (
                'id' => 153,
                'afip_code' => '50000001616',
                'name' => 'ZAIRE',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            153 => 
            array (
                'id' => 154,
                'afip_code' => '51600001616',
                'name' => 'ZAIRE',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            154 => 
            array (
                'id' => 155,
                'afip_code' => '55000001618',
                'name' => 'ZAIRE',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            155 => 
            array (
                'id' => 156,
                'afip_code' => '50000001624',
                'name' => 'BENIN',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            156 => 
            array (
                'id' => 157,
                'afip_code' => '51600001624',
                'name' => 'BENIN',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            157 => 
            array (
                'id' => 158,
                'afip_code' => '55000001626',
                'name' => 'BENIN',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            158 => 
            array (
                'id' => 159,
                'afip_code' => '50000001632',
                'name' => 'MALI',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            159 => 
            array (
                'id' => 160,
                'afip_code' => '51600001632',
                'name' => 'MALI',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            160 => 
            array (
                'id' => 161,
                'afip_code' => '55000001634',
                'name' => 'MALI',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            161 => 
            array (
                'id' => 162,
                'afip_code' => '50000001705',
                'name' => 'UGANDA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            162 => 
            array (
                'id' => 163,
                'afip_code' => '51600001705',
                'name' => 'UGANDA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            163 => 
            array (
                'id' => 164,
                'afip_code' => '55000001707',
                'name' => 'UGANDA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            164 => 
            array (
                'id' => 165,
                'afip_code' => '50000001713',
                'name' => 'SUDAFRICA, REP. DE',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            165 => 
            array (
                'id' => 166,
                'afip_code' => '51600001713',
                'name' => 'SUDAFRICA, REP. DE',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            166 => 
            array (
                'id' => 167,
                'afip_code' => '55000001715',
                'name' => 'SUDAFRICA, REP. DE',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            167 => 
            array (
                'id' => 168,
                'afip_code' => '50000001810',
            'name' => 'REPUBLICA DE SEYCHELLES (Estado independiente)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            168 => 
            array (
                'id' => 169,
                'afip_code' => '51600001810',
            'name' => 'REPUBLICA DE SEYCHELLES (Estado independiente)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            169 => 
            array (
                'id' => 170,
                'afip_code' => '55000001812',
            'name' => 'REPUBLICA DE SEYCHELLES (Estado independiente)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            170 => 
            array (
                'id' => 171,
                'afip_code' => '50000001829',
                'name' => 'SANTO TOME Y PRINCIPE',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            171 => 
            array (
                'id' => 172,
                'afip_code' => '51600001829',
                'name' => 'SANTO TOME Y PRINCIPE',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            172 => 
            array (
                'id' => 173,
                'afip_code' => '55000001820',
                'name' => 'SANTO TOME Y PRINCIPE',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            173 => 
            array (
                'id' => 174,
                'afip_code' => '50000001837',
                'name' => 'NAMIBIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            174 => 
            array (
                'id' => 175,
                'afip_code' => '51600001837',
                'name' => 'NAMIBIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            175 => 
            array (
                'id' => 176,
                'afip_code' => '55000001839',
                'name' => 'NAMIBIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            176 => 
            array (
                'id' => 177,
                'afip_code' => '50000001845',
                'name' => 'GUINEA BISSAU',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            177 => 
            array (
                'id' => 178,
                'afip_code' => '51600001845',
                'name' => 'GUINEA BISSAU',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            178 => 
            array (
                'id' => 179,
                'afip_code' => '55000001847',
                'name' => 'GUINEA BISSAU',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            179 => 
            array (
                'id' => 180,
                'afip_code' => '50000001853',
                'name' => 'ERITREA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            180 => 
            array (
                'id' => 181,
                'afip_code' => '51600001853',
                'name' => 'ERITREA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            181 => 
            array (
                'id' => 182,
                'afip_code' => '55000001855',
                'name' => 'ERITREA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            182 => 
            array (
                'id' => 183,
                'afip_code' => '50000001861',
            'name' => 'REPUBLICA DE DJIBUTI (Estado independiente)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            183 => 
            array (
                'id' => 184,
                'afip_code' => '51600001861',
            'name' => 'REPUBLICA DE DJIBUTI (Estado independiente)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            184 => 
            array (
                'id' => 185,
                'afip_code' => '55000001863',
            'name' => 'REPUBLICA DE DJIBUTI (Estado independiente)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            185 => 
            array (
                'id' => 186,
                'afip_code' => '50000001896',
                'name' => 'COMORAS',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            186 => 
            array (
                'id' => 187,
                'afip_code' => '51600001896',
                'name' => 'COMORAS',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            187 => 
            array (
                'id' => 188,
                'afip_code' => '55000001898',
                'name' => 'COMORAS',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            188 => 
            array (
                'id' => 189,
                'afip_code' => '50000001985',
            'name' => 'INDETERMINADO (AFRICA)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            189 => 
            array (
                'id' => 190,
                'afip_code' => '51600001985',
            'name' => 'INDETERMINADO (AFRICA)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            190 => 
            array (
                'id' => 191,
                'afip_code' => '55000001987',
            'name' => 'INDETERMINADO (AFRICA)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            191 => 
            array (
                'id' => 192,
                'afip_code' => '50000002019',
            'name' => 'BARBADOS (Estado independiente)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            192 => 
            array (
                'id' => 193,
                'afip_code' => '51600002019',
            'name' => 'BARBADOS (Estado independiente)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            193 => 
            array (
                'id' => 194,
                'afip_code' => '55000002010',
            'name' => 'BARBADOS (Estado independiente)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            194 => 
            array (
                'id' => 195,
                'afip_code' => '50000002043',
                'name' => 'CANADA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            195 => 
            array (
                'id' => 196,
                'afip_code' => '51600002043',
                'name' => 'CANADA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            196 => 
            array (
                'id' => 197,
                'afip_code' => '55000002045',
                'name' => 'CANADA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            197 => 
            array (
                'id' => 198,
                'afip_code' => '50000002051',
                'name' => 'COLOMBIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            198 => 
            array (
                'id' => 199,
                'afip_code' => '51600002051',
                'name' => 'COLOMBIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            199 => 
            array (
                'id' => 200,
                'afip_code' => '55000002053',
                'name' => 'COLOMBIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            200 => 
            array (
                'id' => 201,
                'afip_code' => '50000002094',
                'name' => 'DOMINICANA, REPUBLICA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            201 => 
            array (
                'id' => 202,
                'afip_code' => '51600002094',
                'name' => 'DOMINICANA, REPUBLICA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            202 => 
            array (
                'id' => 203,
                'afip_code' => '55000002096',
                'name' => 'DOMINICANA, REPUBLICA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            203 => 
            array (
                'id' => 204,
                'afip_code' => '50000002116',
                'name' => 'EL SALVADOR',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            204 => 
            array (
                'id' => 205,
                'afip_code' => '51600002116',
                'name' => 'EL SALVADOR',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            205 => 
            array (
                'id' => 206,
                'afip_code' => '55000002118',
                'name' => 'EL SALVADOR',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            206 => 
            array (
                'id' => 207,
                'afip_code' => '50000002124',
                'name' => 'ESTADOS UNIDOS',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            207 => 
            array (
                'id' => 208,
                'afip_code' => '51600002124',
                'name' => 'ESTADOS UNIDOS',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            208 => 
            array (
                'id' => 209,
                'afip_code' => '55000002126',
                'name' => 'ESTADOS UNIDOS',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            209 => 
            array (
                'id' => 210,
                'afip_code' => '50000002132',
                'name' => 'GUATEMALA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            210 => 
            array (
                'id' => 211,
                'afip_code' => '51600002132',
                'name' => 'GUATEMALA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            211 => 
            array (
                'id' => 212,
                'afip_code' => '55000002134',
                'name' => 'GUATEMALA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            212 => 
            array (
                'id' => 213,
                'afip_code' => '50000002140',
            'name' => 'REPUBLICA COOPERATIVA DE GUYANA (Estado independiente)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            213 => 
            array (
                'id' => 214,
                'afip_code' => '51600002140',
            'name' => 'REPUBLICA COOPERATIVA DE GUYANA (Estado independiente)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            214 => 
            array (
                'id' => 215,
                'afip_code' => '55000002142',
            'name' => 'REPUBLICA COOPERATIVA DE GUYANA (Estado independiente)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            215 => 
            array (
                'id' => 216,
                'afip_code' => '50000002159',
                'name' => 'HAITI',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            216 => 
            array (
                'id' => 217,
                'afip_code' => '51600002159',
                'name' => 'HAITI',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            217 => 
            array (
                'id' => 218,
                'afip_code' => '55000002150',
                'name' => 'HAITI',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            218 => 
            array (
                'id' => 219,
                'afip_code' => '50000002167',
                'name' => 'HONDURAS',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            219 => 
            array (
                'id' => 220,
                'afip_code' => '51600002167',
                'name' => 'HONDURAS',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            220 => 
            array (
                'id' => 221,
                'afip_code' => '55000002169',
                'name' => 'HONDURAS',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            221 => 
            array (
                'id' => 222,
                'afip_code' => '50000002175',
                'name' => 'JAMAICA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            222 => 
            array (
                'id' => 223,
                'afip_code' => '51600002175',
                'name' => 'JAMAICA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            223 => 
            array (
                'id' => 224,
                'afip_code' => '55000002177',
                'name' => 'JAMAICA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            224 => 
            array (
                'id' => 225,
                'afip_code' => '50000002183',
                'name' => 'MEXICO',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            225 => 
            array (
                'id' => 226,
                'afip_code' => '51600002183',
                'name' => 'MEXICO',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            226 => 
            array (
                'id' => 227,
                'afip_code' => '55000002185',
                'name' => 'MEXICO',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            227 => 
            array (
                'id' => 228,
                'afip_code' => '50000002191',
                'name' => 'NICARAGUA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            228 => 
            array (
                'id' => 229,
                'afip_code' => '51600002191',
                'name' => 'NICARAGUA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            229 => 
            array (
                'id' => 230,
                'afip_code' => '55000002193',
                'name' => 'NICARAGUA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            230 => 
            array (
                'id' => 231,
                'afip_code' => '50000002205',
            'name' => 'REPUBLICA DE PANAMA (Estado independiente)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            231 => 
            array (
                'id' => 232,
                'afip_code' => '51600002205',
            'name' => 'REPUBLICA DE PANAMA (Estado independiente)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            232 => 
            array (
                'id' => 233,
                'afip_code' => '55000002207',
            'name' => 'REPUBLICA DE PANAMA (Estado independiente)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            233 => 
            array (
                'id' => 234,
                'afip_code' => '50000002213',
            'name' => 'ESTADO LIBRE ASOCIADO DE PUERTO RICO (Estado asoc. a EEUU)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            234 => 
            array (
                'id' => 235,
                'afip_code' => '51600002213',
            'name' => 'ESTADO LIBRE ASOCIADO DE PUERTO RICO (Estado asoc. a EEUU)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            235 => 
            array (
                'id' => 236,
                'afip_code' => '55000002215',
            'name' => 'ESTADO LIBRE ASOCIADO DE PUERTO RICO (Estado asoc. a EEUU)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            236 => 
            array (
                'id' => 237,
                'afip_code' => '50000002221',
                'name' => 'PERU',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            237 => 
            array (
                'id' => 238,
                'afip_code' => '51600002221',
                'name' => 'PERU',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            238 => 
            array (
                'id' => 239,
                'afip_code' => '55000002223',
                'name' => 'PERU',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            239 => 
            array (
                'id' => 240,
                'afip_code' => '50000002256',
            'name' => 'ANTIGUA Y BARBUDA (Estado independiente)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            240 => 
            array (
                'id' => 241,
                'afip_code' => '51600002256',
            'name' => 'ANTIGUA Y BARBUDA (Estado independiente)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            241 => 
            array (
                'id' => 242,
                'afip_code' => '55000002258',
            'name' => 'ANTIGUA Y BARBUDA (Estado independiente)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            242 => 
            array (
                'id' => 243,
                'afip_code' => '50000002264',
                'name' => 'VENEZUELA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            243 => 
            array (
                'id' => 244,
                'afip_code' => '51600002264',
                'name' => 'VENEZUELA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            244 => 
            array (
                'id' => 245,
                'afip_code' => '55000002266',
                'name' => 'VENEZUELA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            245 => 
            array (
                'id' => 246,
                'afip_code' => '50000002272',
            'name' => 'POS.BRITANICA (AMERICA)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            246 => 
            array (
                'id' => 247,
                'afip_code' => '51600002272',
            'name' => 'POS.BRITANICA (AMERICA)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            247 => 
            array (
                'id' => 248,
                'afip_code' => '55000002274',
            'name' => 'POS.BRITANICA (AMERICA)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            248 => 
            array (
                'id' => 249,
                'afip_code' => '50000002280',
            'name' => 'POS.DANESA (AMERICA)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            249 => 
            array (
                'id' => 250,
                'afip_code' => '51600002280',
            'name' => 'POS.DANESA (AMERICA)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            250 => 
            array (
                'id' => 251,
                'afip_code' => '55000002282',
            'name' => 'POS.DANESA (AMERICA)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            251 => 
            array (
                'id' => 252,
                'afip_code' => '50000002299',
            'name' => 'POS.FRANCESA (AMERICA)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            252 => 
            array (
                'id' => 253,
                'afip_code' => '51600002299',
            'name' => 'POS.FRANCESA (AMERICA)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            253 => 
            array (
                'id' => 254,
                'afip_code' => '55000002290',
            'name' => 'POS.FRANCESA (AMERICA)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            254 => 
            array (
                'id' => 255,
                'afip_code' => '50000002302',
            'name' => 'POS.PAISES BAJOS (AMERICA)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            255 => 
            array (
                'id' => 256,
                'afip_code' => '51600002302',
            'name' => 'POS.PAISES BAJOS (AMERICA)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            256 => 
            array (
                'id' => 257,
                'afip_code' => '55000002304',
            'name' => 'POS.PAISES BAJOS (AMERICA)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            257 => 
            array (
                'id' => 258,
                'afip_code' => '50000002310',
            'name' => 'POS.E.E.U.U. (AMERICA)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            258 => 
            array (
                'id' => 259,
                'afip_code' => '51600002310',
            'name' => 'POS.E.E.U.U. (AMERICA)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            259 => 
            array (
                'id' => 260,
                'afip_code' => '55000002312',
            'name' => 'POS.E.E.U.U. (AMERICA)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            260 => 
            array (
                'id' => 261,
                'afip_code' => '50000002329',
                'name' => 'SURINAME',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            261 => 
            array (
                'id' => 262,
                'afip_code' => '51600002329',
                'name' => 'SURINAME',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            262 => 
            array (
                'id' => 263,
                'afip_code' => '55000002320',
                'name' => 'SURINAME',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            263 => 
            array (
                'id' => 264,
                'afip_code' => '50000002337',
            'name' => 'EL COMMONWEALTH DE DOMINICA (Estado Asociado)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            264 => 
            array (
                'id' => 265,
                'afip_code' => '51600002337',
            'name' => 'EL COMMONWEALTH DE DOMINICA (Estado Asociado)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            265 => 
            array (
                'id' => 266,
                'afip_code' => '55000002339',
            'name' => 'EL COMMONWEALTH DE DOMINICA (Estado Asociado)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            266 => 
            array (
                'id' => 267,
                'afip_code' => '50000002345',
                'name' => 'SANTA LUCIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            267 => 
            array (
                'id' => 268,
                'afip_code' => '51600002345',
                'name' => 'SANTA LUCIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            268 => 
            array (
                'id' => 269,
                'afip_code' => '55000002347',
                'name' => 'SANTA LUCIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            269 => 
            array (
                'id' => 270,
                'afip_code' => '50000002353',
            'name' => 'SAN VICENTE Y LAS GRANADINAS (Estado independiente)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            270 => 
            array (
                'id' => 271,
                'afip_code' => '51600002353',
            'name' => 'SAN VICENTE Y LAS GRANADINAS (Estado independiente)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            271 => 
            array (
                'id' => 272,
                'afip_code' => '55000002355',
            'name' => 'SAN VICENTE Y LAS GRANADINAS (Estado independiente)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            272 => 
            array (
                'id' => 273,
                'afip_code' => '50000002361',
            'name' => 'BELICE (Estado independiente)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            273 => 
            array (
                'id' => 274,
                'afip_code' => '51600002361',
            'name' => 'BELICE (Estado independiente)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            274 => 
            array (
                'id' => 275,
                'afip_code' => '55000002363',
            'name' => 'BELICE (Estado independiente)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            275 => 
            array (
                'id' => 276,
                'afip_code' => '50000002396',
                'name' => 'CUBA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            276 => 
            array (
                'id' => 277,
                'afip_code' => '51600002396',
                'name' => 'CUBA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            277 => 
            array (
                'id' => 278,
                'afip_code' => '55000002398',
                'name' => 'CUBA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            278 => 
            array (
                'id' => 279,
                'afip_code' => '50000002426',
                'name' => 'ECUADOR',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            279 => 
            array (
                'id' => 280,
                'afip_code' => '51600002426',
                'name' => 'ECUADOR',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            280 => 
            array (
                'id' => 281,
                'afip_code' => '55000002428',
                'name' => 'ECUADOR',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            281 => 
            array (
                'id' => 282,
                'afip_code' => '50000002434',
                'name' => 'REPUBLICA DE TRINIDAD Y TOBAGO',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            282 => 
            array (
                'id' => 283,
                'afip_code' => '51600002434',
                'name' => 'REPUBLICA DE TRINIDAD Y TOBAGO',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            283 => 
            array (
                'id' => 284,
                'afip_code' => '55000002436',
                'name' => 'REPUBLICA DE TRINIDAD Y TOBAGO',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            284 => 
            array (
                'id' => 285,
                'afip_code' => '50000002825',
                'name' => 'BUTAN',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            285 => 
            array (
                'id' => 286,
                'afip_code' => '51600002825',
                'name' => 'BUTAN',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            286 => 
            array (
                'id' => 287,
                'afip_code' => '55000002827',
                'name' => 'BUTAN',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            287 => 
            array (
                'id' => 288,
                'afip_code' => '50000002841',
            'name' => 'MYANMAR (EX BIRMANIA)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            288 => 
            array (
                'id' => 289,
                'afip_code' => '51600002841',
            'name' => 'MYANMAR (EX BIRMANIA)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            289 => 
            array (
                'id' => 290,
                'afip_code' => '55000002843',
            'name' => 'MYANMAR (EX BIRMANIA)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            290 => 
            array (
                'id' => 291,
                'afip_code' => '50000002876',
                'name' => 'ISRAEL',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            291 => 
            array (
                'id' => 292,
                'afip_code' => '51600002876',
                'name' => 'ISRAEL',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            292 => 
            array (
                'id' => 293,
                'afip_code' => '55000002878',
                'name' => 'ISRAEL',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            293 => 
            array (
                'id' => 294,
                'afip_code' => '50000002882',
            'name' => 'ESTADO ASOCIADO DE GRANADA (Estado independiente)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            294 => 
            array (
                'id' => 295,
                'afip_code' => '51600002884',
            'name' => 'ESTADO ASOCIADO DE GRANADA (Estado independiente)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            295 => 
            array (
                'id' => 296,
                'afip_code' => '55000002884',
            'name' => 'ESTADO ASOCIADO DE GRANADA (Estado independiente)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            296 => 
            array (
                'id' => 297,
                'afip_code' => '50000002892',
            'name' => 'FEDERACION DE SAN CRISTOBAL (Islas Saint Kitts and Nevis)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            297 => 
            array (
                'id' => 298,
                'afip_code' => '51600002892',
            'name' => 'FEDERACION DE SAN CRISTOBAL (Islas Saint Kitts and Nevis)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            298 => 
            array (
                'id' => 299,
                'afip_code' => '55000002894',
            'name' => 'FEDERACION DE SAN CRISTOBAL (Islas Saint Kitts and Nevis)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            299 => 
            array (
                'id' => 300,
                'afip_code' => '50000002906',
            'name' => 'COMUNIDAD DE LAS BAHAMAS (Estado independiente)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            300 => 
            array (
                'id' => 301,
                'afip_code' => '51600002906',
            'name' => 'COMUNIDAD DE LAS BAHAMAS (Estado independiente)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            301 => 
            array (
                'id' => 302,
                'afip_code' => '55000002908',
            'name' => 'COMUNIDAD DE LAS BAHAMAS (Estado independiente)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            302 => 
            array (
                'id' => 303,
                'afip_code' => '50000002914',
                'name' => 'TAILANDIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            303 => 
            array (
                'id' => 304,
                'afip_code' => '51600002914',
                'name' => 'TAILANDIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            304 => 
            array (
                'id' => 305,
                'afip_code' => '55000002916',
                'name' => 'TAILANDIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            305 => 
            array (
                'id' => 306,
                'afip_code' => '50000002922',
            'name' => 'INDETERMINADO (AMERICA)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            306 => 
            array (
                'id' => 307,
                'afip_code' => '51600002922',
            'name' => 'INDETERMINADO (AMERICA)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            307 => 
            array (
                'id' => 308,
                'afip_code' => '55000002924',
            'name' => 'INDETERMINADO (AMERICA)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            308 => 
            array (
                'id' => 309,
                'afip_code' => '50000002930',
                'name' => 'IRAN',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            309 => 
            array (
                'id' => 310,
                'afip_code' => '51600002930',
                'name' => 'IRAN',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            310 => 
            array (
                'id' => 311,
                'afip_code' => '55000002932',
                'name' => 'IRAN',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            311 => 
            array (
                'id' => 312,
                'afip_code' => '50000002981',
            'name' => 'ESTADO DE QATAR (Estado independiente)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            312 => 
            array (
                'id' => 313,
                'afip_code' => '51600002981',
            'name' => 'ESTADO DE QATAR (Estado independiente)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            313 => 
            array (
                'id' => 314,
                'afip_code' => '55000002983',
            'name' => 'ESTADO DE QATAR (Estado independiente)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            314 => 
            array (
                'id' => 315,
                'afip_code' => '50000003007',
                'name' => 'REINO HACHEMITA DE JORDANIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            315 => 
            array (
                'id' => 316,
                'afip_code' => '51600003007',
                'name' => 'REINO HACHEMITA DE JORDANIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            316 => 
            array (
                'id' => 317,
                'afip_code' => '55000003009',
                'name' => 'REINO HACHEMITA DE JORDANIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            317 => 
            array (
                'id' => 318,
                'afip_code' => '50000003015',
                'name' => 'AFGANISTAN',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            318 => 
            array (
                'id' => 319,
                'afip_code' => '51600003015',
                'name' => 'AFGANISTAN',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            319 => 
            array (
                'id' => 320,
                'afip_code' => '55000003017',
                'name' => 'AFGANISTAN',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            320 => 
            array (
                'id' => 321,
                'afip_code' => '50000003023',
                'name' => 'ARABIA SAUDITA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            321 => 
            array (
                'id' => 322,
                'afip_code' => '51600003023',
                'name' => 'ARABIA SAUDITA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            322 => 
            array (
                'id' => 323,
                'afip_code' => '55000003025',
                'name' => 'ARABIA SAUDITA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            323 => 
            array (
                'id' => 324,
                'afip_code' => '50000003031',
            'name' => 'ESTADO DE BAHREIN (Estado independiente)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            324 => 
            array (
                'id' => 325,
                'afip_code' => '51600003031',
            'name' => 'ESTADO DE BAHREIN (Estado independiente)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            325 => 
            array (
                'id' => 326,
                'afip_code' => '55000003033',
            'name' => 'ESTADO DE BAHREIN (Estado independiente)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            326 => 
            array (
                'id' => 327,
                'afip_code' => '50000003066',
            'name' => 'CAMBOYA (EX KAMPUCHEA)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            327 => 
            array (
                'id' => 328,
                'afip_code' => '51600003066',
            'name' => 'CAMBOYA (EX KAMPUCHEA)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            328 => 
            array (
                'id' => 329,
                'afip_code' => '55000003068',
            'name' => 'CAMBOYA (EX KAMPUCHEA)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            329 => 
            array (
                'id' => 330,
                'afip_code' => '50000003074',
                'name' => 'REPUBLICA DEMOCRATICA SOCIALISTA DE SRI LANKA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            330 => 
            array (
                'id' => 331,
                'afip_code' => '51600003074',
                'name' => 'REPUBLICA DEMOCRATICA SOCIALISTA DE SRI LANKA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            331 => 
            array (
                'id' => 332,
                'afip_code' => '55000003076',
                'name' => 'REPUBLICA DEMOCRATICA SOCIALISTA DE SRI LANKA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            332 => 
            array (
                'id' => 333,
                'afip_code' => '50000003082',
                'name' => 'COREA DEMOCRATICA ',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            333 => 
            array (
                'id' => 334,
                'afip_code' => '51600003082',
                'name' => 'COREA DEMOCRATICA ',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            334 => 
            array (
                'id' => 335,
                'afip_code' => '55000003084',
                'name' => 'COREA DEMOCRATICA ',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            335 => 
            array (
                'id' => 336,
                'afip_code' => '50000003090',
                'name' => 'COREA REPUBLICANA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            336 => 
            array (
                'id' => 337,
                'afip_code' => '51600003090',
                'name' => 'COREA REPUBLICANA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            337 => 
            array (
                'id' => 338,
                'afip_code' => '55000003092',
                'name' => 'COREA REPUBLICANA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            338 => 
            array (
                'id' => 339,
                'afip_code' => '50000003104',
                'name' => 'CHINA REP.POPULAR',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            339 => 
            array (
                'id' => 340,
                'afip_code' => '51600003104',
                'name' => 'CHINA REP.POPULAR',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            340 => 
            array (
                'id' => 341,
                'afip_code' => '55000003106',
                'name' => 'CHINA REP.POPULAR',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            341 => 
            array (
                'id' => 342,
                'afip_code' => '50000003112',
            'name' => 'REPUBLICA DE CHIPRE (Estado independiente)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            342 => 
            array (
                'id' => 343,
                'afip_code' => '51600003112',
            'name' => 'REPUBLICA DE CHIPRE (Estado independiente)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            343 => 
            array (
                'id' => 344,
                'afip_code' => '55000003114',
            'name' => 'REPUBLICA DE CHIPRE (Estado independiente)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            344 => 
            array (
                'id' => 345,
                'afip_code' => '50000003120',
                'name' => 'FILIPINAS',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            345 => 
            array (
                'id' => 346,
                'afip_code' => '51600003120',
                'name' => 'FILIPINAS',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            346 => 
            array (
                'id' => 347,
                'afip_code' => '55000003122',
                'name' => 'FILIPINAS',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            347 => 
            array (
                'id' => 348,
                'afip_code' => '50000003139',
                'name' => 'TAIWAN',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            348 => 
            array (
                'id' => 349,
                'afip_code' => '51600003139',
                'name' => 'TAIWAN',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            349 => 
            array (
                'id' => 350,
                'afip_code' => '55000003130',
                'name' => 'TAIWAN',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            350 => 
            array (
                'id' => 351,
                'afip_code' => '50000003147',
                'name' => 'GAZA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            351 => 
            array (
                'id' => 352,
                'afip_code' => '51600003147',
                'name' => 'GAZA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            352 => 
            array (
                'id' => 353,
                'afip_code' => '55000003149',
                'name' => 'GAZA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            353 => 
            array (
                'id' => 354,
                'afip_code' => '50000003155',
                'name' => 'INDIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            354 => 
            array (
                'id' => 355,
                'afip_code' => '51600003155',
                'name' => 'INDIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            355 => 
            array (
                'id' => 356,
                'afip_code' => '55000003157',
                'name' => 'INDIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            356 => 
            array (
                'id' => 357,
                'afip_code' => '50000003163',
                'name' => 'INDONESIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            357 => 
            array (
                'id' => 358,
                'afip_code' => '51600003163',
                'name' => 'INDONESIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            358 => 
            array (
                'id' => 359,
                'afip_code' => '55000003165',
                'name' => 'INDONESIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            359 => 
            array (
                'id' => 360,
                'afip_code' => '50000003171',
                'name' => 'IRAK',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            360 => 
            array (
                'id' => 361,
                'afip_code' => '51600003171',
                'name' => 'IRAK',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            361 => 
            array (
                'id' => 362,
                'afip_code' => '55000003173',
                'name' => 'IRAK',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            362 => 
            array (
                'id' => 363,
                'afip_code' => '50000003201',
                'name' => 'JAPON',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            363 => 
            array (
                'id' => 364,
                'afip_code' => '51600003201',
                'name' => 'JAPON',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            364 => 
            array (
                'id' => 365,
                'afip_code' => '55000003203',
                'name' => 'JAPON',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            365 => 
            array (
                'id' => 366,
                'afip_code' => '50000003236',
            'name' => 'ESTADO DE KUWAIT (Estado independiente)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            366 => 
            array (
                'id' => 367,
                'afip_code' => '51600003236',
            'name' => 'ESTADO DE KUWAIT (Estado independiente)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            367 => 
            array (
                'id' => 368,
                'afip_code' => '55000003238',
            'name' => 'ESTADO DE KUWAIT (Estado independiente)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            368 => 
            array (
                'id' => 369,
                'afip_code' => '50000003244',
                'name' => 'LAOS',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            369 => 
            array (
                'id' => 370,
                'afip_code' => '51600003244',
                'name' => 'LAOS',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            370 => 
            array (
                'id' => 371,
                'afip_code' => '55000003246',
                'name' => 'LAOS',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            371 => 
            array (
                'id' => 372,
                'afip_code' => '50000003252',
                'name' => 'LIBANO',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            372 => 
            array (
                'id' => 373,
                'afip_code' => '51600003252',
                'name' => 'LIBANO',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            373 => 
            array (
                'id' => 374,
                'afip_code' => '55000003254',
                'name' => 'LIBANO',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            374 => 
            array (
                'id' => 375,
                'afip_code' => '50000003260',
                'name' => 'MALASIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            375 => 
            array (
                'id' => 376,
                'afip_code' => '51600003260',
                'name' => 'MALASIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            376 => 
            array (
                'id' => 377,
                'afip_code' => '55000003262',
                'name' => 'MALASIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            377 => 
            array (
                'id' => 378,
                'afip_code' => '50000003279',
            'name' => 'REPUBLICA DE MALDIVAS (Estado independiente)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            378 => 
            array (
                'id' => 379,
                'afip_code' => '51600003279',
            'name' => 'REPUBLICA DE MALDIVAS (Estado independiente)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            379 => 
            array (
                'id' => 380,
                'afip_code' => '55000003270',
            'name' => 'REPUBLICA DE MALDIVAS (Estado independiente)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            380 => 
            array (
                'id' => 381,
                'afip_code' => '50000003287',
                'name' => 'SULTANATO DE OMAN',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            381 => 
            array (
                'id' => 382,
                'afip_code' => '51600003287',
                'name' => 'SULTANATO DE OMAN',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            382 => 
            array (
                'id' => 383,
                'afip_code' => '55000003289',
                'name' => 'SULTANATO DE OMAN',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            383 => 
            array (
                'id' => 384,
                'afip_code' => '50000003295',
                'name' => 'MONGOLIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            384 => 
            array (
                'id' => 385,
                'afip_code' => '51600003295',
                'name' => 'MONGOLIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            385 => 
            array (
                'id' => 386,
                'afip_code' => '55000003297',
                'name' => 'MONGOLIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            386 => 
            array (
                'id' => 387,
                'afip_code' => '50000003309',
                'name' => 'NEPAL',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            387 => 
            array (
                'id' => 388,
                'afip_code' => '51600003309',
                'name' => 'NEPAL',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            388 => 
            array (
                'id' => 389,
                'afip_code' => '55000003300',
                'name' => 'NEPAL',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            389 => 
            array (
                'id' => 390,
                'afip_code' => '50000003317',
            'name' => 'EMIRATOS ARABES UNIDOS (Estado independiente)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            390 => 
            array (
                'id' => 391,
                'afip_code' => '51600003317',
            'name' => 'EMIRATOS ARABES UNIDOS (Estado independiente)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            391 => 
            array (
                'id' => 392,
                'afip_code' => '55000003319',
            'name' => 'EMIRATOS ARABES UNIDOS (Estado independiente)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            392 => 
            array (
                'id' => 393,
                'afip_code' => '50000003325',
                'name' => 'PAKISTAN',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            393 => 
            array (
                'id' => 394,
                'afip_code' => '51600003325',
                'name' => 'PAKISTAN',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            394 => 
            array (
                'id' => 395,
                'afip_code' => '55000003327',
                'name' => 'PAKISTAN',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            395 => 
            array (
                'id' => 396,
                'afip_code' => '50000003333',
                'name' => 'SINGAPUR',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            396 => 
            array (
                'id' => 397,
                'afip_code' => '51600003333',
                'name' => 'SINGAPUR',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            397 => 
            array (
                'id' => 398,
                'afip_code' => '55000003335',
                'name' => 'SINGAPUR',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            398 => 
            array (
                'id' => 399,
                'afip_code' => '50000003341',
                'name' => 'SIRIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            399 => 
            array (
                'id' => 400,
                'afip_code' => '51600003341',
                'name' => 'SIRIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            400 => 
            array (
                'id' => 401,
                'afip_code' => '55000003343',
                'name' => 'SIRIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            401 => 
            array (
                'id' => 402,
                'afip_code' => '50000003376',
                'name' => 'VIETNAM',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            402 => 
            array (
                'id' => 403,
                'afip_code' => '51600003376',
                'name' => 'VIETNAM',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            403 => 
            array (
                'id' => 404,
                'afip_code' => '55000003378',
                'name' => 'VIETNAM',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            404 => 
            array (
                'id' => 405,
                'afip_code' => '50000003392',
                'name' => 'REPUBLICA DEL YEMEN',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            405 => 
            array (
                'id' => 406,
                'afip_code' => '51600003392',
                'name' => 'REPUBLICA DEL YEMEN',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            406 => 
            array (
                'id' => 407,
                'afip_code' => '55000003394',
                'name' => 'REPUBLICA DEL YEMEN',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            407 => 
            array (
                'id' => 408,
                'afip_code' => '50000003414',
            'name' => 'POS.BRITANICA (HONG KONG)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            408 => 
            array (
                'id' => 409,
                'afip_code' => '51600003414',
            'name' => 'POS.BRITANICA (HONG KONG)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            409 => 
            array (
                'id' => 410,
                'afip_code' => '55000003416',
            'name' => 'POS.BRITANICA (HONG KONG)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            410 => 
            array (
                'id' => 411,
                'afip_code' => '50000003422',
            'name' => 'POS.JAPONESA (ASIA)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            411 => 
            array (
                'id' => 412,
                'afip_code' => '51600003422',
            'name' => 'POS.JAPONESA (ASIA)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            412 => 
            array (
                'id' => 413,
                'afip_code' => '55000003424',
            'name' => 'POS.JAPONESA (ASIA)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            413 => 
            array (
                'id' => 414,
                'afip_code' => '50000003449',
                'name' => 'MACAO',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            414 => 
            array (
                'id' => 415,
                'afip_code' => '51600003449',
                'name' => 'MACAO',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            415 => 
            array (
                'id' => 416,
                'afip_code' => '55000003440',
                'name' => 'MACAO',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            416 => 
            array (
                'id' => 417,
                'afip_code' => '50000003457',
                'name' => 'BANGLADESH',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            417 => 
            array (
                'id' => 418,
                'afip_code' => '51600003457',
                'name' => 'BANGLADESH',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            418 => 
            array (
                'id' => 419,
                'afip_code' => '55000003459',
                'name' => 'BANGLADESH',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            419 => 
            array (
                'id' => 420,
                'afip_code' => '50000003503',
                'name' => 'TURQUIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            420 => 
            array (
                'id' => 421,
                'afip_code' => '51600003503',
                'name' => 'TURQUIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            421 => 
            array (
                'id' => 422,
                'afip_code' => '55000003505',
                'name' => 'TURQUIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            422 => 
            array (
                'id' => 423,
                'afip_code' => '50000003546',
                'name' => 'ITALIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            423 => 
            array (
                'id' => 424,
                'afip_code' => '51600003546',
                'name' => 'ITALIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            424 => 
            array (
                'id' => 425,
                'afip_code' => '55000003548',
                'name' => 'ITALIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            425 => 
            array (
                'id' => 426,
                'afip_code' => '50000003554',
                'name' => 'TURKMENISTAN',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            426 => 
            array (
                'id' => 427,
                'afip_code' => '51600003554',
                'name' => 'TURKMENISTAN',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            427 => 
            array (
                'id' => 428,
                'afip_code' => '55000003556',
                'name' => 'TURKMENISTAN',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            428 => 
            array (
                'id' => 429,
                'afip_code' => '50000003562',
                'name' => 'UZBEKISTAN',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            429 => 
            array (
                'id' => 430,
                'afip_code' => '51600003562',
                'name' => 'UZBEKISTAN',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            430 => 
            array (
                'id' => 431,
                'afip_code' => '55000003564',
                'name' => 'UZBEKISTAN',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            431 => 
            array (
                'id' => 432,
                'afip_code' => '50000003570',
                'name' => 'TERRITORIOS AUTONOMOS PALESTINOS',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            432 => 
            array (
                'id' => 433,
                'afip_code' => '51600003570',
                'name' => 'TERRITORIOS AUTONOMOS PALESTINOS',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            433 => 
            array (
                'id' => 434,
                'afip_code' => '55000003572',
                'name' => 'TERRITORIOS AUTONOMOS PALESTINOS',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            434 => 
            array (
                'id' => 435,
                'afip_code' => '50000003813',
                'name' => 'ISLANDIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            435 => 
            array (
                'id' => 436,
                'afip_code' => '51600003813',
                'name' => 'ISLANDIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            436 => 
            array (
                'id' => 437,
                'afip_code' => '55000003815',
                'name' => 'ISLANDIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            437 => 
            array (
                'id' => 438,
                'afip_code' => '50000003880',
                'name' => 'GEORGIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            438 => 
            array (
                'id' => 439,
                'afip_code' => '51600003880',
                'name' => 'GEORGIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            439 => 
            array (
                'id' => 440,
                'afip_code' => '55000003882',
                'name' => 'GEORGIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            440 => 
            array (
                'id' => 441,
                'afip_code' => '50000003899',
                'name' => 'TAYIKISTAN',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            441 => 
            array (
                'id' => 442,
                'afip_code' => '51600003899',
                'name' => 'TAYIKISTAN',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            442 => 
            array (
                'id' => 443,
                'afip_code' => '55000003890',
                'name' => 'TAYIKISTAN',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            443 => 
            array (
                'id' => 444,
                'afip_code' => '50000003902',
                'name' => 'AZERBAIDZHAN',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            444 => 
            array (
                'id' => 445,
                'afip_code' => '51600003902',
                'name' => 'AZERBAIDZHAN',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            445 => 
            array (
                'id' => 446,
                'afip_code' => '55000003904',
                'name' => 'AZERBAIDZHAN',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            446 => 
            array (
                'id' => 447,
                'afip_code' => '50000003910',
            'name' => 'BRUNEI DARUSSALAM (Estado independiente)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            447 => 
            array (
                'id' => 448,
                'afip_code' => '51600003910',
            'name' => 'BRUNEI DARUSSALAM (Estado independiente)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            448 => 
            array (
                'id' => 449,
                'afip_code' => '55000003912',
            'name' => 'BRUNEI DARUSSALAM (Estado independiente)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            449 => 
            array (
                'id' => 450,
                'afip_code' => '50000003929',
                'name' => 'KAZAJSTAN',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            450 => 
            array (
                'id' => 451,
                'afip_code' => '51600003929',
                'name' => 'KAZAJSTAN',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            451 => 
            array (
                'id' => 452,
                'afip_code' => '55000003920',
                'name' => 'KAZAJSTAN',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            452 => 
            array (
                'id' => 453,
                'afip_code' => '50000003937',
                'name' => 'KIRGUISTAN',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            453 => 
            array (
                'id' => 454,
                'afip_code' => '51600003937',
                'name' => 'KIRGUISTAN',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            454 => 
            array (
                'id' => 455,
                'afip_code' => '55000003939',
                'name' => 'KIRGUISTAN',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            455 => 
            array (
                'id' => 456,
                'afip_code' => '50000003961',
            'name' => 'INDETERMINADO (ASIA)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            456 => 
            array (
                'id' => 457,
                'afip_code' => '51600003961',
            'name' => 'INDETERMINADO (ASIA)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            457 => 
            array (
                'id' => 458,
                'afip_code' => '55000003963',
            'name' => 'INDETERMINADO (ASIA)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            458 => 
            array (
                'id' => 459,
                'afip_code' => '50000004011',
                'name' => 'REPUBLICA DE ALBANIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            459 => 
            array (
                'id' => 460,
                'afip_code' => '51600004011',
                'name' => 'REPUBLICA DE ALBANIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            460 => 
            array (
                'id' => 461,
                'afip_code' => '55000004013',
                'name' => 'REPUBLICA DE ALBANIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            461 => 
            array (
                'id' => 462,
                'afip_code' => '50000004046',
                'name' => 'PRINCIPADO DEL VALLE DE ANDORRA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            462 => 
            array (
                'id' => 463,
                'afip_code' => '51600004046',
                'name' => 'PRINCIPADO DEL VALLE DE ANDORRA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            463 => 
            array (
                'id' => 464,
                'afip_code' => '55000004048',
                'name' => 'PRINCIPADO DEL VALLE DE ANDORRA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            464 => 
            array (
                'id' => 465,
                'afip_code' => '50000004054',
                'name' => 'AUSTRIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            465 => 
            array (
                'id' => 466,
                'afip_code' => '51600004054',
                'name' => 'AUSTRIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            466 => 
            array (
                'id' => 467,
                'afip_code' => '55000004056',
                'name' => 'AUSTRIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            467 => 
            array (
                'id' => 468,
                'afip_code' => '50000004062',
                'name' => 'BELGICA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            468 => 
            array (
                'id' => 469,
                'afip_code' => '51600004062',
                'name' => 'BELGICA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            469 => 
            array (
                'id' => 470,
                'afip_code' => '55000004064',
                'name' => 'BELGICA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            470 => 
            array (
                'id' => 471,
                'afip_code' => '50000004070',
                'name' => 'BULGARIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            471 => 
            array (
                'id' => 472,
                'afip_code' => '51600004070',
                'name' => 'BULGARIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            472 => 
            array (
                'id' => 473,
                'afip_code' => '55000004072',
                'name' => 'BULGARIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            473 => 
            array (
                'id' => 474,
                'afip_code' => '50000004097',
                'name' => 'DINAMARCA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            474 => 
            array (
                'id' => 475,
                'afip_code' => '51600004097',
                'name' => 'DINAMARCA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            475 => 
            array (
                'id' => 476,
                'afip_code' => '55000004099',
                'name' => 'DINAMARCA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            476 => 
            array (
                'id' => 477,
                'afip_code' => '50000004100',
                'name' => 'ESPAÑA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            477 => 
            array (
                'id' => 478,
                'afip_code' => '51600004100',
                'name' => 'ESPAÑA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            478 => 
            array (
                'id' => 479,
                'afip_code' => '55000004102',
                'name' => 'ESPAÑA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            479 => 
            array (
                'id' => 480,
                'afip_code' => '50000004119',
                'name' => 'FINLANDIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            480 => 
            array (
                'id' => 481,
                'afip_code' => '51600004119',
                'name' => 'FINLANDIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            481 => 
            array (
                'id' => 482,
                'afip_code' => '55000004110',
                'name' => 'FINLANDIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            482 => 
            array (
                'id' => 483,
                'afip_code' => '50000004127',
                'name' => 'FRANCIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            483 => 
            array (
                'id' => 484,
                'afip_code' => '51600004127',
                'name' => 'FRANCIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            484 => 
            array (
                'id' => 485,
                'afip_code' => '55000004129',
                'name' => 'FRANCIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            485 => 
            array (
                'id' => 486,
                'afip_code' => '50000004135',
                'name' => 'GRECIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            486 => 
            array (
                'id' => 487,
                'afip_code' => '51600004135',
                'name' => 'GRECIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            487 => 
            array (
                'id' => 488,
                'afip_code' => '55000004137',
                'name' => 'GRECIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            488 => 
            array (
                'id' => 489,
                'afip_code' => '50000004143',
                'name' => 'HUNGRIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            489 => 
            array (
                'id' => 490,
                'afip_code' => '51600004143',
                'name' => 'HUNGRIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            490 => 
            array (
                'id' => 491,
                'afip_code' => '55000004145',
                'name' => 'HUNGRIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            491 => 
            array (
                'id' => 492,
                'afip_code' => '50000004151',
            'name' => 'IRLANDA (EIRE)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            492 => 
            array (
                'id' => 493,
                'afip_code' => '51600004151',
            'name' => 'IRLANDA (EIRE)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            493 => 
            array (
                'id' => 494,
                'afip_code' => '55000004153',
            'name' => 'IRLANDA (EIRE)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            494 => 
            array (
                'id' => 495,
                'afip_code' => '50000004186',
            'name' => 'PRINCIPADO DE LIECHTENSTEIN (Estado independiente)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            495 => 
            array (
                'id' => 496,
                'afip_code' => '51600004186',
            'name' => 'PRINCIPADO DE LIECHTENSTEIN (Estado independiente)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            496 => 
            array (
                'id' => 497,
                'afip_code' => '55000004188',
            'name' => 'PRINCIPADO DE LIECHTENSTEIN (Estado independiente)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            497 => 
            array (
                'id' => 498,
                'afip_code' => '50000004194',
                'name' => 'GRAN DUCADO DE LUXEMBURGO',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            498 => 
            array (
                'id' => 499,
                'afip_code' => '51600004194',
                'name' => 'GRAN DUCADO DE LUXEMBURGO',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            499 => 
            array (
                'id' => 500,
                'afip_code' => '55000004196',
                'name' => 'GRAN DUCADO DE LUXEMBURGO',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        \DB::table('cuit_sujetos')->insert(array (
            0 => 
            array (
                'id' => 501,
                'afip_code' => '50000004216',
                'name' => 'PRINCIPADO DE MONACO',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 502,
                'afip_code' => '51600004216',
                'name' => 'PRINCIPADO DE MONACO',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 503,
                'afip_code' => '55000004218',
                'name' => 'PRINCIPADO DE MONACO',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 504,
                'afip_code' => '50000004224',
                'name' => 'NORUEGA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 505,
                'afip_code' => '51600004224',
                'name' => 'NORUEGA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 506,
                'afip_code' => '55000004226',
                'name' => 'NORUEGA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 507,
                'afip_code' => '50000004232',
                'name' => 'PAISES BAJOS',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 508,
                'afip_code' => '51600004232',
                'name' => 'PAISES BAJOS',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 509,
                'afip_code' => '55000004234',
                'name' => 'PAISES BAJOS',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 510,
                'afip_code' => '50000004240',
                'name' => 'POLONIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 511,
                'afip_code' => '51600004240',
                'name' => 'POLONIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 512,
                'afip_code' => '55000004242',
                'name' => 'POLONIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 513,
                'afip_code' => '50000004259',
                'name' => 'PORTUGAL',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 514,
                'afip_code' => '51600004259',
                'name' => 'PORTUGAL',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 515,
                'afip_code' => '55000004250',
                'name' => 'PORTUGAL',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 516,
                'afip_code' => '50000004267',
                'name' => 'REINO UNIDO',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 517,
                'afip_code' => '51600004267',
                'name' => 'REINO UNIDO',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 518,
                'afip_code' => '55000004269',
                'name' => 'REINO UNIDO',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 519,
                'afip_code' => '50000004275',
                'name' => 'RUMANIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 520,
                'afip_code' => '51600004275',
                'name' => 'RUMANIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 521,
                'afip_code' => '55000004277',
                'name' => 'RUMANIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 522,
                'afip_code' => '50000004283',
            'name' => 'SERENISIMA REPUBLICA DE SAN MARINO (Estado independiente)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 523,
                'afip_code' => '51600004283',
            'name' => 'SERENISIMA REPUBLICA DE SAN MARINO (Estado independiente)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 524,
                'afip_code' => '55000004285',
            'name' => 'SERENISIMA REPUBLICA DE SAN MARINO (Estado independiente)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 525,
                'afip_code' => '50000004291',
                'name' => 'SUECIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 526,
                'afip_code' => '51600004291',
                'name' => 'SUECIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 527,
                'afip_code' => '55000004293',
                'name' => 'SUECIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 528,
                'afip_code' => '50000004305',
                'name' => 'SUIZA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 529,
                'afip_code' => '51600004305',
                'name' => 'SUIZA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 530,
                'afip_code' => '55000004307',
                'name' => 'SUIZA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 531,
                'afip_code' => '50000004313',
            'name' => 'SANTA SEDE (VATICANO)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 532,
                'afip_code' => '51600004313',
            'name' => 'SANTA SEDE (VATICANO)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 533,
                'afip_code' => '55000004315',
            'name' => 'SANTA SEDE (VATICANO)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 534,
                'afip_code' => '50000004321',
                'name' => 'YUGOSLAVIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 535,
                'afip_code' => '51600004321',
                'name' => 'YUGOSLAVIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 536,
                'afip_code' => '55000004323',
                'name' => 'YUGOSLAVIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 537,
                'afip_code' => '50000004364',
            'name' => 'REPUBLICA DE MALTA (Estado independiente)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 538,
                'afip_code' => '51600004364',
            'name' => 'REPUBLICA DE MALTA (Estado independiente)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 539,
                'afip_code' => '55000004366',
            'name' => 'REPUBLICA DE MALTA (Estado independiente)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 540,
                'afip_code' => '50000004380',
                'name' => 'ALEMANIA, REP. FED.',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 541,
                'afip_code' => '51600004380',
                'name' => 'ALEMANIA, REP. FED.',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 542,
                'afip_code' => '55000004382',
                'name' => 'ALEMANIA, REP. FED.',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 543,
                'afip_code' => '50000004399',
                'name' => 'BIELORUSIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 544,
                'afip_code' => '51600004399',
                'name' => 'BIELORUSIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 545,
                'afip_code' => '55000004390',
                'name' => 'BIELORUSIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 546,
                'afip_code' => '50000004402',
                'name' => 'ESTONIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 547,
                'afip_code' => '51600004402',
                'name' => 'ESTONIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 548,
                'afip_code' => '55000004404',
                'name' => 'ESTONIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 549,
                'afip_code' => '50000004410',
                'name' => 'LETONIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 550,
                'afip_code' => '51600004410',
                'name' => 'LETONIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 551,
                'afip_code' => '55000004412',
                'name' => 'LETONIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 552,
                'afip_code' => '50000004429',
                'name' => 'LITUANIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 553,
                'afip_code' => '51600004429',
                'name' => 'LITUANIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 554,
                'afip_code' => '55000004420',
                'name' => 'LITUANIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 555,
                'afip_code' => '50000004437',
                'name' => 'MOLDOVA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 556,
                'afip_code' => '51600004437',
                'name' => 'MOLDOVA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 557,
                'afip_code' => '55000004439',
                'name' => 'MOLDOVA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 558,
                'afip_code' => '50000004461',
                'name' => 'BOSNIA HERZEGOVINA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 559,
                'afip_code' => '51600004461',
                'name' => 'BOSNIA HERZEGOVINA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 560,
                'afip_code' => '55000004463',
                'name' => 'BOSNIA HERZEGOVINA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 561,
                'afip_code' => '50000004496',
                'name' => 'ESLOVENIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 562,
                'afip_code' => '51600004496',
                'name' => 'ESLOVENIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 563,
                'afip_code' => '55000004498',
                'name' => 'ESLOVENIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 564,
                'afip_code' => '50000004909',
                'name' => 'MACEDONIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 565,
                'afip_code' => '51600004909',
                'name' => 'MACEDONIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 566,
                'afip_code' => '55000004900',
                'name' => 'MACEDONIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 567,
                'afip_code' => '50000004917',
            'name' => 'POS.BRITANICA (EUROPA)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 568,
                'afip_code' => '51600004917',
            'name' => 'POS.BRITANICA (EUROPA)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 569,
                'afip_code' => '55000004919',
            'name' => 'POS.BRITANICA (EUROPA)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 570,
                'afip_code' => '50000004984',
            'name' => 'INDETERMINADO (EUROPA)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 571,
                'afip_code' => '51600004984',
            'name' => 'INDETERMINADO (EUROPA)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 572,
                'afip_code' => '55000004986',
            'name' => 'INDETERMINADO (EUROPA)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 573,
                'afip_code' => '50000004992',
                'name' => 'AUSTRALIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 574,
                'afip_code' => '51600004992',
                'name' => 'AUSTRALIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 575,
                'afip_code' => '55000004994',
                'name' => 'AUSTRALIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 576,
                'afip_code' => '50000005034',
            'name' => 'REPUBLICA DE NAURU (Estado independiente)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 577,
                'afip_code' => '51600005034',
            'name' => 'REPUBLICA DE NAURU (Estado independiente)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 578,
                'afip_code' => '55000005036',
            'name' => 'REPUBLICA DE NAURU (Estado independiente)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 579,
                'afip_code' => '50000005042',
                'name' => 'NUEVA ZELANDA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 580,
                'afip_code' => '51600005042',
                'name' => 'NUEVA ZELANDA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 581,
                'afip_code' => '55000005044',
                'name' => 'NUEVA ZELANDA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 582,
                'afip_code' => '50000005050',
                'name' => 'REPUBLICA DE VANUATU',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 583,
                'afip_code' => '51600005050',
                'name' => 'REPUBLICA DE VANUATU',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 584,
                'afip_code' => '55000005052',
                'name' => 'REPUBLICA DE VANUATU',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 585,
                'afip_code' => '50000005069',
                'name' => 'SAMOA OCCIDENTAL',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 586,
                'afip_code' => '51600005069',
                'name' => 'SAMOA OCCIDENTAL',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 587,
                'afip_code' => '55000005069',
                'name' => 'SAMOA OCCIDENTAL',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'id' => 588,
                'afip_code' => '50000005077',
            'name' => 'POS.AUSTRALIANA (OCEANIA)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            88 => 
            array (
                'id' => 589,
                'afip_code' => '51600005077',
            'name' => 'POS.AUSTRALIANA (OCEANIA)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'id' => 590,
                'afip_code' => '55000005079',
            'name' => 'POS.AUSTRALIANA (OCEANIA)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'id' => 591,
                'afip_code' => '50000005085',
            'name' => 'POS.BRITANICA (OCEANIA)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            91 => 
            array (
                'id' => 592,
                'afip_code' => '51600005085',
            'name' => 'POS.BRITANICA (OCEANIA)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            92 => 
            array (
                'id' => 593,
                'afip_code' => '55000005087',
            'name' => 'POS.BRITANICA (OCEANIA)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            93 => 
            array (
                'id' => 594,
                'afip_code' => '50000005093',
            'name' => 'POS.FRANCESA (OCEANIA)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            94 => 
            array (
                'id' => 595,
                'afip_code' => '51600005093',
            'name' => 'POS.FRANCESA (OCEANIA)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            95 => 
            array (
                'id' => 596,
                'afip_code' => '55000005095',
            'name' => 'POS.FRANCESA (OCEANIA)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            96 => 
            array (
                'id' => 597,
                'afip_code' => '50000005107',
            'name' => 'POS.NEOCELANDESA (OCEANIA)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            97 => 
            array (
                'id' => 598,
                'afip_code' => '51600005107',
            'name' => 'POS.NEOCELANDESA (OCEANIA)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            98 => 
            array (
                'id' => 599,
                'afip_code' => '55000005109',
            'name' => 'POS.NEOCELANDESA (OCEANIA)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            99 => 
            array (
                'id' => 600,
                'afip_code' => '50000005115',
            'name' => 'POS.E.E.U.U. (OCEANIA)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            100 => 
            array (
                'id' => 601,
                'afip_code' => '51600005115',
            'name' => 'POS.E.E.U.U. (OCEANIA)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            101 => 
            array (
                'id' => 602,
                'afip_code' => '55000005117',
            'name' => 'POS.E.E.U.U. (OCEANIA)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            102 => 
            array (
                'id' => 603,
                'afip_code' => '50000005123',
                'name' => 'FIJI, ISLAS',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            103 => 
            array (
                'id' => 604,
                'afip_code' => '51600005123',
                'name' => 'FIJI, ISLAS',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            104 => 
            array (
                'id' => 605,
                'afip_code' => '55000005125',
                'name' => 'FIJI, ISLAS',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            105 => 
            array (
                'id' => 606,
                'afip_code' => '50000005131',
                'name' => 'PAPUA, ISLAS',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            106 => 
            array (
                'id' => 607,
                'afip_code' => '51600005131',
                'name' => 'PAPUA, ISLAS',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            107 => 
            array (
                'id' => 608,
                'afip_code' => '55000005133',
                'name' => 'PAPUA, ISLAS',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            108 => 
            array (
                'id' => 609,
                'afip_code' => '50000005166',
                'name' => 'KIRIBATI',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            109 => 
            array (
                'id' => 610,
                'afip_code' => '51600005166',
                'name' => 'KIRIBATI',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            110 => 
            array (
                'id' => 611,
                'afip_code' => '55000005168',
                'name' => 'KIRIBATI',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            111 => 
            array (
                'id' => 612,
                'afip_code' => '50000005174',
                'name' => 'TUVALU',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            112 => 
            array (
                'id' => 613,
                'afip_code' => '51600005174',
                'name' => 'TUVALU',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            113 => 
            array (
                'id' => 614,
                'afip_code' => '55000005176',
                'name' => 'TUVALU',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            114 => 
            array (
                'id' => 615,
                'afip_code' => '50000005182',
                'name' => 'ISLAS SALOMON',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            115 => 
            array (
                'id' => 616,
                'afip_code' => '51600005182',
                'name' => 'ISLAS SALOMON',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            116 => 
            array (
                'id' => 617,
                'afip_code' => '55000005184',
                'name' => 'ISLAS SALOMON',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            117 => 
            array (
                'id' => 618,
                'afip_code' => '50000005190',
            'name' => 'REINO DE TONGA (Estado independiente)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            118 => 
            array (
                'id' => 619,
                'afip_code' => '51600005190',
            'name' => 'REINO DE TONGA (Estado independiente)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            119 => 
            array (
                'id' => 620,
                'afip_code' => '55000005192',
            'name' => 'REINO DE TONGA (Estado independiente)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            120 => 
            array (
                'id' => 621,
                'afip_code' => '50000005204',
            'name' => 'REPUBLICA DE LAS ISLAS MARSHALL (Estado independiente)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            121 => 
            array (
                'id' => 622,
                'afip_code' => '51600005204',
            'name' => 'REPUBLICA DE LAS ISLAS MARSHALL (Estado independiente)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            122 => 
            array (
                'id' => 623,
                'afip_code' => '55000005206',
            'name' => 'REPUBLICA DE LAS ISLAS MARSHALL (Estado independiente)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            123 => 
            array (
                'id' => 624,
                'afip_code' => '50000005212',
                'name' => 'ISLAS MARIANAS',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            124 => 
            array (
                'id' => 625,
                'afip_code' => '51600005212',
                'name' => 'ISLAS MARIANAS',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            125 => 
            array (
                'id' => 626,
                'afip_code' => '55000005214',
                'name' => 'ISLAS MARIANAS',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            126 => 
            array (
                'id' => 627,
                'afip_code' => '50000005905',
                'name' => 'MICRONESIA ESTADOS FED.',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            127 => 
            array (
                'id' => 628,
                'afip_code' => '51600005905',
                'name' => 'MICRONESIA ESTADOS FEDERADOS',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            128 => 
            array (
                'id' => 629,
                'afip_code' => '55000005907',
                'name' => 'MICRONESIA ESTADOS FED.',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            129 => 
            array (
                'id' => 630,
                'afip_code' => '50000005913',
                'name' => 'PALAU',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            130 => 
            array (
                'id' => 631,
                'afip_code' => '51600005913',
                'name' => 'PALAU',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            131 => 
            array (
                'id' => 632,
                'afip_code' => '55000005915',
                'name' => 'PALAU',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            132 => 
            array (
                'id' => 633,
                'afip_code' => '50000005980',
            'name' => 'INDETERMINADO (OCEANIA)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            133 => 
            array (
                'id' => 634,
                'afip_code' => '51600005980',
            'name' => 'INDETERMINADO (OCEANIA)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            134 => 
            array (
                'id' => 635,
                'afip_code' => '55000005982',
            'name' => 'INDETERMINADO (OCEANIA)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            135 => 
            array (
                'id' => 636,
                'afip_code' => '50000006014',
                'name' => 'RUSA, FEDERACION',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            136 => 
            array (
                'id' => 637,
                'afip_code' => '51600006014',
                'name' => 'RUSA, FEDERACION',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            137 => 
            array (
                'id' => 638,
                'afip_code' => '55000006016',
                'name' => 'RUSA, FEDERACION',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            138 => 
            array (
                'id' => 639,
                'afip_code' => '50000006022',
                'name' => 'ARMENIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            139 => 
            array (
                'id' => 640,
                'afip_code' => '51600006022',
                'name' => 'ARMENIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            140 => 
            array (
                'id' => 641,
                'afip_code' => '55000006024',
                'name' => 'ARMENIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            141 => 
            array (
                'id' => 642,
                'afip_code' => '50000006030',
                'name' => 'CROACIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            142 => 
            array (
                'id' => 643,
                'afip_code' => '51600006030',
                'name' => 'CROACIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            143 => 
            array (
                'id' => 644,
                'afip_code' => '55000006032',
                'name' => 'CROACIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            144 => 
            array (
                'id' => 645,
                'afip_code' => '50000006049',
                'name' => 'UCRANIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            145 => 
            array (
                'id' => 646,
                'afip_code' => '51600006049',
                'name' => 'UCRANIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            146 => 
            array (
                'id' => 647,
                'afip_code' => '55000006040',
                'name' => 'UCRANIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            147 => 
            array (
                'id' => 648,
                'afip_code' => '50000006057',
                'name' => 'CHECA, REPUBLICA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            148 => 
            array (
                'id' => 649,
                'afip_code' => '51600006057',
                'name' => 'CHECA, REPUBLICA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            149 => 
            array (
                'id' => 650,
                'afip_code' => '55000006059',
                'name' => 'CHECA, REPUBLICA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            150 => 
            array (
                'id' => 651,
                'afip_code' => '50000006065',
                'name' => 'ESLOVACA, REPUBLICA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            151 => 
            array (
                'id' => 652,
                'afip_code' => '51600006065',
                'name' => 'ESLOVACA, REPUBLICA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            152 => 
            array (
                'id' => 653,
                'afip_code' => '55000006067',
                'name' => 'ESLOVACA, REPUBLICA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            153 => 
            array (
                'id' => 654,
                'afip_code' => '50000006529',
            'name' => 'ANGUILA (Territorio no autónomo del Reino Unido)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            154 => 
            array (
                'id' => 655,
                'afip_code' => '51600006529',
            'name' => 'ANGUILA (Territorio no autónomo del Reino Unido)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            155 => 
            array (
                'id' => 656,
                'afip_code' => '55000006520',
            'name' => 'ANGUILA (Territorio no autónomo del Reino Unido)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            156 => 
            array (
                'id' => 657,
                'afip_code' => '50000006537',
            'name' => 'ARUBA (Territorio de Países Bajos)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            157 => 
            array (
                'id' => 658,
                'afip_code' => '51600006537',
            'name' => 'ARUBA (Territorio de Países Bajos)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            158 => 
            array (
                'id' => 659,
                'afip_code' => '55000006539',
            'name' => 'ARUBA (Territorio de Países Bajos)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            159 => 
            array (
                'id' => 660,
                'afip_code' => '50000006545',
            'name' => 'ISLAS DE COOK (Territorio autónomo asociado a Nueva Zelanda)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            160 => 
            array (
                'id' => 661,
                'afip_code' => '51600006545',
            'name' => 'ISLAS DE COOK (Territorio autónomo asociado a Nueva Zelanda)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            161 => 
            array (
                'id' => 662,
                'afip_code' => '55000006547',
            'name' => 'ISLAS DE COOK (Territorio autónomo asociado a Nueva Zelanda)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            162 => 
            array (
                'id' => 663,
                'afip_code' => '50000006553',
                'name' => 'PATAU',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            163 => 
            array (
                'id' => 664,
                'afip_code' => '51600006553',
                'name' => 'PATAU',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            164 => 
            array (
                'id' => 665,
                'afip_code' => '55000006555',
                'name' => 'PATAU',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            165 => 
            array (
                'id' => 666,
                'afip_code' => '50000006561',
            'name' => 'POLINESIA FRANCESA (Territorio de Ultramar de Francia)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            166 => 
            array (
                'id' => 667,
                'afip_code' => '51600006561',
            'name' => 'POLINESIA FRANCESA (Territorio de Ultramar de Francia)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            167 => 
            array (
                'id' => 668,
                'afip_code' => '55000006563',
            'name' => 'POLINESIA FRANCESA (Territorio de Ultramar de Francia)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            168 => 
            array (
                'id' => 669,
                'afip_code' => '50000006596',
            'name' => 'ANTILLAS HOLANDESAS (Territorio de Países Bajos)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            169 => 
            array (
                'id' => 670,
                'afip_code' => '51600006596',
            'name' => 'ANTILLAS HOLANDESAS (Territorio de Países Bajos)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            170 => 
            array (
                'id' => 671,
                'afip_code' => '55000006598',
            'name' => 'ANTILLAS HOLANDESAS (Territorio de Países Bajos)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            171 => 
            array (
                'id' => 672,
                'afip_code' => '50000006626',
                'name' => 'ASCENCION',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            172 => 
            array (
                'id' => 673,
                'afip_code' => '51600006626',
                'name' => 'ASCENCION',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            173 => 
            array (
                'id' => 674,
                'afip_code' => '55000006628',
                'name' => 'ASCENCION',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            174 => 
            array (
                'id' => 675,
                'afip_code' => '50000006634',
            'name' => 'BERMUDAS (Territorio no autónomo del Reino Unido)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            175 => 
            array (
                'id' => 676,
                'afip_code' => '51600006634',
            'name' => 'BERMUDAS (Territorio no autónomo del Reino Unido)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            176 => 
            array (
                'id' => 677,
                'afip_code' => '55000006636',
            'name' => 'BERMUDAS (Territorio no autónomo del Reino Unido)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            177 => 
            array (
                'id' => 678,
                'afip_code' => '50000006642',
                'name' => 'CAMPIONE D@ITALIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            178 => 
            array (
                'id' => 679,
                'afip_code' => '51600006642',
                'name' => 'CAMPIONE D@ITALIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            179 => 
            array (
                'id' => 680,
                'afip_code' => '55000006644',
                'name' => 'CAMPIONE D@ITALIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            180 => 
            array (
                'id' => 681,
                'afip_code' => '50000006650',
                'name' => 'COLONIA DE GIBRALTAR',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            181 => 
            array (
                'id' => 682,
                'afip_code' => '51600006650',
                'name' => 'COLONIA DE GIBRALTAR',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            182 => 
            array (
                'id' => 683,
                'afip_code' => '55000006652',
                'name' => 'COLONIA DE GIBRALTAR',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            183 => 
            array (
                'id' => 684,
                'afip_code' => '50000006669',
                'name' => 'GROENLANDIA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            184 => 
            array (
                'id' => 685,
                'afip_code' => '51600006669',
                'name' => 'GROENLANDIA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            185 => 
            array (
                'id' => 686,
                'afip_code' => '55000006660',
                'name' => 'GROENLANDIA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            186 => 
            array (
                'id' => 687,
                'afip_code' => '50000006677',
            'name' => 'GUAM (Territorio no autónomo de los EEUU)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            187 => 
            array (
                'id' => 688,
                'afip_code' => '51600006677',
            'name' => 'GUAM (Territorio no autónomo de los EEUU)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            188 => 
            array (
                'id' => 689,
                'afip_code' => '55000006679',
            'name' => 'GUAM (Territorio no autónomo de los EEUU)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            189 => 
            array (
                'id' => 690,
                'afip_code' => '50000006685',
            'name' => 'HONK KONG (Territorio de China)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            190 => 
            array (
                'id' => 691,
                'afip_code' => '51600006685',
            'name' => 'HONK KONG (Territorio de China)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            191 => 
            array (
                'id' => 692,
                'afip_code' => '55000006687',
            'name' => 'HONK KONG (Territorio de China)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            192 => 
            array (
                'id' => 693,
                'afip_code' => '50000006693',
                'name' => 'ISLAS AZORES',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            193 => 
            array (
                'id' => 694,
                'afip_code' => '51600006693',
                'name' => 'ISLAS AZORES',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            194 => 
            array (
                'id' => 695,
                'afip_code' => '55000006695',
                'name' => 'ISLAS AZORES',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            195 => 
            array (
                'id' => 696,
                'afip_code' => '50000006707',
                'name' => 'ISLAS DEL CANAL:Guernesey,Jersey,Alderney,G.Stark,L.Sark,etc',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            196 => 
            array (
                'id' => 697,
                'afip_code' => '51600006707',
                'name' => 'ISLAS DEL CANAL:Guernesey,Jersey,Alderney,G.Stark,L.Sark,etc',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            197 => 
            array (
                'id' => 698,
                'afip_code' => '55000006709',
                'name' => 'ISLAS DEL CANAL:Guernesey,Jersey,Alderney,G.Stark,L.Sark,etc',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            198 => 
            array (
                'id' => 699,
                'afip_code' => '50000006715',
            'name' => 'ISLAS CAIMAN (Territorio no autónomo del Reino Unido)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            199 => 
            array (
                'id' => 700,
                'afip_code' => '51600006715',
            'name' => 'ISLAS CAIMAN (Territorio no autónomo del Reino Unido)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            200 => 
            array (
                'id' => 701,
                'afip_code' => '55000006717',
            'name' => 'ISLAS CAIMAN (Territorio no autónomo del Reino Unido)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            201 => 
            array (
                'id' => 702,
                'afip_code' => '50000006723',
                'name' => 'ISLA CHRISTMAS',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            202 => 
            array (
                'id' => 703,
                'afip_code' => '51600006723',
                'name' => 'ISLA CHRISTMAS',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            203 => 
            array (
                'id' => 704,
                'afip_code' => '55000006725',
                'name' => 'ISLA CHRISTMAS',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            204 => 
            array (
                'id' => 705,
                'afip_code' => '50000006731',
                'name' => 'ISLA DE COCOS O KEELING',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            205 => 
            array (
                'id' => 706,
                'afip_code' => '51600006731',
                'name' => 'ISLA DE COCOS O KEELING',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            206 => 
            array (
                'id' => 707,
                'afip_code' => '55000006733',
                'name' => 'ISLA DE COCOS O KEELING',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            207 => 
            array (
                'id' => 708,
                'afip_code' => '50000006766',
            'name' => 'ISLA DE MAN (Territorio del Reino Unido)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            208 => 
            array (
                'id' => 709,
                'afip_code' => '51600006766',
            'name' => 'ISLA DE MAN (Territorio del Reino Unido)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            209 => 
            array (
                'id' => 710,
                'afip_code' => '55000006768',
            'name' => 'ISLA DE MAN (Territorio del Reino Unido)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            210 => 
            array (
                'id' => 711,
                'afip_code' => '50000006774',
                'name' => 'ISLA DE NORFOLK',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            211 => 
            array (
                'id' => 712,
                'afip_code' => '51600006774',
                'name' => 'ISLA DE NORFOLK',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            212 => 
            array (
                'id' => 713,
                'afip_code' => '55000006776',
                'name' => 'ISLA DE NORFOLK',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            213 => 
            array (
                'id' => 714,
                'afip_code' => '50000006782',
            'name' => 'ISLAS TURKAS Y CAICOS (Territorio no autónomo del R. Unido)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            214 => 
            array (
                'id' => 715,
                'afip_code' => '51600006782',
            'name' => 'ISLAS TURKAS Y CAICOS (Territorio no autónomo del R. Unido)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            215 => 
            array (
                'id' => 716,
                'afip_code' => '55000006784',
            'name' => 'ISLAS TURKAS Y CAICOS (Territorio no autónomo del R. Unido)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            216 => 
            array (
                'id' => 717,
                'afip_code' => '50000006790',
                'name' => 'ISLAS PACIFICO',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            217 => 
            array (
                'id' => 718,
                'afip_code' => '51600006790',
                'name' => 'ISLAS PACIFICO',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            218 => 
            array (
                'id' => 719,
                'afip_code' => '55000006792',
                'name' => 'ISLAS PACIFICO',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            219 => 
            array (
                'id' => 720,
                'afip_code' => '50000006804',
                'name' => 'ISLA DE SAN PEDRO Y MIGUELON',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            220 => 
            array (
                'id' => 721,
                'afip_code' => '51600006804',
                'name' => 'ISLA DE SAN PEDRO Y MIGUELON',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            221 => 
            array (
                'id' => 722,
                'afip_code' => '55000006806',
                'name' => 'ISLA DE SAN PEDRO Y MIGUELON',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            222 => 
            array (
                'id' => 723,
                'afip_code' => '50000006812',
                'name' => 'ISLA QESHM',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            223 => 
            array (
                'id' => 724,
                'afip_code' => '51600006812',
                'name' => 'ISLA QESHM',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            224 => 
            array (
                'id' => 725,
                'afip_code' => '55000006814',
                'name' => 'ISLA QESHM',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            225 => 
            array (
                'id' => 726,
                'afip_code' => '50000006820',
            'name' => 'ISLAS VIRGENES BRITANICAS(Territorio no autónomo de R.UNIDO)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            226 => 
            array (
                'id' => 727,
                'afip_code' => '51600006820',
            'name' => 'ISLAS VIRGENES BRITANICAS(Territorio no autónomo de R.UNIDO)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            227 => 
            array (
                'id' => 728,
                'afip_code' => '55000006822',
            'name' => 'ISLAS VIRGENES BRITANICAS(Territorio no autónomo de R.UNIDO)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            228 => 
            array (
                'id' => 729,
                'afip_code' => '50000006839',
                'name' => 'ISLAS VIRGENES DE ESTADOS UNIDOS DE AMERICA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            229 => 
            array (
                'id' => 730,
                'afip_code' => '51600006839',
                'name' => 'ISLAS VIRGENES DE ESTADOS UNIDOS DE AMERICA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            230 => 
            array (
                'id' => 731,
                'afip_code' => '55000006830',
                'name' => 'ISLAS VIRGENES DE ESTADOS UNIDOS DE AMERICA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            231 => 
            array (
                'id' => 732,
                'afip_code' => '50000006847',
                'name' => 'LABUAN',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            232 => 
            array (
                'id' => 733,
                'afip_code' => '51600006847',
                'name' => 'LABUAN',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            233 => 
            array (
                'id' => 734,
                'afip_code' => '55000006849',
                'name' => 'LABUAN',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            234 => 
            array (
                'id' => 735,
                'afip_code' => '50000006855',
            'name' => 'MADEIRA (Territorio de Portugal)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            235 => 
            array (
                'id' => 736,
                'afip_code' => '51600006855',
            'name' => 'MADEIRA (Territorio de Portugal)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            236 => 
            array (
                'id' => 737,
                'afip_code' => '55000006857',
            'name' => 'MADEIRA (Territorio de Portugal)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            237 => 
            array (
                'id' => 738,
                'afip_code' => '50000006863',
            'name' => 'MONTSERRAT (Territorio no autónomo del Reino Unido)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            238 => 
            array (
                'id' => 739,
                'afip_code' => '51600006863',
            'name' => 'MONTSERRAT (Territorio no autónomo del Reino Unido)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            239 => 
            array (
                'id' => 740,
                'afip_code' => '55000006865',
            'name' => 'MONTSERRAT (Territorio no autónomo del Reino Unido)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            240 => 
            array (
                'id' => 741,
                'afip_code' => '50000006871',
                'name' => 'NIUE',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            241 => 
            array (
                'id' => 742,
                'afip_code' => '51600006871',
                'name' => 'NIUE',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            242 => 
            array (
                'id' => 743,
                'afip_code' => '55000006873',
                'name' => 'NIUE',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            243 => 
            array (
                'id' => 744,
                'afip_code' => '50000006901',
                'name' => 'PITCAIRN',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            244 => 
            array (
                'id' => 745,
                'afip_code' => '51600006901',
                'name' => 'PITCAIRN',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            245 => 
            array (
                'id' => 746,
                'afip_code' => '55000006903',
                'name' => 'PITCAIRN',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            246 => 
            array (
                'id' => 747,
                'afip_code' => '50000006936',
            'name' => 'REGIMEN APLICABLE A LAS SA FINANCIERAS(ley 11.073 de la ROU)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            247 => 
            array (
                'id' => 748,
                'afip_code' => '51600006936',
            'name' => 'REGIMEN APLICABLE A LAS SA FINANCIERAS(ley 11.073 de la ROU)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            248 => 
            array (
                'id' => 749,
                'afip_code' => '55000006938',
            'name' => 'REGIMEN APLICABLE A LAS SA FINANCIERAS(ley 11.073 de la ROU)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            249 => 
            array (
                'id' => 750,
                'afip_code' => '50000006944',
                'name' => 'SANTA ELENA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            250 => 
            array (
                'id' => 751,
                'afip_code' => '51600006944',
                'name' => 'SANTA ELENA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            251 => 
            array (
                'id' => 752,
                'afip_code' => '55000006946',
                'name' => 'SANTA ELENA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            252 => 
            array (
                'id' => 753,
                'afip_code' => '50000006952',
            'name' => 'SAMOA AMERICANA (Territorio no autónomo de los EEUU)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            253 => 
            array (
                'id' => 754,
                'afip_code' => '51600006952',
            'name' => 'SAMOA AMERICANA (Territorio no autónomo de los EEUU)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            254 => 
            array (
                'id' => 755,
                'afip_code' => '55000006954',
            'name' => 'SAMOA AMERICANA (Territorio no autónomo de los EEUU)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            255 => 
            array (
                'id' => 756,
                'afip_code' => '50000006960',
                'name' => 'ARCHIPIELAGO DE SVBALBARD',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            256 => 
            array (
                'id' => 757,
                'afip_code' => '51600006960',
                'name' => 'ARCHIPIELAGO DE SVBALBARD',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            257 => 
            array (
                'id' => 758,
                'afip_code' => '55000006962',
                'name' => 'ARCHIPIELAGO DE SVBALBARD',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            258 => 
            array (
                'id' => 759,
                'afip_code' => '50000006979',
                'name' => 'TRISTAN DA CUNHA',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            259 => 
            array (
                'id' => 760,
                'afip_code' => '51600006979',
                'name' => 'TRISTAN DA CUNHA',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            260 => 
            array (
                'id' => 761,
                'afip_code' => '55000006970',
                'name' => 'TRISTAN DA CUNHA',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            261 => 
            array (
                'id' => 762,
                'afip_code' => '50000006987',
            'name' => 'TRIESTE (Italia)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            262 => 
            array (
                'id' => 763,
                'afip_code' => '51600006987',
            'name' => 'TRIESTE (Italia)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            263 => 
            array (
                'id' => 764,
                'afip_code' => '55000006989',
            'name' => 'TRIESTE (Italia)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            264 => 
            array (
                'id' => 765,
                'afip_code' => '50000006995',
                'name' => 'TOKELAU',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            265 => 
            array (
                'id' => 766,
                'afip_code' => '51600006995',
                'name' => 'TOKELAU',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            266 => 
            array (
                'id' => 767,
                'afip_code' => '55000006997',
                'name' => 'TOKELAU',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            267 => 
            array (
                'id' => 768,
                'afip_code' => '50000007002',
            'name' => 'ZONA LIBRE DE OSTRAVA (ciudad de la antigua Checoeslovaquia)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            268 => 
            array (
                'id' => 769,
                'afip_code' => '51600007002',
            'name' => 'ZONA LIBRE DE OSTRAVA (ciudad de la antigua Checoeslovaquia)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            269 => 
            array (
                'id' => 770,
                'afip_code' => '55000007004',
            'name' => 'ZONA LIBRE DE OSTRAVA (ciudad de la antigua Checoeslovaquia)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            270 => 
            array (
                'id' => 771,
                'afip_code' => '50000009986',
            'name' => 'PARA PERSONAS FISICAS DE INDETERMINADO (CONTINENTE)',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            271 => 
            array (
                'id' => 772,
                'afip_code' => '51600009986',
            'name' => 'PARA PERSONAS FISICAS DE INDETERMINADO (CONTINENTE)',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            272 => 
            array (
                'id' => 773,
                'afip_code' => '55000009988',
            'name' => 'PARA PERSONAS FISICAS DE INDETERMINADO (CONTINENTE)',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            273 => 
            array (
                'id' => 774,
                'afip_code' => '50000009994',
                'name' => 'PARA PERSONAS FISICAS DE OTROS PAISES',
                'sujeto_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            274 => 
            array (
                'id' => 775,
                'afip_code' => '51600009994',
                'name' => 'PARA PERSONAS FISICAS DE OTROS PAISES',
                'sujeto_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            275 => 
            array (
                'id' => 776,
                'afip_code' => '55000009996',
                'name' => 'PARA PERSONAS FISICAS DE OTROS PAISES',
                'sujeto_id' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}