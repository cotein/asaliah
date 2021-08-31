<?php

use Illuminate\Database\Seeder;

class AccountingAccountsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('accounting_accounts')->delete();
        
        \DB::table('accounting_accounts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'account' => 110001,
                'imputable' => 'S',
                'name' => 'Stock',
                'parent_account' => 110000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            1 => 
            array (
                'id' => 2,
                'account' => 100000,
                'imputable' => 'N',
                'name' => 'ACTIVO',
                'parent_account' => 0,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            2 => 
            array (
                'id' => 3,
                'account' => 110000,
                'imputable' => 'N',
                'name' => 'ACTIVO CORRIENTE',
                'parent_account' => 100000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            3 => 
            array (
                'id' => 5,
                'account' => 111000,
                'imputable' => 'N',
                'name' => 'CAJA Y BANCOS',
                'parent_account' => 110000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            4 => 
            array (
                'id' => 6,
                'account' => 111100,
                'imputable' => 'S',
            'name' => 'Caja - efectivo (pesos)',
                'parent_account' => 111000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            5 => 
            array (
                'id' => 7,
                'account' => 111120,
                'imputable' => 'S',
                'name' => 'Caja -  moneda extranjera',
                'parent_account' => 111000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            6 => 
            array (
                'id' => 8,
                'account' => 111130,
                'imputable' => 'S',
                'name' => 'Caja - Valores a depositar',
                'parent_account' => 111000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            7 => 
            array (
                'id' => 9,
                'account' => 111150,
                'imputable' => 'S',
                'name' => 'Cheques rechazados',
                'parent_account' => 111000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            8 => 
            array (
                'id' => 10,
                'account' => 111190,
                'imputable' => 'S',
                'name' => 'Faltante de Caja',
                'parent_account' => 111000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            9 => 
            array (
                'id' => 11,
                'account' => 111200,
                'imputable' => 'N',
                'name' => 'BANCOS',
                'parent_account' => 110000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            10 => 
            array (
                'id' => 12,
                'account' => 111204,
                'imputable' => 'S',
                'name' => 'Banco Nación c/c',
                'parent_account' => 111200,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            11 => 
            array (
                'id' => 13,
                'account' => 111205,
                'imputable' => 'S',
                'name' => 'Banco Pcia. c/c',
                'parent_account' => 111200,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            12 => 
            array (
                'id' => 14,
                'account' => 111214,
                'imputable' => 'S',
                'name' => 'Cuenta corriente pendiente acredita.',
                'parent_account' => 111200,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            13 => 
            array (
                'id' => 15,
                'account' => 112000,
                'imputable' => 'N',
                'name' => 'CUENTAS POR COBRAR POR VTAS',
                'parent_account' => 100000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            14 => 
            array (
                'id' => 16,
                'account' => 112100,
                'imputable' => 'S',
                'name' => 'Clientes',
                'parent_account' => 111100,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            15 => 
            array (
                'id' => 17,
                'account' => 112200,
                'imputable' => 'S',
                'name' => 'Clientes Moneda Extranjera',
                'parent_account' => 112000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            16 => 
            array (
                'id' => 18,
                'account' => 112900,
                'imputable' => 'S',
                'name' => 'Deudores Morosos',
                'parent_account' => 112000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            17 => 
            array (
                'id' => 19,
                'account' => 112901,
                'imputable' => 'S',
                'name' => 'compensaciones',
                'parent_account' => 112000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            18 => 
            array (
                'id' => 20,
                'account' => 113000,
                'imputable' => 'N',
                'name' => 'OTRAS CUENTAS POR COBRAR',
                'parent_account' => 100000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            19 => 
            array (
                'id' => 21,
                'account' => 113201,
                'imputable' => 'S',
                'name' => 'IVA - Crédito Fiscal 21%',
                'parent_account' => 113000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            20 => 
            array (
                'id' => 22,
                'account' => 113203,
                'imputable' => 'S',
                'name' => 'IVA - Crédito Fiscal 10,5 %',
                'parent_account' => 113000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            21 => 
            array (
                'id' => 23,
                'account' => 113206,
                'imputable' => 'S',
                'name' => 'I.T.C Combustible',
                'parent_account' => 113000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            22 => 
            array (
                'id' => 24,
                'account' => 113208,
                'imputable' => 'S',
                'name' => 'I.T.F- Ley 25413 - Cr. Bancarios',
                'parent_account' => 113000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            23 => 
            array (
                'id' => 25,
                'account' => 113210,
                'imputable' => 'S',
                'name' => 'IVA - Crédito Fiscal 27%',
                'parent_account' => 113000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            24 => 
            array (
                'id' => 26,
                'account' => 113211,
                'imputable' => 'S',
                'name' => 'IVA - Crédito Fiscal Gravado',
                'parent_account' => 113000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            25 => 
            array (
                'id' => 27,
                'account' => 113212,
                'imputable' => 'S',
                'name' => 'IVA - Crédito Fiscal 5%',
                'parent_account' => 113000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            26 => 
            array (
                'id' => 28,
                'account' => 113213,
                'imputable' => 'S',
                'name' => 'IVA - Crédito Fiscal 2,5%',
                'parent_account' => 113000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            27 => 
            array (
                'id' => 29,
                'account' => 113301,
                'imputable' => 'S',
                'name' => 'Ganancias -  retenciones',
                'parent_account' => 113000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            28 => 
            array (
                'id' => 30,
                'account' => 113302,
                'imputable' => 'S',
                'name' => 'Ganancias -  anticipos y otros',
                'parent_account' => 113000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            29 => 
            array (
                'id' => 31,
                'account' => 113303,
                'imputable' => 'S',
                'name' => 'Ingresos Brutos - Retenc. Bs. As - Sufridas',
                'parent_account' => 113000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            30 => 
            array (
                'id' => 32,
                'account' => 113304,
                'imputable' => 'S',
                'name' => 'Ingresos Brutos - Percep.  Bs. As. - Sufridas',
                'parent_account' => 113000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            31 => 
            array (
                'id' => 33,
                'account' => 113311,
                'imputable' => 'S',
                'name' => 'Suss - Retención',
                'parent_account' => 113000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            32 => 
            array (
                'id' => 34,
                'account' => 113399,
                'imputable' => 'S',
                'name' => 'Creditos / saldos tributos varios',
                'parent_account' => 113000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            33 => 
            array (
                'id' => 35,
                'account' => 113600,
                'imputable' => 'N',
                'name' => 'OTROS CREDITOS',
                'parent_account' => 110000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            34 => 
            array (
                'id' => 36,
                'account' => 113610,
                'imputable' => 'S',
                'name' => 'Accionistas',
                'parent_account' => 113600,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            35 => 
            array (
                'id' => 37,
                'account' => 113620,
                'imputable' => 'S',
                'name' => 'Préstamos al personal',
                'parent_account' => 113600,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            36 => 
            array (
                'id' => 38,
                'account' => 114000,
                'imputable' => 'N',
                'name' => 'STOCK DE REPUESTOS',
                'parent_account' => 110000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            37 => 
            array (
                'id' => 39,
                'account' => 114100,
                'imputable' => 'S',
                'name' => 'Repuestos vehículos',
                'parent_account' => 114000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            38 => 
            array (
                'id' => 40,
                'account' => 120000,
                'imputable' => 'N',
                'name' => 'ACTIVO NO CORRIENTE',
                'parent_account' => 100000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            39 => 
            array (
                'id' => 41,
                'account' => 121000,
                'imputable' => 'N',
                'name' => 'BIENES DE USO',
                'parent_account' => 120000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            40 => 
            array (
                'id' => 42,
                'account' => 121100,
                'imputable' => 'N',
                'name' => 'EQUIPOS DE TRANSPORTE DE CARGA',
                'parent_account' => 121000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            41 => 
            array (
                'id' => 43,
                'account' => 121101,
                'imputable' => 'S',
                'name' => 'Rodados',
                'parent_account' => 121000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            42 => 
            array (
                'id' => 44,
                'account' => 121105,
                'imputable' => 'S',
                'name' => 'Dispositivos accesorios y contoladores',
                'parent_account' => 121100,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            43 => 
            array (
                'id' => 45,
                'account' => 121400,
                'imputable' => 'S',
                'name' => 'Edificios y Mejoras',
                'parent_account' => 121000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            44 => 
            array (
                'id' => 46,
                'account' => 121500,
                'imputable' => 'S',
                'name' => 'Equipos de Computacion',
                'parent_account' => 121000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            45 => 
            array (
                'id' => 47,
                'account' => 121600,
                'imputable' => 'S',
                'name' => 'Muebles y Utiles',
                'parent_account' => 121000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            46 => 
            array (
                'id' => 48,
                'account' => 122200,
                'imputable' => 'N',
                'name' => 'ACTIVOS INTANGIBLES',
                'parent_account' => 120000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            47 => 
            array (
                'id' => 49,
                'account' => 200000,
                'imputable' => 'N',
                'name' => 'PASIVO',
                'parent_account' => 0,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            48 => 
            array (
                'id' => 50,
                'account' => 210000,
                'imputable' => 'N',
                'name' => 'PASIVO CORRIENTE',
                'parent_account' => 200000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            49 => 
            array (
                'id' => 51,
                'account' => 211000,
                'imputable' => 'N',
                'name' => 'CTAS.COMERCIALES POR PAGAR',
                'parent_account' => 210000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            50 => 
            array (
                'id' => 52,
                'account' => 211001,
                'imputable' => 'S',
                'name' => 'Proveedores',
                'parent_account' => 211000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            51 => 
            array (
                'id' => 53,
                'account' => 212000,
                'imputable' => 'N',
                'name' => 'DEUDAS  BANCARIAS VARIAS',
                'parent_account' => 210000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            52 => 
            array (
                'id' => 54,
                'account' => 212100,
                'imputable' => 'S',
                'name' => 'Oblig. a Pagar Bco. Pcia.',
                'parent_account' => 212000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            53 => 
            array (
                'id' => 55,
                'account' => 212200,
                'imputable' => 'S',
                'name' => 'Prestamos bancarios sin garantia',
                'parent_account' => 212000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            54 => 
            array (
                'id' => 56,
                'account' => 212300,
                'imputable' => 'S',
                'name' => 'Cheques Diferidos Bco. Pcia.',
                'parent_account' => 212000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            55 => 
            array (
                'id' => 57,
                'account' => 213000,
                'imputable' => 'N',
                'name' => 'PRENDARIAS COMPRA UNIDADES',
                'parent_account' => 210000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            56 => 
            array (
                'id' => 58,
                'account' => 214000,
                'imputable' => 'N',
                'name' => 'REMUNERAC. Y  CARGAS SOCIALES',
                'parent_account' => 210000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            57 => 
            array (
                'id' => 59,
                'account' => 214001,
                'imputable' => 'S',
                'name' => 'Sueldos a pagar',
                'parent_account' => 214000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            58 => 
            array (
                'id' => 60,
                'account' => 214002,
                'imputable' => 'S',
                'name' => 'Aportes y Contrib. S/Sueldos a Pagar',
                'parent_account' => 214000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            59 => 
            array (
                'id' => 61,
                'account' => 214003,
                'imputable' => 'S',
                'name' => 'Aportes y Cuotas Sind. a Pagar',
                'parent_account' => 214000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            60 => 
            array (
                'id' => 62,
                'account' => 215000,
                'imputable' => 'N',
                'name' => 'DEUDAS  TRIBUTARIAS',
                'parent_account' => 210000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            61 => 
            array (
                'id' => 63,
                'account' => 215100,
                'imputable' => 'S',
                'name' => 'Tributos a pagar -AFIP-',
                'parent_account' => 215000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            62 => 
            array (
                'id' => 64,
                'account' => 215200,
                'imputable' => 'S',
                'name' => 'Imp. Ing. Brutos Bs.As. a Pagar',
                'parent_account' => 215000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            63 => 
            array (
                'id' => 65,
                'account' => 215300,
                'imputable' => 'S',
                'name' => 'Imp. Ing. Brutos Otros a Pagar',
                'parent_account' => 215000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            64 => 
            array (
                'id' => 66,
                'account' => 215400,
                'imputable' => 'S',
                'name' => 'Percep. IIBB a Depositar',
                'parent_account' => 215000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            65 => 
            array (
                'id' => 67,
                'account' => 215500,
                'imputable' => 'S',
                'name' => 'IVA - Débito fiscal 21%',
                'parent_account' => 215000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            66 => 
            array (
                'id' => 68,
                'account' => 216000,
                'imputable' => 'N',
                'name' => 'OTRAS CUENTAS POR PAGAR',
                'parent_account' => 210000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            67 => 
            array (
                'id' => 69,
                'account' => 217000,
                'imputable' => 'N',
                'name' => 'OTRAS DEUDAS',
                'parent_account' => 210000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            68 => 
            array (
                'id' => 70,
                'account' => 217250,
                'imputable' => 'S',
                'name' => 'Contrareembolso',
                'parent_account' => 217000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            69 => 
            array (
                'id' => 71,
                'account' => 220000,
                'imputable' => 'N',
                'name' => 'PASIVO NO CORRIENTE',
                'parent_account' => 200000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            70 => 
            array (
                'id' => 72,
                'account' => 281000,
                'imputable' => 'N',
                'name' => 'CUENTAS DIRECTORES',
                'parent_account' => 280000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            71 => 
            array (
                'id' => 73,
                'account' => 282000,
                'imputable' => 'N',
                'name' => 'CAPITAL',
                'parent_account' => 280000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            72 => 
            array (
                'id' => 74,
                'account' => 282100,
                'imputable' => 'S',
                'name' => 'Capital Social - Acciones en Circulación',
                'parent_account' => 282000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            73 => 
            array (
                'id' => 75,
                'account' => 283000,
                'imputable' => 'N',
                'name' => 'APORTES NO CAPITALIZABLES',
                'parent_account' => 282000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            74 => 
            array (
                'id' => 76,
                'account' => 300000,
                'imputable' => 'N',
                'name' => 'INGRESOS',
                'parent_account' => 0,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            75 => 
            array (
                'id' => 77,
                'account' => 310000,
                'imputable' => 'N',
                'name' => 'INGRESOS  ORDINARIOS',
                'parent_account' => 300000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            76 => 
            array (
                'id' => 78,
                'account' => 311100,
                'imputable' => 'S',
                'name' => 'Fletes nacionales',
                'parent_account' => 311000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            77 => 
            array (
                'id' => 79,
                'account' => 312900,
                'imputable' => 'S',
                'name' => 'Ingresos Varios Refop',
                'parent_account' => 312000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            78 => 
            array (
                'id' => 80,
                'account' => 313000,
                'imputable' => 'N',
                'name' => 'INGRESOS MONETARIOS / FINANCIEROS',
                'parent_account' => 310000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            79 => 
            array (
                'id' => 81,
                'account' => 320000,
                'imputable' => 'N',
                'name' => 'INGRESOS NO ORDINARIOS',
                'parent_account' => 300000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            80 => 
            array (
                'id' => 82,
                'account' => 321000,
                'imputable' => 'N',
                'name' => 'VENTAS DE BIENES DE USO',
                'parent_account' => 0,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            81 => 
            array (
                'id' => 83,
                'account' => 321200,
                'imputable' => 'S',
                'name' => 'Recupero de Seguros',
                'parent_account' => 321000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            82 => 
            array (
                'id' => 84,
                'account' => 322000,
                'imputable' => 'N',
                'name' => 'INGRESOS VARIOS',
                'parent_account' => 320000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            83 => 
            array (
                'id' => 85,
                'account' => 330000,
                'imputable' => 'N',
                'name' => 'INGRESOS/GTOS POR CUENTA DE TERCEROS',
                'parent_account' => 300000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            84 => 
            array (
                'id' => 86,
                'account' => 330100,
                'imputable' => 'S',
                'name' => 'Reintegro gastos por cuenta terceros',
                'parent_account' => 330000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            85 => 
            array (
                'id' => 87,
                'account' => 400000,
                'imputable' => 'N',
                'name' => 'EGRESOS',
                'parent_account' => 0,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            86 => 
            array (
                'id' => 88,
                'account' => 410000,
                'imputable' => 'N',
                'name' => 'EGRESOS ORDINARIOS',
                'parent_account' => 400000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            87 => 
            array (
                'id' => 89,
                'account' => 410121,
                'imputable' => 'S',
                'name' => 'ITC account de Servicio',
                'parent_account' => 400000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            88 => 
            array (
                'id' => 90,
                'account' => 411000,
                'imputable' => 'N',
                'name' => 'GASTOS OPERATIVOS FLETES',
                'parent_account' => 410000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            89 => 
            array (
                'id' => 91,
                'account' => 411010,
                'imputable' => 'N',
                'name' => 'Remuneraciones',
                'parent_account' => 411000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            90 => 
            array (
                'id' => 92,
                'account' => 411012,
                'imputable' => 'S',
                'name' => 'Indemnizaciones',
                'parent_account' => 411010,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            91 => 
            array (
                'id' => 93,
                'account' => 411014,
                'imputable' => 'S',
                'name' => 'Ropa de Trabajo',
                'parent_account' => 411010,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            92 => 
            array (
                'id' => 94,
                'account' => 411020,
                'imputable' => 'N',
                'name' => 'Reparaciones de Terceros',
                'parent_account' => 411000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            93 => 
            array (
                'id' => 95,
                'account' => 411028,
                'imputable' => 'S',
                'name' => 'Tornería',
                'parent_account' => 411020,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            94 => 
            array (
                'id' => 96,
                'account' => 411034,
                'imputable' => 'S',
                'name' => 'Pintura',
                'parent_account' => 411030,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            95 => 
            array (
                'id' => 97,
                'account' => 411039,
                'imputable' => 'S',
                'name' => 'Reparaciones Varias',
                'parent_account' => 411030,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            96 => 
            array (
                'id' => 98,
                'account' => 411040,
                'imputable' => 'N',
                'name' => 'Repuestos y Cubiertas',
                'parent_account' => 411000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            97 => 
            array (
                'id' => 99,
                'account' => 411041,
                'imputable' => 'S',
                'name' => 'Repuestos',
                'parent_account' => 411040,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            98 => 
            array (
                'id' => 100,
                'account' => 411042,
                'imputable' => 'S',
                'name' => 'Materiales Consumibles',
                'parent_account' => 411040,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            99 => 
            array (
                'id' => 101,
                'account' => 411043,
                'imputable' => 'S',
                'name' => 'Filtros',
                'parent_account' => 411040,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            100 => 
            array (
                'id' => 102,
                'account' => 411049,
                'imputable' => 'S',
                'name' => 'Repuestos y Materiales Vs.',
                'parent_account' => 411040,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            101 => 
            array (
                'id' => 103,
                'account' => 411050,
                'imputable' => 'N',
                'name' => 'Combustibles y Lubricantes',
                'parent_account' => 411000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            102 => 
            array (
                'id' => 104,
                'account' => 411051,
                'imputable' => 'S',
                'name' => 'Gas - Oil',
                'parent_account' => 411050,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            103 => 
            array (
                'id' => 105,
                'account' => 411052,
                'imputable' => 'S',
                'name' => 'Nafta',
                'parent_account' => 411050,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            104 => 
            array (
                'id' => 106,
                'account' => 411060,
                'imputable' => 'N',
                'name' => 'Peajes, Viaticos y Representacion',
                'parent_account' => 411000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            105 => 
            array (
                'id' => 107,
                'account' => 411061,
                'imputable' => 'S',
                'name' => 'Peajes Nacionales',
                'parent_account' => 411060,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            106 => 
            array (
                'id' => 108,
                'account' => 411070,
                'imputable' => 'N',
                'name' => 'Seguros',
                'parent_account' => 411000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            107 => 
            array (
                'id' => 109,
                'account' => 411072,
                'imputable' => 'S',
                'name' => 'Seguros de Cargas',
                'parent_account' => 411070,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            108 => 
            array (
                'id' => 110,
                'account' => 411073,
                'imputable' => 'S',
                'name' => 'Seguro Acc. de trabajo',
                'parent_account' => 411070,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            109 => 
            array (
                'id' => 111,
                'account' => 411074,
                'imputable' => 'S',
                'name' => 'Seguro de Vida',
                'parent_account' => 411070,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            110 => 
            array (
                'id' => 112,
                'account' => 411080,
                'imputable' => 'N',
                'name' => 'Fleteros',
                'parent_account' => 411000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            111 => 
            array (
                'id' => 113,
                'account' => 411081,
                'imputable' => 'S',
                'name' => 'Fleteros Nacionales',
                'parent_account' => 411080,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            112 => 
            array (
                'id' => 114,
                'account' => 411082,
                'imputable' => 'S',
                'name' => 'Fleteros Internacionales',
                'parent_account' => 411080,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            113 => 
            array (
                'id' => 115,
                'account' => 411090,
                'imputable' => 'N',
                'name' => 'Gastos Varios',
                'parent_account' => 411000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            114 => 
            array (
                'id' => 116,
                'account' => 411099,
                'imputable' => 'S',
                'name' => 'Varios',
                'parent_account' => 411090,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            115 => 
            array (
                'id' => 117,
                'account' => 413000,
                'imputable' => 'N',
                'name' => 'GASTOS  ADMINISTRACION',
                'parent_account' => 410000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            116 => 
            array (
                'id' => 118,
                'account' => 413010,
                'imputable' => 'S',
                'name' => 'Sueldos y Cargas Sociales',
                'parent_account' => 413000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            117 => 
            array (
                'id' => 119,
                'account' => 413040,
                'imputable' => 'S',
                'name' => 'Servicios  profesionales',
                'parent_account' => 413000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            118 => 
            array (
                'id' => 120,
                'account' => 413050,
                'imputable' => 'S',
                'name' => 'Servicios Administrativos Varios',
                'parent_account' => 413000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            119 => 
            array (
                'id' => 121,
                'account' => 413070,
                'imputable' => 'S',
                'name' => 'Viaticos y Presentación',
                'parent_account' => 413070,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            120 => 
            array (
                'id' => 122,
                'account' => 413080,
                'imputable' => 'S',
                'name' => 'Alquileres',
                'parent_account' => 413000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            121 => 
            array (
                'id' => 123,
                'account' => 413090,
                'imputable' => 'S',
                'name' => 'Papelería e Insumos de Oficina',
                'parent_account' => 413000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            122 => 
            array (
                'id' => 124,
                'account' => 413120,
                'imputable' => 'S',
                'name' => 'Seguros Automoviles',
                'parent_account' => 413000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            123 => 
            array (
                'id' => 125,
                'account' => 414000,
                'imputable' => 'N',
                'name' => 'GASTOS  GASTOS SERVICIOS  PUBLICOS',
                'parent_account' => 410000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            124 => 
            array (
                'id' => 126,
                'account' => 414010,
                'imputable' => 'S',
                'name' => 'Teléfono',
                'parent_account' => 414000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            125 => 
            array (
                'id' => 127,
                'account' => 414020,
                'imputable' => 'S',
                'name' => 'Energia Electrica',
                'parent_account' => 414000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            126 => 
            array (
                'id' => 128,
                'account' => 414030,
                'imputable' => 'S',
                'name' => 'Gas',
                'parent_account' => 414000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            127 => 
            array (
                'id' => 129,
                'account' => 414040,
                'imputable' => 'S',
                'name' => 'Otros',
                'parent_account' => 414000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            128 => 
            array (
                'id' => 130,
                'account' => 415000,
                'imputable' => 'N',
                'name' => 'IMPUESTOS NAC.-PROV.-Y MUNIC.',
                'parent_account' => 410000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            129 => 
            array (
                'id' => 131,
                'account' => 415010,
                'imputable' => 'N',
                'name' => 'Imp. a las Ganancias',
                'parent_account' => 415000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            130 => 
            array (
                'id' => 132,
                'account' => 415040,
                'imputable' => 'S',
                'name' => 'Imp. Inmobliliario',
                'parent_account' => 415000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            131 => 
            array (
                'id' => 133,
                'account' => 415050,
                'imputable' => 'S',
            'name' => 'Imp. a los Automotores (Patentes)',
                'parent_account' => 415000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            132 => 
            array (
                'id' => 134,
                'account' => 416010,
                'imputable' => 'S',
                'name' => 'Intereses y Recargos Tributarios',
                'parent_account' => 416000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            133 => 
            array (
                'id' => 135,
                'account' => 416020,
                'imputable' => 'S',
                'name' => 'Gastos Bancarios',
                'parent_account' => 416000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            134 => 
            array (
                'id' => 136,
                'account' => 416030,
                'imputable' => 'S',
                'name' => 'Intereses Bancarios',
                'parent_account' => 416000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            135 => 
            array (
                'id' => 137,
                'account' => 416040,
                'imputable' => 'S',
                'name' => 'Intereses Otros Prestamos',
                'parent_account' => 416000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            136 => 
            array (
                'id' => 138,
                'account' => 416050,
                'imputable' => 'S',
                'name' => 'Diferencia de Cambio',
                'parent_account' => 416000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            137 => 
            array (
                'id' => 139,
                'account' => 417000,
                'imputable' => 'N',
                'name' => 'GASTOS BIENES DE USO',
                'parent_account' => 410000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            138 => 
            array (
                'id' => 140,
                'account' => 417010,
                'imputable' => 'S',
                'name' => 'Amortizaciones Bienes de Uso',
                'parent_account' => 417000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            139 => 
            array (
                'id' => 141,
                'account' => 417020,
                'imputable' => 'S',
                'name' => 'Costo Venta Bienes Uso',
                'parent_account' => 417000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            140 => 
            array (
                'id' => 142,
                'account' => 418000,
                'imputable' => 'N',
                'name' => 'IMPUESTOS NAC. - PROV.-MUNIC.',
                'parent_account' => 410000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            141 => 
            array (
                'id' => 143,
                'account' => 418151,
                'imputable' => 'S',
                'name' => 'Costo Producto',
                'parent_account' => 418000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            142 => 
            array (
                'id' => 144,
                'account' => 419000,
                'imputable' => 'N',
                'name' => 'GASTOS BANCARIOS Y FINANCIEROS',
                'parent_account' => 410000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            143 => 
            array (
                'id' => 145,
                'account' => 419155,
                'imputable' => 'S',
                'name' => 'Gastos por Rendición de Partes',
                'parent_account' => 419000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            144 => 
            array (
                'id' => 146,
                'account' => 500100,
                'imputable' => 'S',
                'name' => 'Capital Social',
                'parent_account' => 500000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            145 => 
            array (
                'id' => 147,
                'account' => 800000,
                'imputable' => 'N',
                'name' => 'CUENTAS DE MOVIMIENTO',
                'parent_account' => 0,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            146 => 
            array (
                'id' => 148,
                'account' => 800054,
                'imputable' => 'S',
                'name' => 'Compensación de Proveedores',
                'parent_account' => 800000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            147 => 
            array (
                'id' => 149,
                'account' => 810000,
                'imputable' => 'N',
                'name' => 'MOVIMIENTO EGRESOS',
                'parent_account' => 800000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            148 => 
            array (
                'id' => 150,
                'account' => 820000,
                'imputable' => 'N',
                'name' => 'MOVIMIENTO INGRESOS',
                'parent_account' => 800000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            149 => 
            array (
                'id' => 151,
                'account' => 830000,
                'imputable' => 'N',
                'name' => 'DESCUENTOS CLIENTES',
                'parent_account' => 800000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            150 => 
            array (
                'id' => 152,
                'account' => 850000,
                'imputable' => 'N',
                'name' => 'CUENTAS DE AJUSTES',
                'parent_account' => 800000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            151 => 
            array (
                'id' => 153,
                'account' => 910000,
                'imputable' => 'S',
                'name' => 'SALDOS INICIALES',
                'parent_account' => 899999,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            152 => 
            array (
                'id' => 154,
                'account' => 920000,
                'imputable' => 'S',
                'name' => 'AJUSTE SALDOS PROVEEDORES',
                'parent_account' => 899999,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            153 => 
            array (
                'id' => 155,
                'account' => 950000,
                'imputable' => 'N',
                'name' => 'MOVIMIENTO MONEDA EXTRANJERA',
                'parent_account' => 800000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            154 => 
            array (
                'id' => 156,
                'account' => 960000,
                'imputable' => 'N',
                'name' => 'MOVIMIENTOS DE CAJA',
                'parent_account' => 800000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            155 => 
            array (
                'id' => 157,
                'account' => 960100,
                'imputable' => 'S',
                'name' => 'Cambios de Moneda y Bonos',
                'parent_account' => 960000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            156 => 
            array (
                'id' => 158,
                'account' => 970000,
                'imputable' => 'N',
                'name' => 'MOVIMIENTOS DE CLIENTES',
                'parent_account' => 800000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            157 => 
            array (
                'id' => 159,
                'account' => 970101,
                'imputable' => 'S',
                'name' => 'Mercadería Recibida en Consignación',
                'parent_account' => 970000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            158 => 
            array (
                'id' => 160,
                'account' => 970102,
                'imputable' => 'S',
                'name' => 'Comitente',
                'parent_account' => 970000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            159 => 
            array (
                'id' => 161,
                'account' => 970103,
                'imputable' => 'S',
                'name' => 'Mercadería Recibida en Consignación pendiente de Factura',
                'parent_account' => 970000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            160 => 
            array (
                'id' => 162,
                'account' => 970104,
                'imputable' => 'S',
                'name' => 'Mercadería Recibida pendiente de Factura',
                'parent_account' => 970000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            161 => 
            array (
                'id' => 163,
                'account' => 113305,
                'imputable' => 'S',
                'name' => 'Ingresos Brutos - Retenc. CABA - Sufridas',
                'parent_account' => 113000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            162 => 
            array (
                'id' => 164,
                'account' => 113306,
                'imputable' => 'S',
                'name' => 'Ingresos Brutos - Percep. CABA - Sufridas',
                'parent_account' => 113000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            163 => 
            array (
                'id' => 165,
                'account' => 113307,
                'imputable' => 'S',
                'name' => 'Ingresos Brutos - Retenc. Santa Fé - Sufridas',
                'parent_account' => 113000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            164 => 
            array (
                'id' => 166,
                'account' => 113308,
                'imputable' => 'S',
                'name' => 'Ingresos Brutos - Percep. Santa Fé - Sufridas',
                'parent_account' => 113000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            165 => 
            array (
                'id' => 167,
                'account' => 113309,
                'imputable' => 'S',
                'name' => 'Ingresos Brutos - Retenc. Córdoba - Sufridas',
                'parent_account' => 113000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            166 => 
            array (
                'id' => 168,
                'account' => 113310,
                'imputable' => 'S',
                'name' => 'Ingresos Brutos - Percep. Córdoba - Sufridas',
                'parent_account' => 113000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            167 => 
            array (
                'id' => 169,
                'account' => 215401,
                'imputable' => 'S',
                'name' => 'Percep. IVA a Depositar',
                'parent_account' => 215000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            168 => 
            array (
                'id' => 170,
                'account' => 215501,
                'imputable' => 'S',
                'name' => 'IVA - Débito Fiscal 10,5%',
                'parent_account' => 215000,
                'created_at' => '2020-09-01 00:00:00',
                'updated_at' => '2020-09-01 00:00:00',
            ),
            169 => 
            array (
                'id' => 171,
                'account' => 211002,
                'imputable' => 'S',
                'name' => 'WWW',
                'parent_account' => 211001,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            170 => 
            array (
                'id' => 172,
                'account' => 211003,
                'imputable' => 'S',
                'name' => 'UNA CUENTA',
                'parent_account' => 211001,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            171 => 
            array (
                'id' => 173,
                'account' => 112101,
                'imputable' => 'S',
                'name' => 'CLIENTES MINORISTAS',
                'parent_account' => 112100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            172 => 
            array (
                'id' => 174,
                'account' => 112102,
                'imputable' => 'S',
                'name' => 'CLIENTES MAYORISTAS',
                'parent_account' => 112100,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}