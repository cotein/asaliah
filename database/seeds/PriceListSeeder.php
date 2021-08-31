<?php

use App\Src\Models\PriceList;
use Illuminate\Database\Seeder;

class PriceListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pl = [
            [ 'name' => 'Sector 2 sept'],
            [ 'name' => 'Sector 1 Mayo'],
            [ 'name' => 'Servicios'],
            [ 'name' => 'Mercado libre'],
            [ 'name' => 'CUPONICA'],
            [ 'name' => 'Click on'],
            [ 'name' => 'Lista General'],
            [ 'name' => 'baigorria'],
            [ 'name' => 'Club cupon'],
            [ 'name' => 'Liquidados'],
            [ 'name' => 'CLUNCO'],
            [ 'name' => 'NICO BUTERA'],
            [ 'name' => 'Grupón'],
            [ 'name' => 'AVENIDA'],
            [ 'name' => 'FRAVEGA'],
            [ 'name' => 'GARBARINO'],
            [ 'name' => 'SODIMAC'],
            [ 'name' => 'VICALI'],
            [ 'name' => 'MAYORISTAS'],
            [ 'name' => 'CONTADO'],
        ];

        $pl = collect($pl);

        $pl->each(function($i){
        	PriceList::create([
        		'name'  => $i['name'],
        	]);
        });
    }
}
