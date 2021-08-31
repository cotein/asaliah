<?php

use App\Src\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories =  [
            [
                'code'  => "CHP",
                'parent_id' => 0,
                'name'  => "Chapas"
            ],
            [
                'code'  => "PYT",
                'parent_id' => 0,
                'name'  => "Perfiles y Tubos"
            ],
            [
                'code'  => "MDC",
                'parent_id' => 0,
                'name'  => "Materiales de construcción"
            ],
            [
                'code'  => "MYH",
                'parent_id' => 0,
                'name'  => "Máquinas y Herramientas"
            ],
            [
                'code'  => "AST",
                'parent_id' => 0,
                'name'  => "Aislantes"
            ],
            [
                'code'  => "ZGS",
                'parent_id' => 0,
                'name'  => "Zinguerías"
            ],
            [
                'code'  => "HYA",
                'parent_id' => 0,
                'name'  => "Herrajes y Accesorios"
            ],
            [
                'code'  => "CHP-SDS",
                'parent_id' => 1,
                'name'  => "Sinusoidales"
            ],
            [
                'code'  => "CHP-TPZ",
                'parent_id' => 1,
                'name'  => "Trapezoides"
            ],
            [
                'code'  => "CHP-SDS-CNM",
                'parent_id' => 8,
                'name'  => "Cincalum"
            ],
            [
                'code'  => "CHP-SDS-GVS",
                'parent_id' => 8,
                'name'  => "Galvanizadas"
            ],
            [
                'code'  => "CHP-SDS-PTS",
                'parent_id' => 8,
                'name'  => "Plásticas"
            ],
            [
                'code'  => "CHP-TPZ-T101",
                'parent_id' => 9,
                'name'  => "T-101"
            ],
            [
                'code'  => "CHP-TPZ-CNM",
                'parent_id' => 9,
                'name'  => "Cincalum"
            ],
            [
                'code'  => "CHP-TPZ-GVD",
                'parent_id' => 9,
                'name'  => "Galvanizadas"
            ],
            [
                'code'  => "CHP-TPZ-PTS",
                'parent_id' => 9,
                'name'  => "Plásticas"
            ],
            [
                'code'  => "PYT-EST",
                'parent_id' => 2,
                'name'  => "Estructurales"
            ],
            [
                'code'  => "PYT-SCYR",
                'parent_id' => 2,
                'name'  => "De sección cuadrada y rectangular"
            ],
            [
                'code'  => "PYT-SR",
                'parent_id' => 2,
                'name'  => "De sección redonda"
            ],
            [
                'code'  => "MDC-CAL",
                'parent_id' => 3,
                'name'  => "Cal"
            ],
            [
                'code'  => "MDC-CMT",
                'parent_id' => 3,
                'name'  => "Cemento"
            ],
            [
                'code'  => "MDC-ARN",
                'parent_id' => 3,
                'name'  => "Arena"
            ],
            [
                'code'  => "MDC-PDR",
                'parent_id' => 3,
                'name'  => "Piedra"
            ],
            [
                'code'  => "MDC-ADH",
                'parent_id' => 3,
                'name'  => "Adhesivos"
            ],
            [
                'code'  => "MDC-ADT",
                'parent_id' => 3,
                'name'  => "Aditivos"
            ],
            [
                'code'  => "MDC-SLL",
                'parent_id' => 3,
                'name'  => "Selladores"
            ],
            [
                'code'  => "MDC-SLL",
                'parent_id' => 3,
                'name'  => "Selladores"
            ],
            [
                'code'  => "MDC-HYD",
                'parent_id' => 3,
                'name'  => "Hidrófugos"
            ],
            [
                'code'  => "MYH-AML",
                'parent_id' => 4,
                'name'  => "Amoladoras"
            ],
            [
                'code'  => "MYH-SLD",
                'parent_id' => 4,
                'name'  => "Soldadoras"
            ],
            [
                'code'  => "MYH-AGJ",
                'parent_id' => 4,
                'name'  => "Agujereadoras"
            ],
            [
                'code'  => "MYH-ATR",
                'parent_id' => 4,
                'name'  => "Atornilladores"
            ],
            [
                'code'  => "MYH-PUL",
                'parent_id' => 4,
                'name'  => "Pulidoras"
            ],
            [
                'code'  => "MYH-PUL",
                'parent_id' => 4,
                'name'  => "Pulidoras"
            ],
            [
                'code'  => "OTR",
                'parent_id' => 0,
                'name'  => "Otras"
            ],
            [
                'code'  => "OTR-FEI",
                'parent_id' => 35,
                'name'  => "Ferretería e insumos"
            ],
            [
                'code'  => "FEI-CLV",
                'parent_id' => 36,
                'name'  => "Clavos"
            ],
            [
                'code'  => "FEI-DDC",
                'parent_id' => 36,
                'name'  => "Disco de corte"
            ],
            [
                'code'  => "FEI-MCH",
                'parent_id' => 36,
                'name'  => "Mechas"
            ],
            [
                'code'  => "FEI-CDC",
                'parent_id' => 36,
                'name'  => "Cortador de Cerámicos"
            ],
            [
                'code'  => "FEI-CDA",
                'parent_id' => 36,
                'name'  => "Cucharas de albanil"
            ],
            [
                'code'  => "FEI-BDA",
                'parent_id' => 36,
                'name'  => "Balde de albanil"
            ],
            [
                'code'  => "FEI-NVL",
                'parent_id' => 36,
                'name'  => "Niveles"
            ],
            [
                'code'  => "FEI-CTM",
                'parent_id' => 36,
                'name'  => "Cinta métrica"
            ],
            [
                'code'  => "AIS-PRT",
                'parent_id' => 5,
                'name'  => "Ailantes para techo"
            ],
            [
                'code'  => "ZGS-CNT",
                'parent_id' => 6,
                'name'  => "Canaletas"
            ],
            [
                'code'  => "ZGS-BQT",
                'parent_id' => 6,
                'name'  => "Boquitas"
            ],
            [
                'code'  => "ZGS-CDD",
                'parent_id' => 6,
                'name'  => "Caños de descarga"
            ],
            [
                'code'  => "ZGS-ACC",
                'parent_id' => 6,
                'name'  => "Accesorios"
            ],
            [
                'code'  => "HYA-BSG",
                'parent_id' => 7,
                'name'  => "Bisagras"
            ],
            [
                'code'  => "HYA-CND",
                'parent_id' => 7,
                'name'  => "Candados"
            ],
            [
                'code'  => "HYA-CRR",
                'parent_id' => 7,
                'name'  => "Cerraduras"
            ],
            [
                'code'  => "HYA-RPP",
                'parent_id' => 7,
                'name'  => "Ruedas para portón corredizo"
            ],
            [
                'code'  => "HYA-PPR",
                'parent_id' => 7,
                'name'  => "Pinches para rejas"
            ],
            [
                'code'  => "HYA-DPR",
                'parent_id' => 7,
                'name'  => "Decorado para rejas"
            ],
            [
                'code'  => "HYA-CDB",
                'parent_id' => 7,
                'name'  => "Canasto depósito de basura"
            ],
            [
                'code'  => "OTR-EPP",
                'parent_id' => 35,
                'name'  => "Elementos de protección personal" //id 57
            ],
            [
                'code'  => "OTR-EPP-ZPT",
                'parent_id' => 57,
                'name'  => "Zapatos"
            ],
            [
                'code'  => "OTR-EPP-ATP",
                'parent_id' => 57,
                'name'  => "Antiparras"
            ],
            [
                'code'  => "OTR-EPP-CDS",
                'parent_id' => 57,
                'name'  => "Caretas de soldar"
            ],
            [
                'code'  => "OTR-EPP-ROP",
                'parent_id' => 57,
                'name'  => "Ropa"
            ],
            [
                'code'  => "OTR-EPP-FJL",
                'parent_id' => 57,
                'name'  => "Fajas lumbares"
            ],
            [
                'code'  => "OTR-EPP-ARS",
                'parent_id' => 57,
                'name'  => "Arneses"
            ],
            [
                'code'  => "OTR-EPP-SLT",
                'parent_id' => 57,
                'name'  => "Silletas"
            ],
            [
                'code'  => "OTR-EPP-GDA",
                'parent_id' => 57,
                'name'  => "Grilletes de amarre"
            ],
            [
                'code'  => "OTR-EPP-ELG",
                'parent_id' => 57,
                'name'  => "Eslingas"
            ],
            
        ];

        $categories = collect($categories);

        $categories->each(function($c){
        	Category::create([
                'code' => $c['code'],
                'parent_id' => $c['parent_id'],
                'name' => $c['name'],
        	]);
        });
    }
}
