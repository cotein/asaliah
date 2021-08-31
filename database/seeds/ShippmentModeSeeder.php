<?php

use Illuminate\Database\Seeder;
use App\Src\Models\ShippmentMode;

class ShippmentModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shippment_mode = [
        	['name' => 'custom'],
			['name' => 'not_specified'],
			['name' => 'me1'],
			['name' => 'me2']
        ];

        $shippment_mode = collect($shippment_mode);

        $shippment_mode->each(function($i){
        	ShippmentMode::create([
        		'name'       => $i['name'],
        	]);
        });
    }
}
