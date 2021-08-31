<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('companies')->delete();
        
        \DB::table('companies')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'MI COMPAÑIA',
                'number' => '30714227803',
                'inscription_id' => 1,
                'purchaser_document_id' => 25,
                'datos_generales' => '{"idPersona": 30714227803, "mesCierre": 3, "tipoClave": "CUIT", "estadoClave": "ACTIVO", "razonSocial": "PIAMOND SA", "tipoPersona": "JURIDICA", "domicilioFiscal": {"codPostal": "1804", "direccion": "SENADORA PROVINCIAL MOSCOSO HERRERA 957", "localidad": "EZEIZA", "idProvincia": 1, "tipoDomicilio": "FISCAL", "descripcionProvincia": "BUENOS AIRES"}, "fechaContratoSocial": "2013-03-29T12:00:00-03:00"}',
            'regimen_general' => '{"regimen": [{"idRegimen": 68, "idImpuesto": 103, "descripcionRegimen": "PARTICIPACIONES SOCIETARIAS"}, {"idRegimen": 255, "idImpuesto": 103, "descripcionRegimen": "PRESENTACION DE ESTADOS CONTABLES EN FORMATO PDF"}], "impuesto": [{"periodo": 201310, "idImpuesto": 10, "descripcionImpuesto": "GANANCIAS SOCIEDADES"}, {"periodo": 201310, "idImpuesto": 30, "descripcionImpuesto": "IVA"}, {"periodo": 201310, "idImpuesto": 103, "descripcionImpuesto": "REGIMENES DE INFORMACIÓN"}, {"periodo": 201312, "idImpuesto": 301, "descripcionImpuesto": "EMPLEADOR-APORTES SEG. SOCIAL"}], "actividad": [{"orden": 5, "periodo": 201901, "idActividad": 139201, "nomenclador": 883, "descripcionActividad": "FABRICACIÓN DE FRAZADAS, MANTAS, PONCHOS, COLCHAS, COBERTORES, ETC."}, {"orden": 1, "periodo": 201311, "idActividad": 310020, "nomenclador": 883, "descripcionActividad": "FABRICACIÓN DE MUEBLES Y PARTES DE MUEBLES, EXCEPTO LOS QUE SON PRINCIPALMENTE DE MADERA (METAL, PLÁSTICO, ETC.)"}, {"orden": 2, "periodo": 201311, "idActividad": 310030, "nomenclador": 883, "descripcionActividad": "FABRICACIÓN DE SOMIERES Y COLCHONES"}, {"orden": 4, "periodo": 201311, "idActividad": 464610, "nomenclador": 883, "descripcionActividad": "VENTA AL POR MAYOR DE MUEBLES EXCEPTO DE OFICINA, ARTÍCULOS DE MIMBRE Y CORCHO, COLCHONES Y SOMIERES"}, {"orden": 7, "periodo": 202006, "idActividad": 464920, "nomenclador": 883, "descripcionActividad": "VENTA AL POR MAYOR DE MATERIALES Y PRODUCTOS DE LIMPIEZA"}, {"orden": 3, "periodo": 201311, "idActividad": 475420, "nomenclador": 883, "descripcionActividad": "VENTA AL POR MENOR DE COLCHONES Y SOMIERES"}, {"orden": 6, "periodo": 202006, "idActividad": 477450, "nomenclador": 883, "descripcionActividad": "VENTA AL POR MENOR DE MATERIALES Y PRODUCTOS DE LIMPIEZA"}]}',
                'monotributo' => NULL,
                'percep_iibb' => 1,
            'afip_data' => '{"metadata": {"servidor": "linux11b", "fechaHora": "2020-07-31T19:08:06.478-03:00"}, "datosGenerales": {"idPersona": 30714227803, "mesCierre": 3, "tipoClave": "CUIT", "estadoClave": "ACTIVO", "razonSocial": "PIAMOND SA", "tipoPersona": "JURIDICA", "domicilioFiscal": {"codPostal": "1804", "direccion": "SENADORA PROVINCIAL MOSCOSO HERRERA 957", "localidad": "EZEIZA", "idProvincia": 1, "tipoDomicilio": "FISCAL", "descripcionProvincia": "BUENOS AIRES"}, "fechaContratoSocial": "2013-03-29T12:00:00-03:00"}, "datosRegimenGeneral": {"regimen": [{"idRegimen": 68, "idImpuesto": 103, "descripcionRegimen": "PARTICIPACIONES SOCIETARIAS"}, {"idRegimen": 255, "idImpuesto": 103, "descripcionRegimen": "PRESENTACION DE ESTADOS CONTABLES EN FORMATO PDF"}], "impuesto": [{"periodo": 201310, "idImpuesto": 10, "descripcionImpuesto": "GANANCIAS SOCIEDADES"}, {"periodo": 201310, "idImpuesto": 30, "descripcionImpuesto": "IVA"}, {"periodo": 201310, "idImpuesto": 103, "descripcionImpuesto": "REGIMENES DE INFORMACIÓN"}, {"periodo": 201312, "idImpuesto": 301, "descripcionImpuesto": "EMPLEADOR-APORTES SEG. SOCIAL"}], "actividad": [{"orden": 5, "periodo": 201901, "idActividad": 139201, "nomenclador": 883, "descripcionActividad": "FABRICACIÓN DE FRAZADAS, MANTAS, PONCHOS, COLCHAS, COBERTORES, ETC."}, {"orden": 1, "periodo": 201311, "idActividad": 310020, "nomenclador": 883, "descripcionActividad": "FABRICACIÓN DE MUEBLES Y PARTES DE MUEBLES, EXCEPTO LOS QUE SON PRINCIPALMENTE DE MADERA (METAL, PLÁSTICO, ETC.)"}, {"orden": 2, "periodo": 201311, "idActividad": 310030, "nomenclador": 883, "descripcionActividad": "FABRICACIÓN DE SOMIERES Y COLCHONES"}, {"orden": 4, "periodo": 201311, "idActividad": 464610, "nomenclador": 883, "descripcionActividad": "VENTA AL POR MAYOR DE MUEBLES EXCEPTO DE OFICINA, ARTÍCULOS DE MIMBRE Y CORCHO, COLCHONES Y SOMIERES"}, {"orden": 7, "periodo": 202006, "idActividad": 464920, "nomenclador": 883, "descripcionActividad": "VENTA AL POR MAYOR DE MATERIALES Y PRODUCTOS DE LIMPIEZA"}, {"orden": 3, "periodo": 201311, "idActividad": 475420, "nomenclador": 883, "descripcionActividad": "VENTA AL POR MENOR DE COLCHONES Y SOMIERES"}, {"orden": 6, "periodo": 202006, "idActividad": 477450, "nomenclador": 883, "descripcionActividad": "VENTA AL POR MENOR DE MATERIALES Y PRODUCTOS DE LIMPIEZA"}]}}',
                'created_at' => '2020-07-31 22:08:08',
                'updated_at' => '2021-05-20 01:42:50',
                'percep_iva' => 0,
                'ret_suss' => 0,
                'ret_iva' => 0,
                'ret_iibb' => 0,
                'ret_gcias' => 0,
                'activity_init' => NULL,
                'iibb_conv' => '44444',
                'settings' => NULL,
                'pto_vta_fe' => NULL,
                'pto_vta_fe_exterior' => NULL,
                'pto_vta_fce' => NULL,
                'pto_vta_fce_exterior' => NULL,
                'pto_vta_remito' => NULL,
                'pto_vta_remito_exterior' => NULL,
                'pto_vta_recibo' => NULL,
            ),
        ));
        
        
    }
}