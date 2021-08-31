<?php

use App\Src\Models\Money;
use Illuminate\Database\Seeder;

class MoneySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $monedas = [
			[
				'code' 	        => 'PES',
				'name' 		=> 'PESOS',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => 'DOL',
				'name' 		=> 'Dólar ESTADOUNIDENSE',
				'symbol'		=> 'U$S',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '002',
				'name' 		=>	'Dólar EEUU LIBRE',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '003',
				'name' 		=>	'FRANCOS FRANCESES',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '004',
				'name' 		=>	'LIRAS ITALIANAS',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '005',
				'name' 		=>	'PESETAS',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '006',
				'name' 		=>	'MARCOS ALEMANES',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '007',
				'name' 		=>	'FLORINES HOLANDESES',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '008',
				'name' 		=>	'FRANCOS BELGAS',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '009',
				'name' 		=>	'FRANCOS SUIZOS',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '010',
				'name' 		=>	'PESOS MEJICANOS',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '011',
				'name' 		=>	'PESOS URUGUAYOS',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '012',
				'name' 		=>	'REAL',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '013',
				'name' 		=>	'ESCUDOS PORTUGUESES',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '014',
				'name' 		=>	'CORONAS DANESAS',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '015',
				'name' 		=>	'CORONAS NORUEGAS',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '016',
				'name' 		=>	'CORONAS SUECAS',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '017',
				'name' 		=>	'CHELINES AUTRIACOS',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '018',
				'name' 		=>	'Dólar CANADIENSE',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '019',
				'name' 		=>	'YENS',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '021',
				'name' 		=>	'LIBRA ESTERLINA',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '022',
				'name' 		=>	'MARCOS FINLANDESES',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '023',
				'name' 		=>	'BOLIVAR (VENEZOLANO)',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '024',
				'name' 		=>	'CORONA CHECA',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '025',
				'name' 		=>	'DINAR (YUGOSLAVO)',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '026',
				'name' 		=>	'Dólar AUSTRALIANO',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '027',
				'name' 		=>	'DRACMA (GRIEGO)',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '028',
				'name' 		=>	'FLORIN (ANTILLAS HOLA',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '029',
				'name' 		=>	'GUARANI',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '030',
				'name' 		=>	'SHEKEL (ISRAEL)',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '031',
				'name' 		=>	'PESO BOLIVIANO',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '032',
				'name' 		=>	'PESO COLOMBIANO',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '033',
				'name' 		=>	'PESO CHILENO',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '034',
				'name' 		=>	'RAND (SUDAFRICANO)',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '035',
				'name' 		=>	'NUEVO SOL PERUANO',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '036',
				'name' 		=>	'SUCRE (ECUATORIANO)',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '040',
				'name' 		=>	'LEI RUMANOS',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '041',
				'name' 		=>	'DERECHOS ESPECIALES DE GIRO',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '042',
				'name' 		=>	'PESOS DOMINICANOS',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '043',
				'name' 		=>	'BALBOAS PANAMEÑAS',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '044',
				'name' 		=>	'CORDOBAS NICARAGÛENSES',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '045',
				'name' 		=>	'DIRHAM MARROQUÍES',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '046',
				'name' 		=>	'LIBRAS EGIPCIAS',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '047',
				'name' 		=>	'RIYALS SAUDITAS',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '048',
				'name' 		=>	'BRANCOS BELGAS FINANCIERAS',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '049',
				'name' 		=>	'GRAMOS DE ORO FINO',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '050',
				'name' 		=>	'LIBRAS IRLANDESAS',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '051',
				'name' 		=>	'Dólar DE HONG KONG',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '052',
				'name' 		=>	'Dólar DE SINGAPUR',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '053',
				'name' 		=>	'Dólar DE JAMAICA',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '054',
				'name' 		=>	'Dólar DE TAIWAN',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '055',
				'name' 		=>	'QUETZAL (GUATEMALTECOS)',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '056',
				'name' 		=>	'FORINT (HUNGRIA)',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '057',
				'name' 		=>	'BAHT (TAILANDIA)',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '058',
				'name' 		=>	'ECU',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '059',
				'name' 		=>	'DINAR KUWAITI',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '060',
				'name' 		=>	'EURO',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '061',
				'name' 		=>	'ZLTYS POLACOS',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '062',
				'name' 		=>	'RUPIAS HINDÚES',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '063',
				'name' 		=>	'LEMPIRAS HONDUREÑAS',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '064',
				'name' 		=>	'YUAN (Rep. Pop. China)',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
			[
				'code' 	        => '000',
				'name' 		=>	'OTRAS nameS',
				'symbol'		=> '$',
				'value'	=> 1,
				'description'	=> 'name'
			],
        ];

        $monedas = collect($monedas);

        $monedas->each(function($m){
        	Money::create([
        		'code'          => $m['code'],
        		'name'      => $m['name'],
        		'symbol'     => $m['symbol'],
        		'value'  => $m['value'],
        		'description' => $m['description'],
        	]);
        });
    }
}
