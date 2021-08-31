<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('comments')->delete();
        
        DB::table('comments')->insert(array (
            0 => 
            array (
                'id' => 1,
                'description' => 'nnnnnnnnn',
                'commentable_id' => 166,
                'commentable_type' => 'App\\Src\\Models\\PedidoCliente',
                'user_id' => 1,
                'user_name' => 'DIEGO ',
                'pedido_status_id' => 8,
                'status_id' => 1,
                'created_at' => '2021-05-10 22:49:14',
                'updated_at' => '2021-05-10 22:49:14',
                'print' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'description' => 'nnnnnnn',
                'commentable_id' => 166,
                'commentable_type' => 'App\\Src\\Models\\PedidoCliente',
                'user_id' => 1,
                'user_name' => 'DIEGO ',
                'pedido_status_id' => 8,
                'status_id' => 1,
                'created_at' => '2021-05-10 22:49:21',
                'updated_at' => '2021-05-10 22:49:21',
                'print' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'description' => 'mmmmmm',
                'commentable_id' => 164,
                'commentable_type' => 'App\\Src\\Models\\PedidoCliente',
                'user_id' => 1,
                'user_name' => 'DIEGO ',
                'pedido_status_id' => 9,
                'status_id' => 1,
                'created_at' => '2021-05-10 22:52:24',
                'updated_at' => '2021-05-10 22:52:24',
                'print' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'description' => 'tttttttttttttt',
                'commentable_id' => 164,
                'commentable_type' => 'App\\Src\\Models\\PedidoCliente',
                'user_id' => 1,
                'user_name' => 'DIEGO ',
                'pedido_status_id' => 9,
                'status_id' => 1,
                'created_at' => '2021-05-10 22:52:31',
                'updated_at' => '2021-05-10 22:52:31',
                'print' => 1,
            ),
        ));
        
        
    }
}