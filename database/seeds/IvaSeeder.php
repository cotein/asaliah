<?php

use App\Src\Models\Iva;
use Illuminate\Database\Seeder;

class IvaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $iva = [
        	['code' => 0, 'name' => 'No Corresponde', 'percentage' => 0],
			['code' => 1, 'name' => 'No Gravado', 'percentage' => 0],
			['code' => 2, 'name' => 'Exento', 'percentage' => 0],
			['code' => 3, 'name' => '0%', 'percentage' => 0],
			['code' => 4, 'name' => '10,50%', 'percentage' => 10.50],
			['code' => 5, 'name' => '21%', 'percentage' => 21],
			['code' => 6, 'name' => '27%', 'percentage' => 27],
			['code' => 7, 'name' => 'Gravado', 'percentage' => 0],
			['code' => 8, 'name' => '5%', 'percentage' => 5],
			['code' => 9, 'name' => '2,50%', 'percentage' => 2.50],
        ];

        $iva = collect($iva);

        $iva->each(function($i){
        	Iva::create([
        		'code' => $i['code'],
        		'name'       => $i['name'],
        		'percentage' => $i['percentage'],
        	]);
        });
    }
}
