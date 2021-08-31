<?php

use App\Src\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
        	['name' => 'ACTIVO'],
			['name' => 'PUBLICADO'],
			['name' => 'PAUSADO'],
			['name' => 'REVISION'],
			['name' => 'NO PUBLICADO'],
			['name' => 'PENDIENTE'],
			['name' => 'ELIMINADO'],
			['name' => 'PRIMER CONTACTO'],
			['name' => 'LISTADO'],
			['name' => 'REMITIDO'],
			['name' => 'FACTURADO'],
			['name' => 'EN PRODUCCION'],
			['name' => 'EN STOCK'],
			['name' => 'CROSS OVER'],
			['name' => 'DESPACHADO'],
			['name' => 'ENTREGADO'],
			['name' => 'REPORTADO'],
			['name' => 'PAGADA'],
			['name' => 'CERRADO'],
        ];

		Status::truncate();

        $statuses = collect($statuses);

        $statuses->each(function($i){
        	Status::create([
        		'name'       => $i['name'],
        	]);
        });
    }
}
