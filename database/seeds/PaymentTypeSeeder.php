<?php

use App\Src\Models\PaymentType;
use Illuminate\Database\Seeder;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = 
        [
            ['name' => 'CHEQUE'],
            ['name' => 'MERCADO PAGO'],
            ['name' => 'EFECTIVO'],
            ['name' => 'TRANSFERENCIA'],
            ['name' => 'TARJ. CRÉDITO'],
            ['name' => 'TARJ. DÉBITO'],
        ];

        collect($types)->each(function($t){
        	PaymentType::create([
        		'name'      => $t['name'],
        	]);
        });
    }
}
