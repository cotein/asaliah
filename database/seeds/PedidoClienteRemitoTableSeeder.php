<?php

use Illuminate\Database\Seeder;

class PedidoClienteRemitoTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pedido_cliente_remito')->delete();
        
        
        
    }
}