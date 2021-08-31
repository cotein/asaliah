<?php

use Illuminate\Database\Seeder;

class PublicationTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pub_types = [
            ["site_id"=>"MLA","code"=>"gold_pro","name"=>"Premium"],
            ["site_id"=>"MLA","code"=>"gold_premium","name"=>"Oro Premium"],
            ["site_id"=>"MLA","code"=>"gold_special","name"=>"Clásica"],
            ["site_id"=>"MLA","code"=>"gold","name"=>"Oro"],
            ["site_id"=>"MLA","code"=>"silver","name"=>"Plata"],
            ["site_id"=>"MLA","code"=>"bronze","name"=>"Bronce"],
            ["site_id"=>"MLA","code"=>"free","name"=>"Gratuita"]
        ];

        $pub_types = collect($pub_types);

        $pub_types->each(function($i){
        	\App\Src\Models\PublicationTypes::create([
        		'site_id'       => $i['site_id'],
        		'code'       => $i['code'],
        		'name'       => $i['name'],
        	]);
        });
    }
}
