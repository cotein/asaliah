<?php

use Illuminate\Database\Seeder;

class PedidosClientesStatusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pedidos_clientes_status')->delete();
        
        \DB::table('pedidos_clientes_status')->insert(array (
            0 => 
            array (
                'id' => 4,
                'pedido_cliente_id' => 6,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-04-20 20:46:29',
                'updated_at' => '2021-04-20 20:46:29',
                'user_id' => 1,
            ),
            1 => 
            array (
                'id' => 5,
                'pedido_cliente_id' => 6,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-04-20 20:46:40',
                'updated_at' => '2021-04-20 20:46:40',
                'user_id' => 1,
            ),
            2 => 
            array (
                'id' => 6,
                'pedido_cliente_id' => 6,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-04-20 20:46:46',
                'updated_at' => '2021-04-20 20:46:46',
                'user_id' => 1,
            ),
            3 => 
            array (
                'id' => 7,
                'pedido_cliente_id' => 13,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-04-21 14:12:07',
                'updated_at' => '2021-04-21 14:12:07',
                'user_id' => 1,
            ),
            4 => 
            array (
                'id' => 8,
                'pedido_cliente_id' => 13,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-04-21 14:12:10',
                'updated_at' => '2021-04-21 14:12:10',
                'user_id' => 1,
            ),
            5 => 
            array (
                'id' => 9,
                'pedido_cliente_id' => 13,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-04-21 14:12:13',
                'updated_at' => '2021-04-21 14:12:13',
                'user_id' => 1,
            ),
            6 => 
            array (
                'id' => 10,
                'pedido_cliente_id' => 7,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-04-22 01:59:10',
                'updated_at' => '2021-04-22 01:59:10',
                'user_id' => 1,
            ),
            7 => 
            array (
                'id' => 11,
                'pedido_cliente_id' => 7,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-04-22 01:59:15',
                'updated_at' => '2021-04-22 01:59:15',
                'user_id' => 1,
            ),
            8 => 
            array (
                'id' => 12,
                'pedido_cliente_id' => 7,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-04-22 01:59:17',
                'updated_at' => '2021-04-22 01:59:17',
                'user_id' => 1,
            ),
            9 => 
            array (
                'id' => 13,
                'pedido_cliente_id' => 7,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-04-22 01:59:32',
                'updated_at' => '2021-04-22 01:59:32',
                'user_id' => 1,
            ),
            10 => 
            array (
                'id' => 14,
                'pedido_cliente_id' => 6,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-04-23 16:11:18',
                'updated_at' => '2021-04-23 16:11:18',
                'user_id' => 1,
            ),
            11 => 
            array (
                'id' => 15,
                'pedido_cliente_id' => 14,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-04-23 16:13:49',
                'updated_at' => '2021-04-23 16:13:49',
                'user_id' => 1,
            ),
            12 => 
            array (
                'id' => 16,
                'pedido_cliente_id' => 14,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-04-23 16:13:51',
                'updated_at' => '2021-04-23 16:13:51',
                'user_id' => 1,
            ),
            13 => 
            array (
                'id' => 17,
                'pedido_cliente_id' => 14,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-04-23 16:13:54',
                'updated_at' => '2021-04-23 16:13:54',
                'user_id' => 1,
            ),
            14 => 
            array (
                'id' => 18,
                'pedido_cliente_id' => 14,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-04-23 16:14:43',
                'updated_at' => '2021-04-23 16:14:43',
                'user_id' => 1,
            ),
            15 => 
            array (
                'id' => 19,
                'pedido_cliente_id' => 12,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-04-24 14:24:01',
                'updated_at' => '2021-04-24 14:24:01',
                'user_id' => 1,
            ),
            16 => 
            array (
                'id' => 20,
                'pedido_cliente_id' => 12,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-04-24 14:24:05',
                'updated_at' => '2021-04-24 14:24:05',
                'user_id' => 1,
            ),
            17 => 
            array (
                'id' => 21,
                'pedido_cliente_id' => 12,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-04-24 14:24:08',
                'updated_at' => '2021-04-24 14:24:08',
                'user_id' => 1,
            ),
            18 => 
            array (
                'id' => 22,
                'pedido_cliente_id' => 8,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-04-24 14:31:07',
                'updated_at' => '2021-04-24 14:31:07',
                'user_id' => 1,
            ),
            19 => 
            array (
                'id' => 23,
                'pedido_cliente_id' => 8,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-04-24 14:31:14',
                'updated_at' => '2021-04-24 14:31:14',
                'user_id' => 1,
            ),
            20 => 
            array (
                'id' => 24,
                'pedido_cliente_id' => 8,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-04-24 14:31:19',
                'updated_at' => '2021-04-24 14:31:19',
                'user_id' => 1,
            ),
            21 => 
            array (
                'id' => 25,
                'pedido_cliente_id' => 8,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-04-24 14:31:44',
                'updated_at' => '2021-04-24 14:31:44',
                'user_id' => 1,
            ),
            22 => 
            array (
                'id' => 26,
                'pedido_cliente_id' => 15,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-05-05 02:53:49',
                'updated_at' => '2021-05-05 02:53:49',
                'user_id' => 1,
            ),
            23 => 
            array (
                'id' => 27,
                'pedido_cliente_id' => 15,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-05-05 02:54:01',
                'updated_at' => '2021-05-05 02:54:01',
                'user_id' => 1,
            ),
            24 => 
            array (
                'id' => 28,
                'pedido_cliente_id' => 15,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-05-05 02:54:03',
                'updated_at' => '2021-05-05 02:54:03',
                'user_id' => 1,
            ),
            25 => 
            array (
                'id' => 29,
                'pedido_cliente_id' => 15,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-05 02:54:29',
                'updated_at' => '2021-05-05 02:54:29',
                'user_id' => 1,
            ),
            26 => 
            array (
                'id' => 30,
                'pedido_cliente_id' => 15,
                'status_id' => 12,
                'description' => NULL,
                'created_at' => '2021-05-05 02:54:56',
                'updated_at' => '2021-05-05 02:54:56',
                'user_id' => 1,
            ),
            27 => 
            array (
                'id' => 31,
                'pedido_cliente_id' => 15,
                'status_id' => 13,
                'description' => NULL,
                'created_at' => '2021-05-05 02:54:59',
                'updated_at' => '2021-05-05 02:54:59',
                'user_id' => 1,
            ),
            28 => 
            array (
                'id' => 32,
                'pedido_cliente_id' => 15,
                'status_id' => 14,
                'description' => NULL,
                'created_at' => '2021-05-05 02:55:01',
                'updated_at' => '2021-05-05 02:55:01',
                'user_id' => 1,
            ),
            29 => 
            array (
                'id' => 33,
                'pedido_cliente_id' => 15,
                'status_id' => 15,
                'description' => NULL,
                'created_at' => '2021-05-05 02:55:02',
                'updated_at' => '2021-05-05 02:55:02',
                'user_id' => 1,
            ),
            30 => 
            array (
                'id' => 34,
                'pedido_cliente_id' => 15,
                'status_id' => 16,
                'description' => NULL,
                'created_at' => '2021-05-05 02:55:06',
                'updated_at' => '2021-05-05 02:55:06',
                'user_id' => 1,
            ),
            31 => 
            array (
                'id' => 35,
                'pedido_cliente_id' => 15,
                'status_id' => 17,
                'description' => NULL,
                'created_at' => '2021-05-05 02:55:08',
                'updated_at' => '2021-05-05 02:55:08',
                'user_id' => 1,
            ),
            32 => 
            array (
                'id' => 36,
                'pedido_cliente_id' => 165,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-05-08 19:06:08',
                'updated_at' => '2021-05-08 19:06:08',
                'user_id' => 1,
            ),
            33 => 
            array (
                'id' => 37,
                'pedido_cliente_id' => 165,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-05-08 19:06:16',
                'updated_at' => '2021-05-08 19:06:16',
                'user_id' => 1,
            ),
            34 => 
            array (
                'id' => 38,
                'pedido_cliente_id' => 165,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-05-08 19:06:18',
                'updated_at' => '2021-05-08 19:06:18',
                'user_id' => 1,
            ),
            35 => 
            array (
                'id' => 39,
                'pedido_cliente_id' => 165,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-08 19:06:39',
                'updated_at' => '2021-05-08 19:06:39',
                'user_id' => 1,
            ),
            36 => 
            array (
                'id' => 40,
                'pedido_cliente_id' => 166,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-05-10 22:45:34',
                'updated_at' => '2021-05-10 22:45:34',
                'user_id' => 1,
            ),
            37 => 
            array (
                'id' => 41,
                'pedido_cliente_id' => 166,
                'status_id' => 8,
                'description' => 'dfdfdfdfdfdf',
                'created_at' => '2021-05-10 22:45:41',
                'updated_at' => '2021-05-10 22:45:41',
                'user_id' => 1,
            ),
            38 => 
            array (
                'id' => 42,
                'pedido_cliente_id' => 166,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-05-10 22:49:48',
                'updated_at' => '2021-05-10 22:49:48',
                'user_id' => 1,
            ),
            39 => 
            array (
                'id' => 43,
                'pedido_cliente_id' => 166,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-05-10 22:49:57',
                'updated_at' => '2021-05-10 22:49:57',
                'user_id' => 1,
            ),
            40 => 
            array (
                'id' => 44,
                'pedido_cliente_id' => 166,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-10 22:50:50',
                'updated_at' => '2021-05-10 22:50:50',
                'user_id' => 1,
            ),
            41 => 
            array (
                'id' => 45,
                'pedido_cliente_id' => 166,
                'status_id' => 12,
                'description' => NULL,
                'created_at' => '2021-05-10 22:51:47',
                'updated_at' => '2021-05-10 22:51:47',
                'user_id' => 1,
            ),
            42 => 
            array (
                'id' => 46,
                'pedido_cliente_id' => 166,
                'status_id' => 13,
                'description' => NULL,
                'created_at' => '2021-05-10 22:51:51',
                'updated_at' => '2021-05-10 22:51:51',
                'user_id' => 1,
            ),
            43 => 
            array (
                'id' => 47,
                'pedido_cliente_id' => 166,
                'status_id' => 14,
                'description' => NULL,
                'created_at' => '2021-05-10 22:51:52',
                'updated_at' => '2021-05-10 22:51:52',
                'user_id' => 1,
            ),
            44 => 
            array (
                'id' => 48,
                'pedido_cliente_id' => 166,
                'status_id' => 15,
                'description' => NULL,
                'created_at' => '2021-05-10 22:51:55',
                'updated_at' => '2021-05-10 22:51:55',
                'user_id' => 1,
            ),
            45 => 
            array (
                'id' => 49,
                'pedido_cliente_id' => 164,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-05-10 22:52:15',
                'updated_at' => '2021-05-10 22:52:15',
                'user_id' => 1,
            ),
            46 => 
            array (
                'id' => 50,
                'pedido_cliente_id' => 164,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-05-10 22:52:17',
                'updated_at' => '2021-05-10 22:52:17',
                'user_id' => 1,
            ),
            47 => 
            array (
                'id' => 51,
                'pedido_cliente_id' => 5,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-05-13 16:39:01',
                'updated_at' => '2021-05-13 16:39:01',
                'user_id' => 1,
            ),
            48 => 
            array (
                'id' => 52,
                'pedido_cliente_id' => 5,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-05-13 16:39:11',
                'updated_at' => '2021-05-13 16:39:11',
                'user_id' => 1,
            ),
            49 => 
            array (
                'id' => 53,
                'pedido_cliente_id' => 5,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-05-13 16:39:16',
                'updated_at' => '2021-05-13 16:39:16',
                'user_id' => 1,
            ),
            50 => 
            array (
                'id' => 54,
                'pedido_cliente_id' => 164,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-05-13 16:51:40',
                'updated_at' => '2021-05-13 16:51:40',
                'user_id' => 1,
            ),
            51 => 
            array (
                'id' => 55,
                'pedido_cliente_id' => 167,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-05-13 16:59:30',
                'updated_at' => '2021-05-13 16:59:30',
                'user_id' => 1,
            ),
            52 => 
            array (
                'id' => 56,
                'pedido_cliente_id' => 167,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-05-13 16:59:47',
                'updated_at' => '2021-05-13 16:59:47',
                'user_id' => 1,
            ),
            53 => 
            array (
                'id' => 57,
                'pedido_cliente_id' => 167,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-05-13 16:59:51',
                'updated_at' => '2021-05-13 16:59:51',
                'user_id' => 1,
            ),
            54 => 
            array (
                'id' => 58,
                'pedido_cliente_id' => 167,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-13 17:11:42',
                'updated_at' => '2021-05-13 17:11:42',
                'user_id' => 1,
            ),
            55 => 
            array (
                'id' => 59,
                'pedido_cliente_id' => 168,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-05-13 17:19:03',
                'updated_at' => '2021-05-13 17:19:03',
                'user_id' => 1,
            ),
            56 => 
            array (
                'id' => 60,
                'pedido_cliente_id' => 168,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-05-13 17:19:06',
                'updated_at' => '2021-05-13 17:19:06',
                'user_id' => 1,
            ),
            57 => 
            array (
                'id' => 61,
                'pedido_cliente_id' => 168,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-05-13 17:19:10',
                'updated_at' => '2021-05-13 17:19:10',
                'user_id' => 1,
            ),
            58 => 
            array (
                'id' => 62,
                'pedido_cliente_id' => 168,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-13 17:19:29',
                'updated_at' => '2021-05-13 17:19:29',
                'user_id' => 1,
            ),
            59 => 
            array (
                'id' => 63,
                'pedido_cliente_id' => 169,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-05-13 17:32:34',
                'updated_at' => '2021-05-13 17:32:34',
                'user_id' => 1,
            ),
            60 => 
            array (
                'id' => 64,
                'pedido_cliente_id' => 169,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-05-13 17:32:34',
                'updated_at' => '2021-05-13 17:32:34',
                'user_id' => 1,
            ),
            61 => 
            array (
                'id' => 65,
                'pedido_cliente_id' => 169,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-05-13 17:32:38',
                'updated_at' => '2021-05-13 17:32:38',
                'user_id' => 1,
            ),
            62 => 
            array (
                'id' => 66,
                'pedido_cliente_id' => 169,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-05-13 17:32:46',
                'updated_at' => '2021-05-13 17:32:46',
                'user_id' => 1,
            ),
            63 => 
            array (
                'id' => 67,
                'pedido_cliente_id' => 169,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-13 17:59:17',
                'updated_at' => '2021-05-13 17:59:17',
                'user_id' => 1,
            ),
            64 => 
            array (
                'id' => 68,
                'pedido_cliente_id' => 170,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-05-13 19:42:57',
                'updated_at' => '2021-05-13 19:42:57',
                'user_id' => 1,
            ),
            65 => 
            array (
                'id' => 69,
                'pedido_cliente_id' => 170,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-05-13 19:43:00',
                'updated_at' => '2021-05-13 19:43:00',
                'user_id' => 1,
            ),
            66 => 
            array (
                'id' => 70,
                'pedido_cliente_id' => 170,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-05-13 19:43:04',
                'updated_at' => '2021-05-13 19:43:04',
                'user_id' => 1,
            ),
            67 => 
            array (
                'id' => 71,
                'pedido_cliente_id' => 170,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-13 19:47:22',
                'updated_at' => '2021-05-13 19:47:22',
                'user_id' => 1,
            ),
            68 => 
            array (
                'id' => 72,
                'pedido_cliente_id' => 171,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-05-13 19:49:26',
                'updated_at' => '2021-05-13 19:49:26',
                'user_id' => 1,
            ),
            69 => 
            array (
                'id' => 73,
                'pedido_cliente_id' => 171,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-05-13 19:49:27',
                'updated_at' => '2021-05-13 19:49:27',
                'user_id' => 1,
            ),
            70 => 
            array (
                'id' => 74,
                'pedido_cliente_id' => 171,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-05-13 19:49:32',
                'updated_at' => '2021-05-13 19:49:32',
                'user_id' => 1,
            ),
            71 => 
            array (
                'id' => 75,
                'pedido_cliente_id' => 171,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-13 19:49:59',
                'updated_at' => '2021-05-13 19:49:59',
                'user_id' => 1,
            ),
            72 => 
            array (
                'id' => 76,
                'pedido_cliente_id' => 172,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-05-13 19:54:15',
                'updated_at' => '2021-05-13 19:54:15',
                'user_id' => 1,
            ),
            73 => 
            array (
                'id' => 77,
                'pedido_cliente_id' => 172,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-05-13 19:54:16',
                'updated_at' => '2021-05-13 19:54:16',
                'user_id' => 1,
            ),
            74 => 
            array (
                'id' => 78,
                'pedido_cliente_id' => 172,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-05-13 19:54:22',
                'updated_at' => '2021-05-13 19:54:22',
                'user_id' => 1,
            ),
            75 => 
            array (
                'id' => 79,
                'pedido_cliente_id' => 172,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-13 19:54:50',
                'updated_at' => '2021-05-13 19:54:50',
                'user_id' => 1,
            ),
            76 => 
            array (
                'id' => 80,
                'pedido_cliente_id' => 173,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-05-13 20:00:54',
                'updated_at' => '2021-05-13 20:00:54',
                'user_id' => 1,
            ),
            77 => 
            array (
                'id' => 81,
                'pedido_cliente_id' => 173,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-05-13 20:00:55',
                'updated_at' => '2021-05-13 20:00:55',
                'user_id' => 1,
            ),
            78 => 
            array (
                'id' => 82,
                'pedido_cliente_id' => 173,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-05-13 20:01:13',
                'updated_at' => '2021-05-13 20:01:13',
                'user_id' => 1,
            ),
            79 => 
            array (
                'id' => 83,
                'pedido_cliente_id' => 173,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-13 20:01:25',
                'updated_at' => '2021-05-13 20:01:25',
                'user_id' => 1,
            ),
            80 => 
            array (
                'id' => 84,
                'pedido_cliente_id' => 174,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-05-13 20:07:01',
                'updated_at' => '2021-05-13 20:07:01',
                'user_id' => 1,
            ),
            81 => 
            array (
                'id' => 85,
                'pedido_cliente_id' => 174,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-05-13 20:07:03',
                'updated_at' => '2021-05-13 20:07:03',
                'user_id' => 1,
            ),
            82 => 
            array (
                'id' => 86,
                'pedido_cliente_id' => 174,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-05-13 20:07:07',
                'updated_at' => '2021-05-13 20:07:07',
                'user_id' => 1,
            ),
            83 => 
            array (
                'id' => 87,
                'pedido_cliente_id' => 174,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-13 20:07:22',
                'updated_at' => '2021-05-13 20:07:22',
                'user_id' => 1,
            ),
            84 => 
            array (
                'id' => 88,
                'pedido_cliente_id' => 175,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-05-13 20:21:02',
                'updated_at' => '2021-05-13 20:21:02',
                'user_id' => 1,
            ),
            85 => 
            array (
                'id' => 89,
                'pedido_cliente_id' => 175,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-05-13 20:21:24',
                'updated_at' => '2021-05-13 20:21:24',
                'user_id' => 1,
            ),
            86 => 
            array (
                'id' => 90,
                'pedido_cliente_id' => 175,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-05-13 20:21:37',
                'updated_at' => '2021-05-13 20:21:37',
                'user_id' => 1,
            ),
            87 => 
            array (
                'id' => 91,
                'pedido_cliente_id' => 176,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-05-13 20:23:13',
                'updated_at' => '2021-05-13 20:23:13',
                'user_id' => 1,
            ),
            88 => 
            array (
                'id' => 92,
                'pedido_cliente_id' => 176,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-05-13 20:23:15',
                'updated_at' => '2021-05-13 20:23:15',
                'user_id' => 1,
            ),
            89 => 
            array (
                'id' => 93,
                'pedido_cliente_id' => 176,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-05-13 20:23:20',
                'updated_at' => '2021-05-13 20:23:20',
                'user_id' => 1,
            ),
            90 => 
            array (
                'id' => 94,
                'pedido_cliente_id' => 175,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-13 20:58:34',
                'updated_at' => '2021-05-13 20:58:34',
                'user_id' => 1,
            ),
            91 => 
            array (
                'id' => 95,
                'pedido_cliente_id' => 177,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-05-14 18:57:39',
                'updated_at' => '2021-05-14 18:57:39',
                'user_id' => 1,
            ),
            92 => 
            array (
                'id' => 96,
                'pedido_cliente_id' => 176,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-14 19:54:58',
                'updated_at' => '2021-05-14 19:54:58',
                'user_id' => 1,
            ),
            93 => 
            array (
                'id' => 97,
                'pedido_cliente_id' => 177,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-05-18 12:49:07',
                'updated_at' => '2021-05-18 12:49:07',
                'user_id' => 1,
            ),
            94 => 
            array (
                'id' => 98,
                'pedido_cliente_id' => 177,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-05-18 12:49:12',
                'updated_at' => '2021-05-18 12:49:12',
                'user_id' => 1,
            ),
            95 => 
            array (
                'id' => 99,
                'pedido_cliente_id' => 177,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-18 12:49:56',
                'updated_at' => '2021-05-18 12:49:56',
                'user_id' => 1,
            ),
            96 => 
            array (
                'id' => 100,
                'pedido_cliente_id' => 178,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-05-18 16:15:38',
                'updated_at' => '2021-05-18 16:15:38',
                'user_id' => 1,
            ),
            97 => 
            array (
                'id' => 101,
                'pedido_cliente_id' => 178,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-05-18 16:15:55',
                'updated_at' => '2021-05-18 16:15:55',
                'user_id' => 1,
            ),
            98 => 
            array (
                'id' => 102,
                'pedido_cliente_id' => 178,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-05-18 16:16:30',
                'updated_at' => '2021-05-18 16:16:30',
                'user_id' => 1,
            ),
            99 => 
            array (
                'id' => 103,
                'pedido_cliente_id' => 178,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-18 16:17:06',
                'updated_at' => '2021-05-18 16:17:06',
                'user_id' => 1,
            ),
            100 => 
            array (
                'id' => 104,
                'pedido_cliente_id' => 179,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-05-18 16:17:21',
                'updated_at' => '2021-05-18 16:17:21',
                'user_id' => 1,
            ),
            101 => 
            array (
                'id' => 105,
                'pedido_cliente_id' => 179,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-05-18 16:17:23',
                'updated_at' => '2021-05-18 16:17:23',
                'user_id' => 1,
            ),
            102 => 
            array (
                'id' => 106,
                'pedido_cliente_id' => 179,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-05-18 16:17:26',
                'updated_at' => '2021-05-18 16:17:26',
                'user_id' => 1,
            ),
            103 => 
            array (
                'id' => 107,
                'pedido_cliente_id' => 179,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-18 16:17:41',
                'updated_at' => '2021-05-18 16:17:41',
                'user_id' => 1,
            ),
            104 => 
            array (
                'id' => 108,
                'pedido_cliente_id' => 180,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-05-19 16:04:35',
                'updated_at' => '2021-05-19 16:04:35',
                'user_id' => 1,
            ),
            105 => 
            array (
                'id' => 109,
                'pedido_cliente_id' => 180,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-05-19 16:04:36',
                'updated_at' => '2021-05-19 16:04:36',
                'user_id' => 1,
            ),
            106 => 
            array (
                'id' => 110,
                'pedido_cliente_id' => 180,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-05-19 16:04:40',
                'updated_at' => '2021-05-19 16:04:40',
                'user_id' => 1,
            ),
            107 => 
            array (
                'id' => 111,
                'pedido_cliente_id' => 180,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-19 16:28:31',
                'updated_at' => '2021-05-19 16:28:31',
                'user_id' => 1,
            ),
            108 => 
            array (
                'id' => 112,
                'pedido_cliente_id' => 181,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-05-19 16:44:41',
                'updated_at' => '2021-05-19 16:44:41',
                'user_id' => 1,
            ),
            109 => 
            array (
                'id' => 113,
                'pedido_cliente_id' => 181,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-05-19 16:44:43',
                'updated_at' => '2021-05-19 16:44:43',
                'user_id' => 1,
            ),
            110 => 
            array (
                'id' => 114,
                'pedido_cliente_id' => 181,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-05-19 16:44:46',
                'updated_at' => '2021-05-19 16:44:46',
                'user_id' => 1,
            ),
            111 => 
            array (
                'id' => 115,
                'pedido_cliente_id' => 181,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-19 16:45:05',
                'updated_at' => '2021-05-19 16:45:05',
                'user_id' => 1,
            ),
            112 => 
            array (
                'id' => 116,
                'pedido_cliente_id' => 182,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-05-19 16:47:13',
                'updated_at' => '2021-05-19 16:47:13',
                'user_id' => 1,
            ),
            113 => 
            array (
                'id' => 117,
                'pedido_cliente_id' => 182,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-05-19 16:47:15',
                'updated_at' => '2021-05-19 16:47:15',
                'user_id' => 1,
            ),
            114 => 
            array (
                'id' => 118,
                'pedido_cliente_id' => 182,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-05-19 16:47:20',
                'updated_at' => '2021-05-19 16:47:20',
                'user_id' => 1,
            ),
            115 => 
            array (
                'id' => 119,
                'pedido_cliente_id' => 182,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-19 16:47:35',
                'updated_at' => '2021-05-19 16:47:35',
                'user_id' => 1,
            ),
            116 => 
            array (
                'id' => 120,
                'pedido_cliente_id' => 183,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-05-19 18:31:01',
                'updated_at' => '2021-05-19 18:31:01',
                'user_id' => 1,
            ),
            117 => 
            array (
                'id' => 121,
                'pedido_cliente_id' => 183,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-05-19 18:31:02',
                'updated_at' => '2021-05-19 18:31:02',
                'user_id' => 1,
            ),
            118 => 
            array (
                'id' => 122,
                'pedido_cliente_id' => 183,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-05-19 18:31:06',
                'updated_at' => '2021-05-19 18:31:06',
                'user_id' => 1,
            ),
            119 => 
            array (
                'id' => 123,
                'pedido_cliente_id' => 183,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-19 18:31:29',
                'updated_at' => '2021-05-19 18:31:29',
                'user_id' => 1,
            ),
            120 => 
            array (
                'id' => 124,
                'pedido_cliente_id' => 184,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-05-19 18:33:28',
                'updated_at' => '2021-05-19 18:33:28',
                'user_id' => 1,
            ),
            121 => 
            array (
                'id' => 125,
                'pedido_cliente_id' => 184,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-05-19 18:33:30',
                'updated_at' => '2021-05-19 18:33:30',
                'user_id' => 1,
            ),
            122 => 
            array (
                'id' => 126,
                'pedido_cliente_id' => 184,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-05-19 18:33:35',
                'updated_at' => '2021-05-19 18:33:35',
                'user_id' => 1,
            ),
            123 => 
            array (
                'id' => 127,
                'pedido_cliente_id' => 184,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-19 18:33:48',
                'updated_at' => '2021-05-19 18:33:48',
                'user_id' => 1,
            ),
            124 => 
            array (
                'id' => 128,
                'pedido_cliente_id' => 185,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-05-20 01:27:04',
                'updated_at' => '2021-05-20 01:27:04',
                'user_id' => 1,
            ),
            125 => 
            array (
                'id' => 129,
                'pedido_cliente_id' => 185,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-05-20 01:27:06',
                'updated_at' => '2021-05-20 01:27:06',
                'user_id' => 1,
            ),
            126 => 
            array (
                'id' => 130,
                'pedido_cliente_id' => 185,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-05-20 01:27:21',
                'updated_at' => '2021-05-20 01:27:21',
                'user_id' => 1,
            ),
            127 => 
            array (
                'id' => 131,
                'pedido_cliente_id' => 185,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-20 01:27:44',
                'updated_at' => '2021-05-20 01:27:44',
                'user_id' => 1,
            ),
            128 => 
            array (
                'id' => 132,
                'pedido_cliente_id' => 185,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-20 01:40:38',
                'updated_at' => '2021-05-20 01:40:38',
                'user_id' => 1,
            ),
            129 => 
            array (
                'id' => 133,
                'pedido_cliente_id' => 185,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-20 01:43:25',
                'updated_at' => '2021-05-20 01:43:25',
                'user_id' => 1,
            ),
            130 => 
            array (
                'id' => 134,
                'pedido_cliente_id' => 185,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-20 02:20:58',
                'updated_at' => '2021-05-20 02:20:58',
                'user_id' => 1,
            ),
            131 => 
            array (
                'id' => 135,
                'pedido_cliente_id' => 186,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-05-20 02:26:45',
                'updated_at' => '2021-05-20 02:26:45',
                'user_id' => 1,
            ),
            132 => 
            array (
                'id' => 136,
                'pedido_cliente_id' => 186,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-05-20 02:26:46',
                'updated_at' => '2021-05-20 02:26:46',
                'user_id' => 1,
            ),
            133 => 
            array (
                'id' => 137,
                'pedido_cliente_id' => 186,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-05-20 02:26:49',
                'updated_at' => '2021-05-20 02:26:49',
                'user_id' => 1,
            ),
            134 => 
            array (
                'id' => 138,
                'pedido_cliente_id' => 186,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-20 02:27:17',
                'updated_at' => '2021-05-20 02:27:17',
                'user_id' => 1,
            ),
            135 => 
            array (
                'id' => 139,
                'pedido_cliente_id' => 183,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-20 02:32:31',
                'updated_at' => '2021-05-20 02:32:31',
                'user_id' => 1,
            ),
            136 => 
            array (
                'id' => 140,
                'pedido_cliente_id' => 184,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-20 02:42:01',
                'updated_at' => '2021-05-20 02:42:01',
                'user_id' => 1,
            ),
            137 => 
            array (
                'id' => 141,
                'pedido_cliente_id' => 185,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-20 02:54:31',
                'updated_at' => '2021-05-20 02:54:31',
                'user_id' => 1,
            ),
            138 => 
            array (
                'id' => 142,
                'pedido_cliente_id' => 186,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-20 02:54:48',
                'updated_at' => '2021-05-20 02:54:48',
                'user_id' => 1,
            ),
            139 => 
            array (
                'id' => 143,
                'pedido_cliente_id' => 186,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-20 02:54:48',
                'updated_at' => '2021-05-20 02:54:48',
                'user_id' => 1,
            ),
            140 => 
            array (
                'id' => 144,
                'pedido_cliente_id' => 167,
                'status_id' => 12,
                'description' => NULL,
                'created_at' => '2021-05-20 12:30:16',
                'updated_at' => '2021-05-20 12:30:16',
                'user_id' => 1,
            ),
            141 => 
            array (
                'id' => 145,
                'pedido_cliente_id' => 187,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-05-20 19:09:06',
                'updated_at' => '2021-05-20 19:09:06',
                'user_id' => 1,
            ),
            142 => 
            array (
                'id' => 146,
                'pedido_cliente_id' => 187,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-05-20 19:09:08',
                'updated_at' => '2021-05-20 19:09:08',
                'user_id' => 1,
            ),
            143 => 
            array (
                'id' => 147,
                'pedido_cliente_id' => 187,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-05-20 19:09:12',
                'updated_at' => '2021-05-20 19:09:12',
                'user_id' => 1,
            ),
            144 => 
            array (
                'id' => 148,
                'pedido_cliente_id' => 187,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-20 19:09:30',
                'updated_at' => '2021-05-20 19:09:30',
                'user_id' => 1,
            ),
            145 => 
            array (
                'id' => 149,
                'pedido_cliente_id' => 188,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-05-20 19:15:22',
                'updated_at' => '2021-05-20 19:15:22',
                'user_id' => 1,
            ),
            146 => 
            array (
                'id' => 150,
                'pedido_cliente_id' => 188,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-05-20 19:15:26',
                'updated_at' => '2021-05-20 19:15:26',
                'user_id' => 1,
            ),
            147 => 
            array (
                'id' => 151,
                'pedido_cliente_id' => 188,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-05-20 19:15:32',
                'updated_at' => '2021-05-20 19:15:32',
                'user_id' => 1,
            ),
            148 => 
            array (
                'id' => 152,
                'pedido_cliente_id' => 188,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-20 19:15:48',
                'updated_at' => '2021-05-20 19:15:48',
                'user_id' => 1,
            ),
            149 => 
            array (
                'id' => 153,
                'pedido_cliente_id' => 189,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-05-20 21:07:30',
                'updated_at' => '2021-05-20 21:07:30',
                'user_id' => 1,
            ),
            150 => 
            array (
                'id' => 154,
                'pedido_cliente_id' => 189,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-05-20 21:07:31',
                'updated_at' => '2021-05-20 21:07:31',
                'user_id' => 1,
            ),
            151 => 
            array (
                'id' => 155,
                'pedido_cliente_id' => 189,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-05-20 21:07:35',
                'updated_at' => '2021-05-20 21:07:35',
                'user_id' => 1,
            ),
            152 => 
            array (
                'id' => 156,
                'pedido_cliente_id' => 189,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-20 21:07:46',
                'updated_at' => '2021-05-20 21:07:46',
                'user_id' => 1,
            ),
            153 => 
            array (
                'id' => 157,
                'pedido_cliente_id' => 190,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-05-21 12:25:15',
                'updated_at' => '2021-05-21 12:25:15',
                'user_id' => 1,
            ),
            154 => 
            array (
                'id' => 158,
                'pedido_cliente_id' => 190,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-05-21 12:25:22',
                'updated_at' => '2021-05-21 12:25:22',
                'user_id' => 1,
            ),
            155 => 
            array (
                'id' => 159,
                'pedido_cliente_id' => 190,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-05-21 12:25:38',
                'updated_at' => '2021-05-21 12:25:38',
                'user_id' => 1,
            ),
            156 => 
            array (
                'id' => 160,
                'pedido_cliente_id' => 190,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-21 12:26:02',
                'updated_at' => '2021-05-21 12:26:02',
                'user_id' => 1,
            ),
            157 => 
            array (
                'id' => 161,
                'pedido_cliente_id' => 187,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-21 12:45:33',
                'updated_at' => '2021-05-21 12:45:33',
                'user_id' => 1,
            ),
            158 => 
            array (
                'id' => 162,
                'pedido_cliente_id' => 187,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-21 12:45:40',
                'updated_at' => '2021-05-21 12:45:40',
                'user_id' => 1,
            ),
            159 => 
            array (
                'id' => 163,
                'pedido_cliente_id' => 191,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-05-21 16:00:38',
                'updated_at' => '2021-05-21 16:00:38',
                'user_id' => 1,
            ),
            160 => 
            array (
                'id' => 164,
                'pedido_cliente_id' => 191,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-05-21 16:00:39',
                'updated_at' => '2021-05-21 16:00:39',
                'user_id' => 1,
            ),
            161 => 
            array (
                'id' => 165,
                'pedido_cliente_id' => 191,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-05-21 16:00:54',
                'updated_at' => '2021-05-21 16:00:54',
                'user_id' => 1,
            ),
            162 => 
            array (
                'id' => 166,
                'pedido_cliente_id' => 191,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-21 16:01:32',
                'updated_at' => '2021-05-21 16:01:32',
                'user_id' => 1,
            ),
            163 => 
            array (
                'id' => 167,
                'pedido_cliente_id' => 182,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-21 18:48:32',
                'updated_at' => '2021-05-21 18:48:32',
                'user_id' => 1,
            ),
            164 => 
            array (
                'id' => 168,
                'pedido_cliente_id' => 192,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-05-21 18:48:32',
                'updated_at' => '2021-05-21 18:48:32',
                'user_id' => 1,
            ),
            165 => 
            array (
                'id' => 169,
                'pedido_cliente_id' => 192,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-05-21 18:48:35',
                'updated_at' => '2021-05-21 18:48:35',
                'user_id' => 1,
            ),
            166 => 
            array (
                'id' => 170,
                'pedido_cliente_id' => 192,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-05-21 18:48:40',
                'updated_at' => '2021-05-21 18:48:40',
                'user_id' => 1,
            ),
            167 => 
            array (
                'id' => 171,
                'pedido_cliente_id' => 192,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-21 18:48:49',
                'updated_at' => '2021-05-21 18:48:49',
                'user_id' => 1,
            ),
            168 => 
            array (
                'id' => 172,
                'pedido_cliente_id' => 192,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-21 18:48:49',
                'updated_at' => '2021-05-21 18:48:49',
                'user_id' => 1,
            ),
            169 => 
            array (
                'id' => 173,
                'pedido_cliente_id' => 192,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-21 18:48:49',
                'updated_at' => '2021-05-21 18:48:49',
                'user_id' => 1,
            ),
            170 => 
            array (
                'id' => 174,
                'pedido_cliente_id' => 181,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-26 20:10:34',
                'updated_at' => '2021-05-26 20:10:34',
                'user_id' => 1,
            ),
            171 => 
            array (
                'id' => 175,
                'pedido_cliente_id' => 190,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-26 20:38:38',
                'updated_at' => '2021-05-26 20:38:38',
                'user_id' => 1,
            ),
            172 => 
            array (
                'id' => 176,
                'pedido_cliente_id' => 189,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-28 17:08:53',
                'updated_at' => '2021-05-28 17:08:53',
                'user_id' => 1,
            ),
            173 => 
            array (
                'id' => 177,
                'pedido_cliente_id' => 188,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-28 17:29:46',
                'updated_at' => '2021-05-28 17:29:46',
                'user_id' => 1,
            ),
            174 => 
            array (
                'id' => 178,
                'pedido_cliente_id' => 186,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-28 17:41:21',
                'updated_at' => '2021-05-28 17:41:21',
                'user_id' => 1,
            ),
            175 => 
            array (
                'id' => 179,
                'pedido_cliente_id' => 185,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-28 17:51:00',
                'updated_at' => '2021-05-28 17:51:00',
                'user_id' => 1,
            ),
            176 => 
            array (
                'id' => 180,
                'pedido_cliente_id' => 184,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-05-28 17:55:12',
                'updated_at' => '2021-05-28 17:55:12',
                'user_id' => 1,
            ),
            177 => 
            array (
                'id' => 181,
                'pedido_cliente_id' => 183,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-06-01 01:57:51',
                'updated_at' => '2021-06-01 01:57:51',
                'user_id' => 1,
            ),
            178 => 
            array (
                'id' => 182,
                'pedido_cliente_id' => 225,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-06-01 02:27:10',
                'updated_at' => '2021-06-01 02:27:10',
                'user_id' => 1,
            ),
            179 => 
            array (
                'id' => 183,
                'pedido_cliente_id' => 225,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-06-01 02:27:11',
                'updated_at' => '2021-06-01 02:27:11',
                'user_id' => 1,
            ),
            180 => 
            array (
                'id' => 184,
                'pedido_cliente_id' => 225,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-06-01 02:27:14',
                'updated_at' => '2021-06-01 02:27:14',
                'user_id' => 1,
            ),
            181 => 
            array (
                'id' => 185,
                'pedido_cliente_id' => 225,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-06-01 02:27:35',
                'updated_at' => '2021-06-01 02:27:35',
                'user_id' => 1,
            ),
            182 => 
            array (
                'id' => 186,
                'pedido_cliente_id' => 226,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-06-01 02:33:59',
                'updated_at' => '2021-06-01 02:33:59',
                'user_id' => 1,
            ),
            183 => 
            array (
                'id' => 187,
                'pedido_cliente_id' => 226,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-06-01 02:34:01',
                'updated_at' => '2021-06-01 02:34:01',
                'user_id' => 1,
            ),
            184 => 
            array (
                'id' => 188,
                'pedido_cliente_id' => 226,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-06-01 02:34:04',
                'updated_at' => '2021-06-01 02:34:04',
                'user_id' => 1,
            ),
            185 => 
            array (
                'id' => 189,
                'pedido_cliente_id' => 226,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-06-01 02:34:19',
                'updated_at' => '2021-06-01 02:34:19',
                'user_id' => 1,
            ),
            186 => 
            array (
                'id' => 190,
                'pedido_cliente_id' => 227,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-06-01 02:36:10',
                'updated_at' => '2021-06-01 02:36:10',
                'user_id' => 1,
            ),
            187 => 
            array (
                'id' => 191,
                'pedido_cliente_id' => 227,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-06-01 02:36:11',
                'updated_at' => '2021-06-01 02:36:11',
                'user_id' => 1,
            ),
            188 => 
            array (
                'id' => 192,
                'pedido_cliente_id' => 227,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-06-01 02:36:14',
                'updated_at' => '2021-06-01 02:36:14',
                'user_id' => 1,
            ),
            189 => 
            array (
                'id' => 193,
                'pedido_cliente_id' => 227,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-06-01 02:36:26',
                'updated_at' => '2021-06-01 02:36:26',
                'user_id' => 1,
            ),
            190 => 
            array (
                'id' => 194,
                'pedido_cliente_id' => 228,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-06-01 02:38:45',
                'updated_at' => '2021-06-01 02:38:45',
                'user_id' => 1,
            ),
            191 => 
            array (
                'id' => 195,
                'pedido_cliente_id' => 228,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-06-01 02:38:46',
                'updated_at' => '2021-06-01 02:38:46',
                'user_id' => 1,
            ),
            192 => 
            array (
                'id' => 196,
                'pedido_cliente_id' => 228,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-06-01 02:38:50',
                'updated_at' => '2021-06-01 02:38:50',
                'user_id' => 1,
            ),
            193 => 
            array (
                'id' => 197,
                'pedido_cliente_id' => 228,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-06-01 02:39:03',
                'updated_at' => '2021-06-01 02:39:03',
                'user_id' => 1,
            ),
            194 => 
            array (
                'id' => 198,
                'pedido_cliente_id' => 229,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-06-01 02:43:33',
                'updated_at' => '2021-06-01 02:43:33',
                'user_id' => 1,
            ),
            195 => 
            array (
                'id' => 199,
                'pedido_cliente_id' => 229,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-06-01 02:43:34',
                'updated_at' => '2021-06-01 02:43:34',
                'user_id' => 1,
            ),
            196 => 
            array (
                'id' => 200,
                'pedido_cliente_id' => 229,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-06-01 02:43:37',
                'updated_at' => '2021-06-01 02:43:37',
                'user_id' => 1,
            ),
            197 => 
            array (
                'id' => 201,
                'pedido_cliente_id' => 229,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-06-01 02:43:54',
                'updated_at' => '2021-06-01 02:43:54',
                'user_id' => 1,
            ),
            198 => 
            array (
                'id' => 202,
                'pedido_cliente_id' => 230,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-06-01 03:09:19',
                'updated_at' => '2021-06-01 03:09:19',
                'user_id' => 1,
            ),
            199 => 
            array (
                'id' => 203,
                'pedido_cliente_id' => 230,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-06-01 03:09:20',
                'updated_at' => '2021-06-01 03:09:20',
                'user_id' => 1,
            ),
            200 => 
            array (
                'id' => 204,
                'pedido_cliente_id' => 230,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-06-01 03:09:24',
                'updated_at' => '2021-06-01 03:09:24',
                'user_id' => 1,
            ),
            201 => 
            array (
                'id' => 205,
                'pedido_cliente_id' => 230,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-06-01 03:09:39',
                'updated_at' => '2021-06-01 03:09:39',
                'user_id' => 1,
            ),
            202 => 
            array (
                'id' => 206,
                'pedido_cliente_id' => 231,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-06-01 03:17:05',
                'updated_at' => '2021-06-01 03:17:05',
                'user_id' => 1,
            ),
            203 => 
            array (
                'id' => 207,
                'pedido_cliente_id' => 231,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-06-01 03:17:07',
                'updated_at' => '2021-06-01 03:17:07',
                'user_id' => 1,
            ),
            204 => 
            array (
                'id' => 208,
                'pedido_cliente_id' => 231,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-06-01 03:17:10',
                'updated_at' => '2021-06-01 03:17:10',
                'user_id' => 1,
            ),
            205 => 
            array (
                'id' => 209,
                'pedido_cliente_id' => 231,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-06-01 03:17:23',
                'updated_at' => '2021-06-01 03:17:23',
                'user_id' => 1,
            ),
            206 => 
            array (
                'id' => 210,
                'pedido_cliente_id' => 193,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-06-01 20:30:59',
                'updated_at' => '2021-06-01 20:30:59',
                'user_id' => 1,
            ),
            207 => 
            array (
                'id' => 211,
                'pedido_cliente_id' => 193,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-06-01 20:31:07',
                'updated_at' => '2021-06-01 20:31:07',
                'user_id' => 1,
            ),
            208 => 
            array (
                'id' => 212,
                'pedido_cliente_id' => 193,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-06-01 20:31:11',
                'updated_at' => '2021-06-01 20:31:11',
                'user_id' => 1,
            ),
            209 => 
            array (
                'id' => 213,
                'pedido_cliente_id' => 234,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-06-02 02:18:17',
                'updated_at' => '2021-06-02 02:18:17',
                'user_id' => 1,
            ),
            210 => 
            array (
                'id' => 214,
                'pedido_cliente_id' => 234,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-06-02 02:18:19',
                'updated_at' => '2021-06-02 02:18:19',
                'user_id' => 1,
            ),
            211 => 
            array (
                'id' => 215,
                'pedido_cliente_id' => 234,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-06-02 02:18:21',
                'updated_at' => '2021-06-02 02:18:21',
                'user_id' => 1,
            ),
            212 => 
            array (
                'id' => 216,
                'pedido_cliente_id' => 243,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-06-02 17:44:30',
                'updated_at' => '2021-06-02 17:44:30',
                'user_id' => 1,
            ),
            213 => 
            array (
                'id' => 217,
                'pedido_cliente_id' => 243,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-06-02 17:44:32',
                'updated_at' => '2021-06-02 17:44:32',
                'user_id' => 1,
            ),
            214 => 
            array (
                'id' => 218,
                'pedido_cliente_id' => 243,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-06-02 17:44:36',
                'updated_at' => '2021-06-02 17:44:36',
                'user_id' => 1,
            ),
            215 => 
            array (
                'id' => 219,
                'pedido_cliente_id' => 243,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-06-03 02:12:32',
                'updated_at' => '2021-06-03 02:12:32',
                'user_id' => 1,
            ),
            216 => 
            array (
                'id' => 220,
                'pedido_cliente_id' => 234,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-06-03 02:24:15',
                'updated_at' => '2021-06-03 02:24:15',
                'user_id' => 1,
            ),
            217 => 
            array (
                'id' => 221,
                'pedido_cliente_id' => 248,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-06-03 02:26:35',
                'updated_at' => '2021-06-03 02:26:35',
                'user_id' => 1,
            ),
            218 => 
            array (
                'id' => 222,
                'pedido_cliente_id' => 248,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-06-03 02:26:37',
                'updated_at' => '2021-06-03 02:26:37',
                'user_id' => 1,
            ),
            219 => 
            array (
                'id' => 223,
                'pedido_cliente_id' => 248,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-06-03 02:26:40',
                'updated_at' => '2021-06-03 02:26:40',
                'user_id' => 1,
            ),
            220 => 
            array (
                'id' => 224,
                'pedido_cliente_id' => 248,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-06-03 02:26:58',
                'updated_at' => '2021-06-03 02:26:58',
                'user_id' => 1,
            ),
            221 => 
            array (
                'id' => 225,
                'pedido_cliente_id' => 250,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-06-03 02:28:33',
                'updated_at' => '2021-06-03 02:28:33',
                'user_id' => 1,
            ),
            222 => 
            array (
                'id' => 226,
                'pedido_cliente_id' => 250,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-06-03 02:28:34',
                'updated_at' => '2021-06-03 02:28:34',
                'user_id' => 1,
            ),
            223 => 
            array (
                'id' => 227,
                'pedido_cliente_id' => 250,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-06-03 02:28:39',
                'updated_at' => '2021-06-03 02:28:39',
                'user_id' => 1,
            ),
            224 => 
            array (
                'id' => 228,
                'pedido_cliente_id' => 250,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-06-03 02:28:57',
                'updated_at' => '2021-06-03 02:28:57',
                'user_id' => 1,
            ),
            225 => 
            array (
                'id' => 229,
                'pedido_cliente_id' => 251,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-06-03 02:30:20',
                'updated_at' => '2021-06-03 02:30:20',
                'user_id' => 1,
            ),
            226 => 
            array (
                'id' => 230,
                'pedido_cliente_id' => 251,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-06-03 02:30:21',
                'updated_at' => '2021-06-03 02:30:21',
                'user_id' => 1,
            ),
            227 => 
            array (
                'id' => 231,
                'pedido_cliente_id' => 251,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-06-03 02:30:24',
                'updated_at' => '2021-06-03 02:30:24',
                'user_id' => 1,
            ),
            228 => 
            array (
                'id' => 232,
                'pedido_cliente_id' => 251,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-06-03 02:30:35',
                'updated_at' => '2021-06-03 02:30:35',
                'user_id' => 1,
            ),
            229 => 
            array (
                'id' => 233,
                'pedido_cliente_id' => 252,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-06-03 11:43:31',
                'updated_at' => '2021-06-03 11:43:31',
                'user_id' => 1,
            ),
            230 => 
            array (
                'id' => 234,
                'pedido_cliente_id' => 252,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-06-03 11:43:35',
                'updated_at' => '2021-06-03 11:43:35',
                'user_id' => 1,
            ),
            231 => 
            array (
                'id' => 235,
                'pedido_cliente_id' => 252,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-06-03 11:43:41',
                'updated_at' => '2021-06-03 11:43:41',
                'user_id' => 1,
            ),
            232 => 
            array (
                'id' => 236,
                'pedido_cliente_id' => 252,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-06-03 11:44:01',
                'updated_at' => '2021-06-03 11:44:01',
                'user_id' => 1,
            ),
            233 => 
            array (
                'id' => 237,
                'pedido_cliente_id' => 249,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-06-03 11:54:05',
                'updated_at' => '2021-06-03 11:54:05',
                'user_id' => 1,
            ),
            234 => 
            array (
                'id' => 238,
                'pedido_cliente_id' => 249,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-06-03 11:54:05',
                'updated_at' => '2021-06-03 11:54:05',
                'user_id' => 1,
            ),
            235 => 
            array (
                'id' => 239,
                'pedido_cliente_id' => 249,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-06-03 11:54:14',
                'updated_at' => '2021-06-03 11:54:14',
                'user_id' => 1,
            ),
            236 => 
            array (
                'id' => 240,
                'pedido_cliente_id' => 249,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-06-03 11:54:14',
                'updated_at' => '2021-06-03 11:54:14',
                'user_id' => 1,
            ),
            237 => 
            array (
                'id' => 241,
                'pedido_cliente_id' => 249,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-06-03 11:54:18',
                'updated_at' => '2021-06-03 11:54:18',
                'user_id' => 1,
            ),
            238 => 
            array (
                'id' => 242,
                'pedido_cliente_id' => 249,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-06-03 11:54:20',
                'updated_at' => '2021-06-03 11:54:20',
                'user_id' => 1,
            ),
            239 => 
            array (
                'id' => 243,
                'pedido_cliente_id' => 249,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-06-03 11:54:43',
                'updated_at' => '2021-06-03 11:54:43',
                'user_id' => 1,
            ),
            240 => 
            array (
                'id' => 244,
                'pedido_cliente_id' => 247,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-06-03 12:02:26',
                'updated_at' => '2021-06-03 12:02:26',
                'user_id' => 1,
            ),
            241 => 
            array (
                'id' => 245,
                'pedido_cliente_id' => 247,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-06-03 12:02:30',
                'updated_at' => '2021-06-03 12:02:30',
                'user_id' => 1,
            ),
            242 => 
            array (
                'id' => 246,
                'pedido_cliente_id' => 247,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-06-03 12:02:36',
                'updated_at' => '2021-06-03 12:02:36',
                'user_id' => 1,
            ),
            243 => 
            array (
                'id' => 247,
                'pedido_cliente_id' => 247,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-06-03 12:02:55',
                'updated_at' => '2021-06-03 12:02:55',
                'user_id' => 1,
            ),
            244 => 
            array (
                'id' => 248,
                'pedido_cliente_id' => 246,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-06-03 12:15:02',
                'updated_at' => '2021-06-03 12:15:02',
                'user_id' => 1,
            ),
            245 => 
            array (
                'id' => 249,
                'pedido_cliente_id' => 246,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-06-03 12:15:07',
                'updated_at' => '2021-06-03 12:15:07',
                'user_id' => 1,
            ),
            246 => 
            array (
                'id' => 250,
                'pedido_cliente_id' => 246,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-06-03 12:15:11',
                'updated_at' => '2021-06-03 12:15:11',
                'user_id' => 1,
            ),
            247 => 
            array (
                'id' => 251,
                'pedido_cliente_id' => 246,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-06-03 12:15:28',
                'updated_at' => '2021-06-03 12:15:28',
                'user_id' => 1,
            ),
            248 => 
            array (
                'id' => 252,
                'pedido_cliente_id' => 245,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-06-03 12:37:12',
                'updated_at' => '2021-06-03 12:37:12',
                'user_id' => 1,
            ),
            249 => 
            array (
                'id' => 253,
                'pedido_cliente_id' => 245,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-06-03 12:37:19',
                'updated_at' => '2021-06-03 12:37:19',
                'user_id' => 1,
            ),
            250 => 
            array (
                'id' => 254,
                'pedido_cliente_id' => 245,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-06-03 12:37:22',
                'updated_at' => '2021-06-03 12:37:22',
                'user_id' => 1,
            ),
            251 => 
            array (
                'id' => 255,
                'pedido_cliente_id' => 245,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-06-03 12:37:35',
                'updated_at' => '2021-06-03 12:37:35',
                'user_id' => 1,
            ),
            252 => 
            array (
                'id' => 256,
                'pedido_cliente_id' => 244,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-06-03 13:00:53',
                'updated_at' => '2021-06-03 13:00:53',
                'user_id' => 1,
            ),
            253 => 
            array (
                'id' => 257,
                'pedido_cliente_id' => 244,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-06-03 13:00:57',
                'updated_at' => '2021-06-03 13:00:57',
                'user_id' => 1,
            ),
            254 => 
            array (
                'id' => 258,
                'pedido_cliente_id' => 244,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-06-03 13:01:01',
                'updated_at' => '2021-06-03 13:01:01',
                'user_id' => 1,
            ),
            255 => 
            array (
                'id' => 259,
                'pedido_cliente_id' => 244,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-06-03 13:01:20',
                'updated_at' => '2021-06-03 13:01:20',
                'user_id' => 1,
            ),
            256 => 
            array (
                'id' => 260,
                'pedido_cliente_id' => 242,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-06-03 16:31:18',
                'updated_at' => '2021-06-03 16:31:18',
                'user_id' => 1,
            ),
            257 => 
            array (
                'id' => 261,
                'pedido_cliente_id' => 242,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-06-03 16:31:21',
                'updated_at' => '2021-06-03 16:31:21',
                'user_id' => 1,
            ),
            258 => 
            array (
                'id' => 262,
                'pedido_cliente_id' => 242,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-06-03 16:31:23',
                'updated_at' => '2021-06-03 16:31:23',
                'user_id' => 1,
            ),
            259 => 
            array (
                'id' => 263,
                'pedido_cliente_id' => 242,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-06-03 16:31:43',
                'updated_at' => '2021-06-03 16:31:43',
                'user_id' => 1,
            ),
            260 => 
            array (
                'id' => 264,
                'pedido_cliente_id' => 253,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-06-03 16:34:31',
                'updated_at' => '2021-06-03 16:34:31',
                'user_id' => 1,
            ),
            261 => 
            array (
                'id' => 265,
                'pedido_cliente_id' => 253,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-06-03 16:34:38',
                'updated_at' => '2021-06-03 16:34:38',
                'user_id' => 1,
            ),
            262 => 
            array (
                'id' => 266,
                'pedido_cliente_id' => 253,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-06-03 16:34:41',
                'updated_at' => '2021-06-03 16:34:41',
                'user_id' => 1,
            ),
            263 => 
            array (
                'id' => 267,
                'pedido_cliente_id' => 253,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-06-03 16:34:54',
                'updated_at' => '2021-06-03 16:34:54',
                'user_id' => 1,
            ),
            264 => 
            array (
                'id' => 268,
                'pedido_cliente_id' => 254,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-06-03 16:46:31',
                'updated_at' => '2021-06-03 16:46:31',
                'user_id' => 1,
            ),
            265 => 
            array (
                'id' => 269,
                'pedido_cliente_id' => 254,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-06-03 16:46:33',
                'updated_at' => '2021-06-03 16:46:33',
                'user_id' => 1,
            ),
            266 => 
            array (
                'id' => 270,
                'pedido_cliente_id' => 254,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-06-03 16:46:36',
                'updated_at' => '2021-06-03 16:46:36',
                'user_id' => 1,
            ),
            267 => 
            array (
                'id' => 271,
                'pedido_cliente_id' => 254,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-06-03 16:46:57',
                'updated_at' => '2021-06-03 16:46:57',
                'user_id' => 1,
            ),
            268 => 
            array (
                'id' => 272,
                'pedido_cliente_id' => 255,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-06-03 16:49:58',
                'updated_at' => '2021-06-03 16:49:58',
                'user_id' => 1,
            ),
            269 => 
            array (
                'id' => 273,
                'pedido_cliente_id' => 255,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-06-03 16:49:59',
                'updated_at' => '2021-06-03 16:49:59',
                'user_id' => 1,
            ),
            270 => 
            array (
                'id' => 274,
                'pedido_cliente_id' => 255,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-06-03 16:50:02',
                'updated_at' => '2021-06-03 16:50:02',
                'user_id' => 1,
            ),
            271 => 
            array (
                'id' => 275,
                'pedido_cliente_id' => 255,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-06-03 16:50:18',
                'updated_at' => '2021-06-03 16:50:18',
                'user_id' => 1,
            ),
            272 => 
            array (
                'id' => 276,
                'pedido_cliente_id' => 241,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-06-04 02:38:40',
                'updated_at' => '2021-06-04 02:38:40',
                'user_id' => 1,
            ),
            273 => 
            array (
                'id' => 277,
                'pedido_cliente_id' => 241,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-06-04 02:42:34',
                'updated_at' => '2021-06-04 02:42:34',
                'user_id' => 1,
            ),
            274 => 
            array (
                'id' => 278,
                'pedido_cliente_id' => 241,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-06-04 02:42:41',
                'updated_at' => '2021-06-04 02:42:41',
                'user_id' => 1,
            ),
            275 => 
            array (
                'id' => 279,
                'pedido_cliente_id' => 240,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-06-04 02:44:58',
                'updated_at' => '2021-06-04 02:44:58',
                'user_id' => 1,
            ),
            276 => 
            array (
                'id' => 280,
                'pedido_cliente_id' => 240,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-06-04 02:45:13',
                'updated_at' => '2021-06-04 02:45:13',
                'user_id' => 1,
            ),
            277 => 
            array (
                'id' => 281,
                'pedido_cliente_id' => 240,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-06-04 02:45:33',
                'updated_at' => '2021-06-04 02:45:33',
                'user_id' => 1,
            ),
            278 => 
            array (
                'id' => 282,
                'pedido_cliente_id' => 240,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-06-04 02:45:46',
                'updated_at' => '2021-06-04 02:45:46',
                'user_id' => 1,
            ),
            279 => 
            array (
                'id' => 283,
                'pedido_cliente_id' => 240,
                'status_id' => 12,
                'description' => NULL,
                'created_at' => '2021-06-04 02:46:06',
                'updated_at' => '2021-06-04 02:46:06',
                'user_id' => 1,
            ),
            280 => 
            array (
                'id' => 284,
                'pedido_cliente_id' => 240,
                'status_id' => 13,
                'description' => NULL,
                'created_at' => '2021-06-04 02:46:09',
                'updated_at' => '2021-06-04 02:46:09',
                'user_id' => 1,
            ),
            281 => 
            array (
                'id' => 285,
                'pedido_cliente_id' => 239,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-06-04 02:47:58',
                'updated_at' => '2021-06-04 02:47:58',
                'user_id' => 1,
            ),
            282 => 
            array (
                'id' => 286,
                'pedido_cliente_id' => 239,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-06-04 02:48:21',
                'updated_at' => '2021-06-04 02:48:21',
                'user_id' => 1,
            ),
            283 => 
            array (
                'id' => 287,
                'pedido_cliente_id' => 251,
                'status_id' => 12,
                'description' => NULL,
                'created_at' => '2021-06-04 16:16:42',
                'updated_at' => '2021-06-04 16:16:42',
                'user_id' => 1,
            ),
            284 => 
            array (
                'id' => 288,
                'pedido_cliente_id' => 238,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-06-04 18:46:41',
                'updated_at' => '2021-06-04 18:46:41',
                'user_id' => 1,
            ),
            285 => 
            array (
                'id' => 289,
                'pedido_cliente_id' => 238,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-06-04 18:46:51',
                'updated_at' => '2021-06-04 18:46:51',
                'user_id' => 1,
            ),
            286 => 
            array (
                'id' => 290,
                'pedido_cliente_id' => 238,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-06-04 18:46:55',
                'updated_at' => '2021-06-04 18:46:55',
                'user_id' => 1,
            ),
            287 => 
            array (
                'id' => 291,
                'pedido_cliente_id' => 238,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-06-04 18:47:19',
                'updated_at' => '2021-06-04 18:47:19',
                'user_id' => 1,
            ),
            288 => 
            array (
                'id' => 292,
                'pedido_cliente_id' => 237,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-06-05 14:09:18',
                'updated_at' => '2021-06-05 14:09:18',
                'user_id' => 1,
            ),
            289 => 
            array (
                'id' => 293,
                'pedido_cliente_id' => 237,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-06-05 14:09:52',
                'updated_at' => '2021-06-05 14:09:52',
                'user_id' => 1,
            ),
            290 => 
            array (
                'id' => 294,
                'pedido_cliente_id' => 237,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-06-05 14:10:00',
                'updated_at' => '2021-06-05 14:10:00',
                'user_id' => 1,
            ),
            291 => 
            array (
                'id' => 295,
                'pedido_cliente_id' => 237,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-06-05 14:10:02',
                'updated_at' => '2021-06-05 14:10:02',
                'user_id' => 1,
            ),
            292 => 
            array (
                'id' => 296,
                'pedido_cliente_id' => 236,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-06-05 14:36:13',
                'updated_at' => '2021-06-05 14:36:13',
                'user_id' => 1,
            ),
            293 => 
            array (
                'id' => 297,
                'pedido_cliente_id' => 236,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-06-05 14:36:20',
                'updated_at' => '2021-06-05 14:36:20',
                'user_id' => 1,
            ),
            294 => 
            array (
                'id' => 298,
                'pedido_cliente_id' => 236,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-06-05 14:36:27',
                'updated_at' => '2021-06-05 14:36:27',
                'user_id' => 1,
            ),
            295 => 
            array (
                'id' => 299,
                'pedido_cliente_id' => 239,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-06-05 14:42:55',
                'updated_at' => '2021-06-05 14:42:55',
                'user_id' => 1,
            ),
            296 => 
            array (
                'id' => 300,
                'pedido_cliente_id' => 195,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-06-05 14:46:05',
                'updated_at' => '2021-06-05 14:46:05',
                'user_id' => 1,
            ),
            297 => 
            array (
                'id' => 301,
                'pedido_cliente_id' => 195,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-06-05 14:46:10',
                'updated_at' => '2021-06-05 14:46:10',
                'user_id' => 1,
            ),
            298 => 
            array (
                'id' => 302,
                'pedido_cliente_id' => 195,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-06-05 14:46:15',
                'updated_at' => '2021-06-05 14:46:15',
                'user_id' => 1,
            ),
            299 => 
            array (
                'id' => 303,
                'pedido_cliente_id' => 194,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-06-05 14:55:54',
                'updated_at' => '2021-06-05 14:55:54',
                'user_id' => 1,
            ),
            300 => 
            array (
                'id' => 304,
                'pedido_cliente_id' => 194,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-06-05 14:55:55',
                'updated_at' => '2021-06-05 14:55:55',
                'user_id' => 1,
            ),
            301 => 
            array (
                'id' => 305,
                'pedido_cliente_id' => 194,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-06-05 14:56:00',
                'updated_at' => '2021-06-05 14:56:00',
                'user_id' => 1,
            ),
            302 => 
            array (
                'id' => 306,
                'pedido_cliente_id' => 235,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-06-05 14:58:31',
                'updated_at' => '2021-06-05 14:58:31',
                'user_id' => 1,
            ),
            303 => 
            array (
                'id' => 307,
                'pedido_cliente_id' => 235,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-06-05 14:58:38',
                'updated_at' => '2021-06-05 14:58:38',
                'user_id' => 1,
            ),
            304 => 
            array (
                'id' => 308,
                'pedido_cliente_id' => 235,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-06-05 14:58:53',
                'updated_at' => '2021-06-05 14:58:53',
                'user_id' => 1,
            ),
            305 => 
            array (
                'id' => 309,
                'pedido_cliente_id' => 233,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-06-07 15:18:54',
                'updated_at' => '2021-06-07 15:18:54',
                'user_id' => 1,
            ),
            306 => 
            array (
                'id' => 310,
                'pedido_cliente_id' => 233,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-06-07 15:18:57',
                'updated_at' => '2021-06-07 15:18:57',
                'user_id' => 1,
            ),
            307 => 
            array (
                'id' => 311,
                'pedido_cliente_id' => 233,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-06-07 15:19:01',
                'updated_at' => '2021-06-07 15:19:01',
                'user_id' => 1,
            ),
            308 => 
            array (
                'id' => 312,
                'pedido_cliente_id' => 232,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-06-07 15:31:24',
                'updated_at' => '2021-06-07 15:31:24',
                'user_id' => 1,
            ),
            309 => 
            array (
                'id' => 313,
                'pedido_cliente_id' => 232,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-06-07 15:31:26',
                'updated_at' => '2021-06-07 15:31:26',
                'user_id' => 1,
            ),
            310 => 
            array (
                'id' => 314,
                'pedido_cliente_id' => 232,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-06-07 15:31:32',
                'updated_at' => '2021-06-07 15:31:32',
                'user_id' => 1,
            ),
            311 => 
            array (
                'id' => 315,
                'pedido_cliente_id' => 196,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-06-07 15:33:00',
                'updated_at' => '2021-06-07 15:33:00',
                'user_id' => 1,
            ),
            312 => 
            array (
                'id' => 316,
                'pedido_cliente_id' => 196,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-06-07 15:33:01',
                'updated_at' => '2021-06-07 15:33:01',
                'user_id' => 1,
            ),
            313 => 
            array (
                'id' => 317,
                'pedido_cliente_id' => 196,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-06-07 15:33:04',
                'updated_at' => '2021-06-07 15:33:04',
                'user_id' => 1,
            ),
            314 => 
            array (
                'id' => 318,
                'pedido_cliente_id' => 257,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-06-08 17:57:44',
                'updated_at' => '2021-06-08 17:57:44',
                'user_id' => 1,
            ),
            315 => 
            array (
                'id' => 319,
                'pedido_cliente_id' => 257,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-06-08 18:03:21',
                'updated_at' => '2021-06-08 18:03:21',
                'user_id' => 1,
            ),
            316 => 
            array (
                'id' => 320,
                'pedido_cliente_id' => 257,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-06-08 18:03:26',
                'updated_at' => '2021-06-08 18:03:26',
                'user_id' => 1,
            ),
            317 => 
            array (
                'id' => 321,
                'pedido_cliente_id' => 257,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-06-08 18:41:29',
                'updated_at' => '2021-06-08 18:41:29',
                'user_id' => 1,
            ),
            318 => 
            array (
                'id' => 322,
                'pedido_cliente_id' => 256,
                'status_id' => 8,
                'description' => NULL,
                'created_at' => '2021-06-08 18:44:22',
                'updated_at' => '2021-06-08 18:44:22',
                'user_id' => 1,
            ),
            319 => 
            array (
                'id' => 323,
                'pedido_cliente_id' => 256,
                'status_id' => 9,
                'description' => NULL,
                'created_at' => '2021-06-08 18:44:28',
                'updated_at' => '2021-06-08 18:44:28',
                'user_id' => 1,
            ),
            320 => 
            array (
                'id' => 324,
                'pedido_cliente_id' => 256,
                'status_id' => 10,
                'description' => NULL,
                'created_at' => '2021-06-08 18:44:32',
                'updated_at' => '2021-06-08 18:44:32',
                'user_id' => 1,
            ),
            321 => 
            array (
                'id' => 325,
                'pedido_cliente_id' => 256,
                'status_id' => 11,
                'description' => NULL,
                'created_at' => '2021-06-08 18:44:46',
                'updated_at' => '2021-06-08 18:44:46',
                'user_id' => 1,
            ),
            322 => 
            array (
                'id' => 326,
                'pedido_cliente_id' => 257,
                'status_id' => 12,
                'description' => NULL,
                'created_at' => '2021-06-28 20:50:38',
                'updated_at' => '2021-06-28 20:50:38',
                'user_id' => 1,
            ),
        ));
        
        
    }
}