<?php

use Illuminate\Database\Seeder;

class ColoursTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('colours')->delete();
        
        \DB::table('colours')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => '2450295',
                'name' => 'Negro',
                'rgb' => '000000',
                'created_at' => '2019-05-14 12:27:50',
                'updated_at' => '2019-05-14 12:27:50',
            ),
            1 => 
            array (
                'id' => 2,
                'code' => '2450293',
                'name' => 'Azul',
                'rgb' => '1717FF',
                'created_at' => '2019-05-14 12:27:52',
                'updated_at' => '2019-05-14 12:27:52',
            ),
            2 => 
            array (
                'id' => 3,
                'code' => '2450307',
                'name' => 'Rojo',
                'rgb' => 'FF0000',
                'created_at' => '2019-05-14 12:27:52',
                'updated_at' => '2019-05-14 12:27:52',
            ),
            3 => 
            array (
                'id' => 4,
                'code' => '2450311',
                'name' => 'Violeta',
                'rgb' => '9F00FF',
                'created_at' => '2019-05-14 12:27:53',
                'updated_at' => '2019-05-14 12:27:53',
            ),
            4 => 
            array (
                'id' => 5,
                'code' => '2450291',
                'name' => 'Marrón',
                'rgb' => 'A0522D',
                'created_at' => '2019-05-14 12:27:53',
                'updated_at' => '2019-05-14 12:27:53',
            ),
            5 => 
            array (
                'id' => 6,
                'code' => '2450314',
                'name' => 'Verde',
                'rgb' => '0DA600',
                'created_at' => '2019-05-14 12:27:54',
                'updated_at' => '2019-05-14 12:27:54',
            ),
            6 => 
            array (
                'id' => 7,
                'code' => '2450327',
                'name' => 'Naranja',
                'rgb' => 'FF8C00',
                'created_at' => '2019-05-14 12:27:54',
                'updated_at' => '2019-05-14 12:27:54',
            ),
            7 => 
            array (
                'id' => 8,
                'code' => '2450278',
                'name' => 'Celeste',
                'rgb' => '83DDFF',
                'created_at' => '2019-05-14 12:27:54',
                'updated_at' => '2019-05-14 12:27:54',
            ),
            8 => 
            array (
                'id' => 9,
                'code' => '2450312',
                'name' => 'Rosa',
                'rgb' => 'FCB1BE',
                'created_at' => '2019-05-14 12:27:55',
                'updated_at' => '2019-05-14 12:27:55',
            ),
            9 => 
            array (
                'id' => 10,
                'code' => '2450289',
                'name' => 'Dorado',
                'rgb' => 'FFD700',
                'created_at' => '2019-05-14 12:27:55',
                'updated_at' => '2019-05-14 12:27:55',
            ),
            10 => 
            array (
                'id' => 11,
                'code' => '2450296',
                'name' => 'Amarillo',
                'rgb' => 'FFED00',
                'created_at' => '2019-05-14 12:27:55',
                'updated_at' => '2019-05-14 12:27:55',
            ),
            11 => 
            array (
                'id' => 12,
                'code' => '2450294',
                'name' => 'Gris',
                'rgb' => 'E1E1E1',
                'created_at' => '2019-05-14 12:27:56',
                'updated_at' => '2019-05-14 12:27:56',
            ),
            12 => 
            array (
                'id' => 13,
                'code' => '2450308',
                'name' => 'Blanco',
                'rgb' => 'FFFFFF',
                'created_at' => '2019-05-14 12:27:56',
                'updated_at' => '2019-05-14 12:27:56',
            ),
            13 => 
            array (
                'id' => 14,
                'code' => '2450302',
                'name' => 'Azul acero',
                'rgb' => '6FA8DC',
                'created_at' => '2019-05-14 12:27:56',
                'updated_at' => '2019-05-14 12:27:56',
            ),
            14 => 
            array (
                'id' => 15,
                'code' => '2450298',
                'name' => 'Azul claro',
                'rgb' => 'DCECFF',
                'created_at' => '2019-05-14 12:27:57',
                'updated_at' => '2019-05-14 12:27:57',
            ),
            15 => 
            array (
                'id' => 16,
                'code' => '2450325',
                'name' => 'Azul marino',
                'rgb' => '0F5299',
                'created_at' => '2019-05-14 12:27:57',
                'updated_at' => '2019-05-14 12:27:57',
            ),
            16 => 
            array (
                'id' => 17,
                'code' => '2450306',
                'name' => 'Azul oscuro',
                'rgb' => '013267',
                'created_at' => '2019-05-14 12:27:57',
                'updated_at' => '2019-05-14 12:27:57',
            ),
            17 => 
            array (
                'id' => 18,
                'code' => '2450322',
                'name' => 'Bordó',
                'rgb' => '830500',
                'created_at' => '2019-05-14 12:27:58',
                'updated_at' => '2019-05-14 12:27:58',
            ),
            18 => 
            array (
                'id' => 19,
                'code' => '2450318',
                'name' => 'Coral',
                'rgb' => 'FA8072',
                'created_at' => '2019-05-14 12:27:58',
                'updated_at' => '2019-05-14 12:27:58',
            ),
            19 => 
            array (
                'id' => 20,
                'code' => '2450313',
                'name' => 'Coral claro',
                'rgb' => 'F9AC95',
                'created_at' => '2019-05-14 12:27:58',
                'updated_at' => '2019-05-14 12:27:58',
            ),
            20 => 
            array (
                'id' => 21,
                'code' => '2450317',
                'name' => 'Terracota',
                'rgb' => 'C63633',
                'created_at' => '2019-05-14 12:27:59',
                'updated_at' => '2019-05-14 12:27:59',
            ),
            21 => 
            array (
                'id' => 22,
                'code' => '2450316',
                'name' => 'Lavanda',
                'rgb' => 'D9D2E9',
                'created_at' => '2019-05-14 12:27:59',
                'updated_at' => '2019-05-14 12:27:59',
            ),
            22 => 
            array (
                'id' => 23,
                'code' => '2450321',
                'name' => 'Lila',
                'rgb' => 'CC87FF',
                'created_at' => '2019-05-14 12:28:00',
                'updated_at' => '2019-05-14 12:28:00',
            ),
            23 => 
            array (
                'id' => 24,
                'code' => '2450290',
                'name' => 'Violeta oscuro',
                'rgb' => '4E0087',
                'created_at' => '2019-05-14 12:28:00',
                'updated_at' => '2019-05-14 12:28:00',
            ),
            24 => 
            array (
                'id' => 25,
                'code' => '2450279',
                'name' => 'Índigo',
                'rgb' => '7A64C6',
                'created_at' => '2019-05-14 12:28:00',
                'updated_at' => '2019-05-14 12:28:00',
            ),
            25 => 
            array (
                'id' => 26,
                'code' => '2450281',
                'name' => 'Beige',
                'rgb' => 'F5F3DC',
                'created_at' => '2019-05-14 12:28:01',
                'updated_at' => '2019-05-14 12:28:01',
            ),
            26 => 
            array (
                'id' => 27,
                'code' => '2450292',
                'name' => 'Marrón claro',
                'rgb' => 'AF8650',
                'created_at' => '2019-05-14 12:28:01',
                'updated_at' => '2019-05-14 12:28:01',
            ),
            27 => 
            array (
                'id' => 28,
                'code' => '2450297',
                'name' => 'Marrón oscuro',
                'rgb' => '5D3806',
                'created_at' => '2019-05-14 12:28:01',
                'updated_at' => '2019-05-14 12:28:01',
            ),
            28 => 
            array (
                'id' => 29,
                'code' => '2450287',
                'name' => 'Suela',
                'rgb' => 'FAEBD7',
                'created_at' => '2019-05-14 12:28:02',
                'updated_at' => '2019-05-14 12:28:02',
            ),
            29 => 
            array (
                'id' => 30,
                'code' => '2450319',
                'name' => 'Verde claro',
                'rgb' => '9FF39F',
                'created_at' => '2019-05-14 12:28:02',
                'updated_at' => '2019-05-14 12:28:02',
            ),
            30 => 
            array (
                'id' => 31,
                'code' => '2450305',
                'name' => 'Verde limón',
                'rgb' => '73E129',
                'created_at' => '2019-05-14 12:28:02',
                'updated_at' => '2019-05-14 12:28:02',
            ),
            31 => 
            array (
                'id' => 32,
                'code' => '2450310',
                'name' => 'Verde musgo',
                'rgb' => '3F7600',
                'created_at' => '2019-05-14 12:28:03',
                'updated_at' => '2019-05-14 12:28:03',
            ),
            32 => 
            array (
                'id' => 33,
                'code' => '2450324',
                'name' => 'Verde oscuro',
                'rgb' => '003D00',
                'created_at' => '2019-05-14 12:28:03',
                'updated_at' => '2019-05-14 12:28:03',
            ),
            33 => 
            array (
                'id' => 34,
                'code' => '2450282',
                'name' => 'Chocolate',
                'rgb' => '9B3F14',
                'created_at' => '2019-05-14 12:28:03',
                'updated_at' => '2019-05-14 12:28:03',
            ),
            34 => 
            array (
                'id' => 35,
                'code' => '2450323',
                'name' => 'Naranja claro',
                'rgb' => 'FDAF20',
                'created_at' => '2019-05-14 12:28:03',
                'updated_at' => '2019-05-14 12:28:03',
            ),
            35 => 
            array (
                'id' => 36,
                'code' => '2450328',
                'name' => 'Naranja oscuro',
                'rgb' => 'D2691E',
                'created_at' => '2019-05-14 12:28:04',
                'updated_at' => '2019-05-14 12:28:04',
            ),
            36 => 
            array (
                'id' => 37,
                'code' => '2450286',
                'name' => 'Piel',
                'rgb' => 'FFE4C4',
                'created_at' => '2019-05-14 12:28:04',
                'updated_at' => '2019-05-14 12:28:04',
            ),
            37 => 
            array (
                'id' => 38,
                'code' => '2450283',
                'name' => 'Agua',
                'rgb' => 'E0FFFF',
                'created_at' => '2019-05-14 12:28:04',
                'updated_at' => '2019-05-14 12:28:04',
            ),
            38 => 
            array (
                'id' => 39,
                'code' => '2450288',
                'name' => 'Azul petróleo',
                'rgb' => '1E6E7F',
                'created_at' => '2019-05-14 12:28:05',
                'updated_at' => '2019-05-14 12:28:05',
            ),
            39 => 
            array (
                'id' => 40,
                'code' => '2450315',
                'name' => 'Cyan',
                'rgb' => '00FFFF',
                'created_at' => '2019-05-14 12:28:05',
                'updated_at' => '2019-05-14 12:28:05',
            ),
            40 => 
            array (
                'id' => 41,
                'code' => '2450320',
                'name' => 'Turquesa',
                'rgb' => '40E0D0',
                'created_at' => '2019-05-14 12:28:05',
                'updated_at' => '2019-05-14 12:28:05',
            ),
            41 => 
            array (
                'id' => 42,
                'code' => '2450326',
                'name' => 'Fucsia',
                'rgb' => 'FF00EC',
                'created_at' => '2019-05-14 12:28:06',
                'updated_at' => '2019-05-14 12:28:06',
            ),
            42 => 
            array (
                'id' => 43,
                'code' => '2450284',
                'name' => 'Rosa chicle',
                'rgb' => 'FF51A8',
                'created_at' => '2019-05-14 12:28:06',
                'updated_at' => '2019-05-14 12:28:06',
            ),
            43 => 
            array (
                'id' => 44,
                'code' => '2450280',
                'name' => 'Rosa claro',
                'rgb' => 'FADBE2',
                'created_at' => '2019-05-14 12:28:06',
                'updated_at' => '2019-05-14 12:28:06',
            ),
            44 => 
            array (
                'id' => 45,
                'code' => '2450285',
                'name' => 'Rosa pálido',
                'rgb' => 'D06EA8',
                'created_at' => '2019-05-14 12:28:07',
                'updated_at' => '2019-05-14 12:28:07',
            ),
            45 => 
            array (
                'id' => 46,
                'code' => '2450301',
                'name' => 'Caqui',
                'rgb' => 'F0E68C',
                'created_at' => '2019-05-14 12:28:07',
                'updated_at' => '2019-05-14 12:28:07',
            ),
            46 => 
            array (
                'id' => 47,
                'code' => '2450300',
                'name' => 'Crema',
                'rgb' => 'FFFFE0',
                'created_at' => '2019-05-14 12:28:07',
                'updated_at' => '2019-05-14 12:28:07',
            ),
            47 => 
            array (
                'id' => 48,
                'code' => '2450309',
                'name' => 'Dorado oscuro',
                'rgb' => 'BF9000',
                'created_at' => '2019-05-14 12:28:07',
                'updated_at' => '2019-05-14 12:28:07',
            ),
            48 => 
            array (
                'id' => 49,
                'code' => '2450304',
                'name' => 'Ocre',
                'rgb' => 'EACB53',
                'created_at' => '2019-05-14 12:28:08',
                'updated_at' => '2019-05-14 12:28:08',
            ),
            49 => 
            array (
                'id' => 50,
                'code' => '2450299',
                'name' => 'Gris oscuro',
                'rgb' => '666666',
                'created_at' => '2019-05-14 12:28:08',
                'updated_at' => '2019-05-14 12:28:08',
            ),
            50 => 
            array (
                'id' => 51,
                'code' => '2450303',
                'name' => 'Plateado',
                'rgb' => 'CBCFD0',
                'created_at' => '2019-05-14 12:28:08',
                'updated_at' => '2019-05-14 12:28:08',
            ),
        ));
        
        
    }
}