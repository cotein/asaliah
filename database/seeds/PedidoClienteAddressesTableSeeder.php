<?php

use Illuminate\Database\Seeder;

class PedidoClienteAddressesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pedido_cliente_addresses')->delete();
        
        \DB::table('pedido_cliente_addresses')->insert(array (
            0 => 
            array (
                'id' => 2,
                'pedido_cliente_id' => 6,
                'fiscal_address_id' => '1',
                'delivery_address_id' => '1',
                'created_at' => '2021-04-20 20:46:23',
                'updated_at' => '2021-04-20 20:46:26',
            ),
            1 => 
            array (
                'id' => 3,
                'pedido_cliente_id' => 13,
                'fiscal_address_id' => '1',
                'delivery_address_id' => '1',
                'created_at' => '2021-04-21 14:12:04',
                'updated_at' => '2021-04-21 14:12:06',
            ),
            2 => 
            array (
                'id' => 4,
                'pedido_cliente_id' => 7,
                'fiscal_address_id' => '1',
                'delivery_address_id' => '1',
                'created_at' => '2021-04-22 01:59:07',
                'updated_at' => '2021-04-22 01:59:08',
            ),
            3 => 
            array (
                'id' => 5,
                'pedido_cliente_id' => 14,
                'fiscal_address_id' => '1',
                'delivery_address_id' => '1',
                'created_at' => '2021-04-23 16:13:44',
                'updated_at' => '2021-04-23 16:13:45',
            ),
            4 => 
            array (
                'id' => 6,
                'pedido_cliente_id' => 12,
                'fiscal_address_id' => '1',
                'delivery_address_id' => '1',
                'created_at' => '2021-04-24 14:23:44',
                'updated_at' => '2021-04-24 14:23:45',
            ),
            5 => 
            array (
                'id' => 7,
                'pedido_cliente_id' => 8,
                'fiscal_address_id' => '1',
                'delivery_address_id' => '1',
                'created_at' => '2021-04-24 14:31:04',
                'updated_at' => '2021-04-24 14:31:05',
            ),
            6 => 
            array (
                'id' => 8,
                'pedido_cliente_id' => 15,
                'fiscal_address_id' => '1',
                'delivery_address_id' => '1',
                'created_at' => '2021-05-05 02:53:47',
                'updated_at' => '2021-05-05 02:53:48',
            ),
            7 => 
            array (
                'id' => 9,
                'pedido_cliente_id' => 165,
                'fiscal_address_id' => '1',
                'delivery_address_id' => '1',
                'created_at' => '2021-05-08 19:06:10',
                'updated_at' => '2021-05-08 19:06:11',
            ),
            8 => 
            array (
                'id' => 10,
                'pedido_cliente_id' => 166,
                'fiscal_address_id' => '1',
                'delivery_address_id' => '1',
                'created_at' => '2021-05-10 22:45:31',
                'updated_at' => '2021-05-10 22:45:32',
            ),
            9 => 
            array (
                'id' => 11,
                'pedido_cliente_id' => 164,
                'fiscal_address_id' => '1',
                'delivery_address_id' => '1',
                'created_at' => '2021-05-10 22:52:13',
                'updated_at' => '2021-05-10 22:52:14',
            ),
            10 => 
            array (
                'id' => 12,
                'pedido_cliente_id' => 5,
                'fiscal_address_id' => '1',
                'delivery_address_id' => '1',
                'created_at' => '2021-05-13 16:38:57',
                'updated_at' => '2021-05-13 16:38:59',
            ),
            11 => 
            array (
                'id' => 13,
                'pedido_cliente_id' => 167,
                'fiscal_address_id' => '3',
                'delivery_address_id' => '3',
                'created_at' => '2021-05-13 16:59:28',
                'updated_at' => '2021-05-13 16:59:29',
            ),
            12 => 
            array (
                'id' => 14,
                'pedido_cliente_id' => 168,
                'fiscal_address_id' => '3',
                'delivery_address_id' => '3',
                'created_at' => '2021-05-13 17:19:01',
                'updated_at' => '2021-05-13 17:19:02',
            ),
            13 => 
            array (
                'id' => 15,
                'pedido_cliente_id' => 169,
                'fiscal_address_id' => '3',
                'delivery_address_id' => '3',
                'created_at' => '2021-05-13 17:32:29',
                'updated_at' => '2021-05-13 17:32:34',
            ),
            14 => 
            array (
                'id' => 16,
                'pedido_cliente_id' => 170,
                'fiscal_address_id' => '3',
                'delivery_address_id' => '3',
                'created_at' => '2021-05-13 19:42:55',
                'updated_at' => '2021-05-13 19:42:56',
            ),
            15 => 
            array (
                'id' => 17,
                'pedido_cliente_id' => 171,
                'fiscal_address_id' => '3',
                'delivery_address_id' => '3',
                'created_at' => '2021-05-13 19:49:23',
                'updated_at' => '2021-05-13 19:49:24',
            ),
            16 => 
            array (
                'id' => 18,
                'pedido_cliente_id' => 172,
                'fiscal_address_id' => '3',
                'delivery_address_id' => '3',
                'created_at' => '2021-05-13 19:54:12',
                'updated_at' => '2021-05-13 19:54:13',
            ),
            17 => 
            array (
                'id' => 19,
                'pedido_cliente_id' => 173,
                'fiscal_address_id' => '3',
                'delivery_address_id' => '3',
                'created_at' => '2021-05-13 20:00:51',
                'updated_at' => '2021-05-13 20:00:52',
            ),
            18 => 
            array (
                'id' => 20,
                'pedido_cliente_id' => 174,
                'fiscal_address_id' => '7',
                'delivery_address_id' => '7',
                'created_at' => '2021-05-13 20:06:49',
                'updated_at' => '2021-05-13 20:06:51',
            ),
            19 => 
            array (
                'id' => 21,
                'pedido_cliente_id' => 175,
                'fiscal_address_id' => '8',
                'delivery_address_id' => '8',
                'created_at' => '2021-05-13 20:20:57',
                'updated_at' => '2021-05-13 20:20:58',
            ),
            20 => 
            array (
                'id' => 22,
                'pedido_cliente_id' => 176,
                'fiscal_address_id' => '5',
                'delivery_address_id' => '5',
                'created_at' => '2021-05-13 20:23:08',
                'updated_at' => '2021-05-13 20:23:09',
            ),
            21 => 
            array (
                'id' => 23,
                'pedido_cliente_id' => 177,
                'fiscal_address_id' => '1',
                'delivery_address_id' => '1',
                'created_at' => '2021-05-18 12:48:57',
                'updated_at' => '2021-05-18 12:48:59',
            ),
            22 => 
            array (
                'id' => 24,
                'pedido_cliente_id' => 178,
                'fiscal_address_id' => '10',
                'delivery_address_id' => '10',
                'created_at' => '2021-05-18 16:15:41',
                'updated_at' => '2021-05-18 16:15:50',
            ),
            23 => 
            array (
                'id' => 25,
                'pedido_cliente_id' => 179,
                'fiscal_address_id' => '12',
                'delivery_address_id' => '12',
                'created_at' => '2021-05-18 16:17:18',
                'updated_at' => '2021-05-18 16:17:19',
            ),
            24 => 
            array (
                'id' => 26,
                'pedido_cliente_id' => 180,
                'fiscal_address_id' => '7',
                'delivery_address_id' => '7',
                'created_at' => '2021-05-19 16:04:31',
                'updated_at' => '2021-05-19 16:04:32',
            ),
            25 => 
            array (
                'id' => 27,
                'pedido_cliente_id' => 181,
                'fiscal_address_id' => '7',
                'delivery_address_id' => '7',
                'created_at' => '2021-05-19 16:44:39',
                'updated_at' => '2021-05-19 16:44:41',
            ),
            26 => 
            array (
                'id' => 28,
                'pedido_cliente_id' => 182,
                'fiscal_address_id' => '3',
                'delivery_address_id' => '3',
                'created_at' => '2021-05-19 16:47:09',
                'updated_at' => '2021-05-19 16:47:12',
            ),
            27 => 
            array (
                'id' => 29,
                'pedido_cliente_id' => 183,
                'fiscal_address_id' => '13',
                'delivery_address_id' => '13',
                'created_at' => '2021-05-19 18:30:58',
                'updated_at' => '2021-05-19 18:30:59',
            ),
            28 => 
            array (
                'id' => 30,
                'pedido_cliente_id' => 184,
                'fiscal_address_id' => '13',
                'delivery_address_id' => '13',
                'created_at' => '2021-05-19 18:33:26',
                'updated_at' => '2021-05-19 18:33:28',
            ),
            29 => 
            array (
                'id' => 31,
                'pedido_cliente_id' => 185,
                'fiscal_address_id' => '13',
                'delivery_address_id' => '13',
                'created_at' => '2021-05-20 01:26:59',
                'updated_at' => '2021-05-20 01:27:01',
            ),
            30 => 
            array (
                'id' => 32,
                'pedido_cliente_id' => 186,
                'fiscal_address_id' => '13',
                'delivery_address_id' => '13',
                'created_at' => '2021-05-20 02:26:43',
                'updated_at' => '2021-05-20 02:26:44',
            ),
            31 => 
            array (
                'id' => 33,
                'pedido_cliente_id' => 187,
                'fiscal_address_id' => '7',
                'delivery_address_id' => '7',
                'created_at' => '2021-05-20 19:09:02',
                'updated_at' => '2021-05-20 19:09:04',
            ),
            32 => 
            array (
                'id' => 34,
                'pedido_cliente_id' => 188,
                'fiscal_address_id' => '13',
                'delivery_address_id' => '13',
                'created_at' => '2021-05-20 19:15:18',
                'updated_at' => '2021-05-20 19:15:21',
            ),
            33 => 
            array (
                'id' => 35,
                'pedido_cliente_id' => 189,
                'fiscal_address_id' => '13',
                'delivery_address_id' => '13',
                'created_at' => '2021-05-20 21:07:28',
                'updated_at' => '2021-05-20 21:07:29',
            ),
            34 => 
            array (
                'id' => 36,
                'pedido_cliente_id' => 190,
                'fiscal_address_id' => '7',
                'delivery_address_id' => '7',
                'created_at' => '2021-05-21 12:25:12',
                'updated_at' => '2021-05-21 12:25:13',
            ),
            35 => 
            array (
                'id' => 37,
                'pedido_cliente_id' => 191,
                'fiscal_address_id' => '7',
                'delivery_address_id' => '7',
                'created_at' => '2021-05-21 16:00:35',
                'updated_at' => '2021-05-21 16:00:37',
            ),
            36 => 
            array (
                'id' => 38,
                'pedido_cliente_id' => 192,
                'fiscal_address_id' => '3',
                'delivery_address_id' => '3',
                'created_at' => '2021-05-21 18:48:28',
                'updated_at' => '2021-05-21 18:48:29',
            ),
            37 => 
            array (
                'id' => 39,
                'pedido_cliente_id' => 225,
                'fiscal_address_id' => '3',
                'delivery_address_id' => '3',
                'created_at' => '2021-06-01 02:27:07',
                'updated_at' => '2021-06-01 02:27:09',
            ),
            38 => 
            array (
                'id' => 40,
                'pedido_cliente_id' => 226,
                'fiscal_address_id' => '3',
                'delivery_address_id' => '3',
                'created_at' => '2021-06-01 02:33:56',
                'updated_at' => '2021-06-01 02:33:58',
            ),
            39 => 
            array (
                'id' => 41,
                'pedido_cliente_id' => 227,
                'fiscal_address_id' => '3',
                'delivery_address_id' => '3',
                'created_at' => '2021-06-01 02:36:08',
                'updated_at' => '2021-06-01 02:36:09',
            ),
            40 => 
            array (
                'id' => 42,
                'pedido_cliente_id' => 228,
                'fiscal_address_id' => '3',
                'delivery_address_id' => '3',
                'created_at' => '2021-06-01 02:38:43',
                'updated_at' => '2021-06-01 02:38:44',
            ),
            41 => 
            array (
                'id' => 43,
                'pedido_cliente_id' => 229,
                'fiscal_address_id' => '3',
                'delivery_address_id' => '3',
                'created_at' => '2021-06-01 02:43:31',
                'updated_at' => '2021-06-01 02:43:32',
            ),
            42 => 
            array (
                'id' => 44,
                'pedido_cliente_id' => 230,
                'fiscal_address_id' => '3',
                'delivery_address_id' => '3',
                'created_at' => '2021-06-01 03:09:13',
                'updated_at' => '2021-06-01 03:09:18',
            ),
            43 => 
            array (
                'id' => 45,
                'pedido_cliente_id' => 231,
                'fiscal_address_id' => '3',
                'delivery_address_id' => '3',
                'created_at' => '2021-06-01 03:17:03',
                'updated_at' => '2021-06-01 03:17:04',
            ),
            44 => 
            array (
                'id' => 46,
                'pedido_cliente_id' => 193,
                'fiscal_address_id' => '1',
                'delivery_address_id' => '1',
                'created_at' => '2021-06-01 20:30:56',
                'updated_at' => '2021-06-01 20:30:58',
            ),
            45 => 
            array (
                'id' => 47,
                'pedido_cliente_id' => 234,
                'fiscal_address_id' => '3',
                'delivery_address_id' => '3',
                'created_at' => '2021-06-02 02:18:14',
                'updated_at' => '2021-06-02 02:18:16',
            ),
            46 => 
            array (
                'id' => 48,
                'pedido_cliente_id' => 243,
                'fiscal_address_id' => '3',
                'delivery_address_id' => '3',
                'created_at' => '2021-06-02 17:44:12',
                'updated_at' => '2021-06-02 17:44:13',
            ),
            47 => 
            array (
                'id' => 49,
                'pedido_cliente_id' => 248,
                'fiscal_address_id' => '3',
                'delivery_address_id' => '3',
                'created_at' => '2021-06-03 02:26:30',
                'updated_at' => '2021-06-03 02:26:32',
            ),
            48 => 
            array (
                'id' => 50,
                'pedido_cliente_id' => 250,
                'fiscal_address_id' => '3',
                'delivery_address_id' => '3',
                'created_at' => '2021-06-03 02:28:30',
                'updated_at' => '2021-06-03 02:28:31',
            ),
            49 => 
            array (
                'id' => 51,
                'pedido_cliente_id' => 251,
                'fiscal_address_id' => '7',
                'delivery_address_id' => '7',
                'created_at' => '2021-06-03 02:30:17',
                'updated_at' => '2021-06-03 02:30:19',
            ),
            50 => 
            array (
                'id' => 52,
                'pedido_cliente_id' => 252,
                'fiscal_address_id' => '1',
                'delivery_address_id' => '1',
                'created_at' => '2021-06-03 11:43:27',
                'updated_at' => '2021-06-03 11:43:29',
            ),
            51 => 
            array (
                'id' => 53,
                'pedido_cliente_id' => 249,
                'fiscal_address_id' => '1',
                'delivery_address_id' => '1',
                'created_at' => '2021-06-03 11:54:03',
                'updated_at' => '2021-06-03 11:54:04',
            ),
            52 => 
            array (
                'id' => 54,
                'pedido_cliente_id' => 247,
                'fiscal_address_id' => '1',
                'delivery_address_id' => '1',
                'created_at' => '2021-06-03 12:02:24',
                'updated_at' => '2021-06-03 12:02:24',
            ),
            53 => 
            array (
                'id' => 55,
                'pedido_cliente_id' => 246,
                'fiscal_address_id' => '1',
                'delivery_address_id' => '1',
                'created_at' => '2021-06-03 12:14:56',
                'updated_at' => '2021-06-03 12:14:58',
            ),
            54 => 
            array (
                'id' => 56,
                'pedido_cliente_id' => 245,
                'fiscal_address_id' => '1',
                'delivery_address_id' => '1',
                'created_at' => '2021-06-03 12:37:10',
                'updated_at' => '2021-06-03 12:37:11',
            ),
            55 => 
            array (
                'id' => 57,
                'pedido_cliente_id' => 244,
                'fiscal_address_id' => '1',
                'delivery_address_id' => '1',
                'created_at' => '2021-06-03 13:00:50',
                'updated_at' => '2021-06-03 13:00:51',
            ),
            56 => 
            array (
                'id' => 58,
                'pedido_cliente_id' => 242,
                'fiscal_address_id' => '1',
                'delivery_address_id' => '1',
                'created_at' => '2021-06-03 16:31:15',
                'updated_at' => '2021-06-03 16:31:17',
            ),
            57 => 
            array (
                'id' => 59,
                'pedido_cliente_id' => 253,
                'fiscal_address_id' => '3',
                'delivery_address_id' => '3',
                'created_at' => '2021-06-03 16:34:28',
                'updated_at' => '2021-06-03 16:34:30',
            ),
            58 => 
            array (
                'id' => 60,
                'pedido_cliente_id' => 254,
                'fiscal_address_id' => '3',
                'delivery_address_id' => '3',
                'created_at' => '2021-06-03 16:46:28',
                'updated_at' => '2021-06-03 16:46:30',
            ),
            59 => 
            array (
                'id' => 61,
                'pedido_cliente_id' => 255,
                'fiscal_address_id' => '3',
                'delivery_address_id' => '3',
                'created_at' => '2021-06-03 16:49:56',
                'updated_at' => '2021-06-03 16:49:57',
            ),
            60 => 
            array (
                'id' => 62,
                'pedido_cliente_id' => 241,
                'fiscal_address_id' => '1',
                'delivery_address_id' => '1',
                'created_at' => '2021-06-04 02:38:33',
                'updated_at' => '2021-06-04 02:38:34',
            ),
            61 => 
            array (
                'id' => 63,
                'pedido_cliente_id' => 240,
                'fiscal_address_id' => '1',
                'delivery_address_id' => '1',
                'created_at' => '2021-06-04 02:45:07',
                'updated_at' => '2021-06-04 02:45:08',
            ),
            62 => 
            array (
                'id' => 64,
                'pedido_cliente_id' => 239,
                'fiscal_address_id' => '1',
                'delivery_address_id' => '1',
                'created_at' => '2021-06-04 02:48:02',
                'updated_at' => '2021-06-04 02:48:04',
            ),
            63 => 
            array (
                'id' => 65,
                'pedido_cliente_id' => 238,
                'fiscal_address_id' => '1',
                'delivery_address_id' => '1',
                'created_at' => '2021-06-04 18:46:37',
                'updated_at' => '2021-06-04 18:46:39',
            ),
            64 => 
            array (
                'id' => 66,
                'pedido_cliente_id' => 237,
                'fiscal_address_id' => '1',
                'delivery_address_id' => '1',
                'created_at' => '2021-06-05 11:53:34',
                'updated_at' => '2021-06-05 14:09:33',
            ),
            65 => 
            array (
                'id' => 67,
                'pedido_cliente_id' => 236,
                'fiscal_address_id' => '1',
                'delivery_address_id' => '1',
                'created_at' => '2021-06-05 14:36:09',
                'updated_at' => '2021-06-05 14:36:11',
            ),
            66 => 
            array (
                'id' => 68,
                'pedido_cliente_id' => 195,
                'fiscal_address_id' => '1',
                'delivery_address_id' => '1',
                'created_at' => '2021-06-05 14:45:59',
                'updated_at' => '2021-06-05 14:46:03',
            ),
            67 => 
            array (
                'id' => 69,
                'pedido_cliente_id' => 194,
                'fiscal_address_id' => '1',
                'delivery_address_id' => '1',
                'created_at' => '2021-06-05 14:55:51',
                'updated_at' => '2021-06-05 14:55:52',
            ),
            68 => 
            array (
                'id' => 70,
                'pedido_cliente_id' => 235,
                'fiscal_address_id' => '1',
                'delivery_address_id' => '1',
                'created_at' => '2021-06-05 14:58:28',
                'updated_at' => '2021-06-05 14:58:30',
            ),
            69 => 
            array (
                'id' => 71,
                'pedido_cliente_id' => 233,
                'fiscal_address_id' => '1',
                'delivery_address_id' => '1',
                'created_at' => '2021-06-07 15:18:52',
                'updated_at' => '2021-06-07 15:18:53',
            ),
            70 => 
            array (
                'id' => 72,
                'pedido_cliente_id' => 232,
                'fiscal_address_id' => '1',
                'delivery_address_id' => '1',
                'created_at' => '2021-06-07 15:31:20',
                'updated_at' => '2021-06-07 15:31:22',
            ),
            71 => 
            array (
                'id' => 73,
                'pedido_cliente_id' => 196,
                'fiscal_address_id' => '1',
                'delivery_address_id' => '1',
                'created_at' => '2021-06-07 15:32:49',
                'updated_at' => '2021-06-07 15:32:52',
            ),
            72 => 
            array (
                'id' => 74,
                'pedido_cliente_id' => 257,
                'fiscal_address_id' => '14',
                'delivery_address_id' => '14',
                'created_at' => '2021-06-08 17:57:41',
                'updated_at' => '2021-06-08 17:57:42',
            ),
            73 => 
            array (
                'id' => 75,
                'pedido_cliente_id' => 256,
                'fiscal_address_id' => '1',
                'delivery_address_id' => '1',
                'created_at' => '2021-06-08 18:44:20',
                'updated_at' => '2021-06-08 18:44:21',
            ),
        ));
        
        
    }
}