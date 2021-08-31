<?php

use Illuminate\Database\Seeder;

class ProvidersRegimenTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('providers_regimen')->delete();
        
        \DB::table('providers_regimen')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => '19',
            'anexo' => 'Anexo II,  inc. a)
pto. 1)',
        'description' => 'Intereses por operaciones realizadas en entidades financieras. Ley N� 21.526 y sus modificaciones o agentes de bolsa o mercado abierto.',
        'inscriptos' => '3%',
        'no_inscriptos' => '10%',
        'inscriptos_a' => '- .-',
        'created_at' => NULL,
        'updated_at' => NULL,
    ),
    1 => 
    array (
        'id' => 2,
        'code' => '21',
    'anexo' => 'Anexo II , inc. a)
pto. 2)',
'description' => 'Intereses originados en operaciones no
comprendidas en el punto 1.',
'inscriptos' => '6%',
'no_inscriptos' => '25%/28%(e)',
'inscriptos_a' => '7,870',
'created_at' => NULL,
'updated_at' => NULL,
),
2 => 
array (
'id' => 3,
'code' => '30',
'anexo' => 'Anexo II, inc. b)
pto. 1)',
'description' => 'Alquileres o arrendamientos de bienes muebles.',
'inscriptos' => '6%',
'no_inscriptos' => '25%/28%(e)',
'inscriptos_a' => '11,200',
'created_at' => NULL,
'updated_at' => NULL,
),
3 => 
array (
'id' => 4,
'code' => '31',
'anexo' => 'Anexo II, inc. b)
pto. 2)',
'description' => 'Bienes Inmuebles Urbanos, incluidos los
efectuados bajo la modalidad de leasing �incluye suburbanos-.',
'inscriptos' => '6%',
'no_inscriptos' => '25%/28%(e)',
'inscriptos_a' => '11,200',
'created_at' => NULL,
'updated_at' => NULL,
),
4 => 
array (
'id' => 5,
'code' => '32',
'anexo' => 'Anexo II, inc. b)
pto. 3)',
'description' => 'Bienes Inmuebles Rurales, incluidos los efectuados bajo la modalidad de leasing �incluye subrurales-.',
'inscriptos' => '6%',
'no_inscriptos' => '25%/28%(e)',
'inscriptos_a' => '11,200',
'created_at' => NULL,
'updated_at' => NULL,
),
5 => 
array (
'id' => 6,
'code' => '35',
'anexo' => 'Anexo II, inc. c)',
'description' => 'Regal�as.',
'inscriptos' => '6%',
'no_inscriptos' => '25%/28%(e)',
'inscriptos_a' => '7,870',
'created_at' => NULL,
'updated_at' => NULL,
),
6 => 
array (
'id' => 7,
'code' => '43',
'anexo' => 'Anexo II, inc. d)',
'description' => 'Inter�s accionario, excedentes y retornos
distribuidos entre asociados, cooperativas -excepto consumo-.',
'inscriptos' => '6%',
'no_inscriptos' => '25%/28%(e)',
'inscriptos_a' => '7,870',
'created_at' => NULL,
'updated_at' => NULL,
),
7 => 
array (
'id' => 8,
'code' => '51',
'anexo' => 'Anexo II, inc. e)',
'description' => 'Obligaciones de no hacer, o por abandono o no ejercicio de una actividad.',
'inscriptos' => '6%',
'no_inscriptos' => '25%/28%(e)',
'inscriptos_a' => '7,870',
'created_at' => NULL,
'updated_at' => NULL,
),
8 => 
array (
'id' => 9,
'code' => '78',
'anexo' => 'Anexo II, inc. f)',
'description' => 'Enajenaci�n de bienes muebles y bienes de
cambio.',
'inscriptos' => '2%',
'no_inscriptos' => '10%',
'inscriptos_a' => '224,000',
'created_at' => NULL,
'updated_at' => NULL,
),
9 => 
array (
'id' => 10,
'code' => '86',
'anexo' => 'Anexo II, inc. g)',
'description' => 'Transferencia temporaria o definitiva de derechos
de llave, marcas, patentes de invenci�n, regal�as, concesiones y similares.',
'inscriptos' => '2%',
'no_inscriptos' => '10%',
'inscriptos_a' => '224,000',
'created_at' => NULL,
'updated_at' => NULL,
),
10 => 
array (
'id' => 11,
'code' => '110',
'anexo' => 'Anexo II, inc. h)',
'description' => 'Explotaci�n de derechos de autor (Ley N� 11.723).',
'inscriptos' => 's/escala',
'no_inscriptos' => '28%',
'inscriptos_a' => '10,000',
'created_at' => NULL,
'updated_at' => NULL,
),
11 => 
array (
'id' => 12,
'code' => '94',
'anexo' => 'Anexo II, inc. i)',
'description' => 'Locaciones de obra y/o servicios no ejecutados en
relaci�n de dependencia no mencionados expresamente en otros incisos.',
'inscriptos' => '2%',
'no_inscriptos' => '25%/28%(e)',
'inscriptos_a' => '67,170',
'created_at' => NULL,
'updated_at' => NULL,
),
12 => 
array (
'id' => 13,
'code' => '25',
'anexo' => 'Anexo II, inc. j)',
'description' => 'Comisiones u otras retribuciones derivadas de la actividad de comisionista, rematador, consignatario y dem�s auxiliares de comercio a que se refiere el inciso c) del art�culo 49 de la Ley de Impuesto a las Ganancias, texto ordenado en 1997 y sus modificaciones.',
'inscriptos' => 's/escala',
'no_inscriptos' => '28%',
'inscriptos_a' => '16,830',
'created_at' => NULL,
'updated_at' => NULL,
),
13 => 
array (
'id' => 14,
'code' => '116',
'anexo' => 'Anexo ll, inc. k)',
'description' => 'Honorarios de director de sociedades an�nimas, s�ndico, fiduciario, consejero de sociedades cooperativas, integrante de consejos de vigilancia y socios administradores de las sociedades de responsabilidad limitada, en comandita simple y en comandita por acciones.',
'inscriptos' => 's/escala',
'no_inscriptos' => '28%',
'inscriptos_a' => '67.170 (b)',
'created_at' => NULL,
'updated_at' => NULL,
),
14 => 
array (
'id' => 15,
'code' => '116',
'anexo' => 'Anexo ll, inc. k)',
'description' => 'Profesionales liberales, oficios, albacea,
mandatario, gestor de negocio.',
'inscriptos' => 's/escala',
'no_inscriptos' => '28%',
'inscriptos_a' => '16,830',
'created_at' => NULL,
'updated_at' => NULL,
),
15 => 
array (
'id' => 16,
'code' => '124',
'anexo' => 'Anexo ll, inc. k)',
'description' => 'Corredor, viajante de comercio y despachante de
aduana.',
'inscriptos' => 's/escala',
'no_inscriptos' => '28%',
'inscriptos_a' => '16,830',
'created_at' => NULL,
'updated_at' => NULL,
),
16 => 
array (
'id' => 18,
'code' => '95',
'anexo' => 'Anexo ll, inc. l)',
'description' => 'Operaciones de transporte de carga nacional e internacional.',
'inscriptos' => '0,25%',
'no_inscriptos' => '25%/28%(e)',
'inscriptos_a' => '67,170',
'created_at' => NULL,
'updated_at' => NULL,
),
17 => 
array (
'id' => 19,
'code' => '53',
'anexo' => 'Anexo ll, inc. m)',
'description' => 'Operaciones realizadas por intermedio de mercados de cereales a t�rmino que se resuelvan en el curso del t�rmino (arbitrajes) y de mercados de futuros y opciones.',
'inscriptos' => '0,50%',
'no_inscriptos' => '2.00%',
'inscriptos_a' => '- .-',
'created_at' => NULL,
'updated_at' => NULL,
),
18 => 
array (
'id' => 20,
'code' => '55',
'anexo' => 'Anexo ll, inc. n)',
'description' => 'Distribuci�n de pel�culas. Transmisi�n de programaci�n. Televisi�n v�a satelital.',
'inscriptos' => '0,50%',
'no_inscriptos' => '2.00%',
'inscriptos_a' => '- .-',
'created_at' => NULL,
'updated_at' => NULL,
),
19 => 
array (
'id' => 21,
'code' => '111',
'anexo' => 'Anexo ll, inc. �)',
'description' => 'Cualquier otra cesi�n o locaci�n de derechos, excepto las que correspondan a operaciones realizadas por intermedio de mercados de
cereales a t�rmino que se resuelvan en el curso del t�rmino (arbitrajes) y de mercados de futuros y opciones.',
'inscriptos' => '0,50%',
'no_inscriptos' => '2.00%',
'inscriptos_a' => '- .-',
'created_at' => NULL,
'updated_at' => NULL,
),
20 => 
array (
'id' => 22,
'code' => '112',
'anexo' => 'Anexo ll, inc. o)',
'description' => 'Beneficios provenientes del cumplimiento de los requisitos de los planes de seguro de retiro privados administrados por entidades sujetas al control de la Superintendencia de Seguros de la Naci�n, establecidos por el inciso d) del art�culo 45 y el
inciso d) del art�culo 79, de la Ley de Impuesto a las Ganancias, texto ordenado en 1997 y sus modificaciones -excepto cuando se encuentren alcanzados por el r�gimen de retenci�n establecido por la Resoluci�n General N� 2,437, sus modificatorias y complementarias-.',
'inscriptos' => '3%',
'no_inscriptos' => '3%',
'inscriptos_a' => '16,830',
'created_at' => NULL,
'updated_at' => NULL,
),
21 => 
array (
'id' => 23,
'code' => '113',
'anexo' => 'Anexo ll, inc. p)',
'description' => 'Rescates -totales o parciales- por desistimiento de los planes de seguro de retiro a que se refiere el inciso o), excepto que sea de aplicaci�n lo normado en el art�culo 101 de la Ley de Impuesto a las Ganancias, texto ordenado en 1997 y sus modificaciones.',
'inscriptos' => '3%',
'no_inscriptos' => '3%',
'inscriptos_a' => '16,830',
'created_at' => NULL,
'updated_at' => NULL,
),
22 => 
array (
'id' => 26,
'code' => '779',
'anexo' => 'Anexo ll, inc. q)',
'description' => 'Subsidios abonados por los Estados Nacional, provinciales, municipales o el Gobierno de la Ciudad Aut�noma de Buenos Ares, en concepto de enajenaci�n de bienes muebles y bienes de
cambio, en la medida que una ley general o especial no establezca la exenci�n de los mismos en el impuesto a las ganancias.',
'inscriptos' => '2%',
'no_inscriptos' => '10%',
'inscriptos_a' => '76,140',
'created_at' => NULL,
'updated_at' => NULL,
),
23 => 
array (
'id' => 27,
'code' => '780',
'anexo' => 'Anexo ll, inc. r)',
'description' => 'Subsidios abonados por los Estados Nacional, provinciales, municipales o el Gobierno de la
Ciudad Aut�noma de Buenos Aires, en concepto de locaciones de obra y/o servicios, no ejecutados en relaci�n de dependencia, en la medida que una ley general o especial no establezca la exenci�n de los mismos en el impuesto a las ganancias.',
'inscriptos' => '2%',
'no_inscriptos' => '25%/28%(e)',
'inscriptos_a' => '31,460',
'created_at' => NULL,
'updated_at' => NULL,
),
));
        
        
    }
}