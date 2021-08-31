<?php

use Illuminate\Database\Seeder;

class ProvidersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('providers')->delete();
        
        \DB::table('providers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'ORLANDO DIONISIO MENCONI',
                'number' => '20008721123',
                'inscription_id' => 1,
                'address_id' => NULL,
                'purchaser_document_id' => 25,
                'datos_generales' => NULL,
                'regimen_general' => NULL,
                'monotributo' => NULL,
                'error_constancia' => NULL,
                'afip_data' => '{"personaReturn": {"metadata": {"servidor": "linux11e", "fechaHora": "2021-04-20T10:06:18.676-03:00"}, "datosGenerales": {"nombre": "ORLANDO DIONISIO", "apellido": "MENCONI", "idPersona": 20008721123, "mesCierre": 12, "tipoClave": "CUIT", "estadoClave": "ACTIVO", "tipoPersona": "FISICA", "domicilioFiscal": {"codPostal": "1814", "direccion": "SAN MARTIN 1333", "localidad": "CAÑUELAS", "idProvincia": 1, "tipoDomicilio": "FISCAL", "descripcionProvincia": "BUENOS AIRES"}}, "datosRegimenGeneral": {"regimen": [{"periodo": 201105, "idRegimen": 78, "idImpuesto": 217, "tipoRegimen": "RETENCION", "descripcionRegimen": "ENAJENACION DE BIENES MUEBLES Y BIENES DE CAMBIO"}, {"periodo": 201105, "idRegimen": 94, "idImpuesto": 217, "tipoRegimen": "RETENCION", "descripcionRegimen": "REG.RET.A LAS GANANCIAS - LOCACIONES DE OBRAS Y/O SERVICIOS, NO EJECUTADOS EN RELACION DE DEPENDENCIA, QUE NO SE ENCUENTREN TAXATIVAMENTE MENCIONADOS EN LOS INCISOS I Y J."}, {"periodo": 200009, "idRegimen": 116, "idImpuesto": 217, "tipoRegimen": "RETENCION", "descripcionRegimen": "HONORARIOS DE DIRECTOR DE S.A., FIDUCIARIO, INTEGRANTE DE CONSEJOS DE VIGILANCIA, Y SOCIOS ADMINISTRADORES DE S.R.L., EN COMANDITA SIMPLE Y POR ACCIONES. PROFESIONALES LIBERALES, OFICIOS, ALBACEA, SINDICO, MANDATARIO, GESTOR DE NEGOCIO."}, {"periodo": 201211, "idRegimen": 742, "idImpuesto": 353, "tipoRegimen": "RETENCION", "descripcionRegimen": "EMPRESAS DE SERVICIOS EVENTUALES"}, {"periodo": 201709, "idRegimen": 754, "idImpuesto": 353, "tipoRegimen": "RETENCION", "descripcionRegimen": "RETENCION CONTRIBUCIONES PATRONALES PRESTACION SERVICIOS DE INVESTIGACIÓN Y SEGURIDAD"}, {"periodo": 201103, "idRegimen": 280, "idImpuesto": 767, "tipoRegimen": "RETENCION", "descripcionRegimen": "PAGO DE HONORARIOS PROFESIONALES"}], "impuesto": [{"periodo": 190101, "idImpuesto": 11, "descripcionImpuesto": "GANANCIAS PERSONAS FISICAS"}, {"periodo": 199206, "idImpuesto": 30, "descripcionImpuesto": "IVA"}, {"periodo": 200009, "idImpuesto": 217, "descripcionImpuesto": "SICORE-IMPTO.A LAS GANANCIAS"}, {"periodo": 195003, "idImpuesto": 301, "descripcionImpuesto": "EMPLEADOR-APORTES SEG. SOCIAL"}, {"periodo": 201211, "idImpuesto": 353, "descripcionImpuesto": "RETENCIONES CONTRIB.SEG.SOCIAL"}, {"periodo": 201103, "idImpuesto": 767, "descripcionImpuesto": "SICORE - RETENCIONES Y PERCEPC"}], "actividad": {"orden": 1, "periodo": 201311, "idActividad": 492240, "nomenclador": 883, "descripcionActividad": "SERVICIO DE TRANSPORTE POR CAMIÓN CISTERNA"}}}}',
                'created_at' => '2021-04-20 13:07:20',
                'updated_at' => '2021-04-20 13:07:20',
                'accounting_account_id' => 52,
                'sublevel_accounting_account_id' => 78,
                'regimen_id' => 12,
                'iibb_exempt' => 0,
                'iva_exempt' => 0,
                'gcias_exempt' => 0,
                'suss_exempt' => 0,
                'has_afip_data' => 1,
                'contact' => NULL,
                'cell_phone' => NULL,
                'phone_1' => NULL,
                'phone_2' => NULL,
                'phone_3' => NULL,
                'email' => NULL,
                'others' => NULL,
                'status_id' => 1,
                'pay_condition' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'MOLINO CAÑUELAS SOCIEDAD ANONIMA COMERCIAL INDUSTRIAL  FINANCIERA INMOBILIARIA Y AGROPECUARIA',
                'number' => '30507950848',
                'inscription_id' => 1,
                'address_id' => NULL,
                'purchaser_document_id' => 25,
                'datos_generales' => NULL,
                'regimen_general' => NULL,
                'monotributo' => NULL,
                'error_constancia' => NULL,
            'afip_data' => '{"personaReturn": {"metadata": {"servidor": "linux11f", "fechaHora": "2021-05-10T20:03:02.242-03:00"}, "datosGenerales": {"idPersona": 30507950848, "mesCierre": 11, "tipoClave": "CUIT", "estadoClave": "ACTIVO", "razonSocial": "MOLINO CAÑUELAS SOCIEDAD ANONIMA COMERCIAL INDUSTRIAL  FINANCIERA INMOBILIARIA Y AGROPECUARIA", "tipoPersona": "JURIDICA", "domicilioFiscal": {"codPostal": "1814", "direccion": "KENNEDY 160", "localidad": "CAÑUELAS", "idProvincia": 1, "tipoDomicilio": "FISCAL", "descripcionProvincia": "BUENOS AIRES"}, "fechaContratoSocial": "1970-04-27T12:00:00-03:00"}, "datosRegimenGeneral": {"regimen": [{"periodo": 200001, "idRegimen": 78, "idImpuesto": 217, "tipoRegimen": "RETENCION", "descripcionRegimen": "ENAJENACION DE BIENES MUEBLES Y BIENES DE CAMBIO"}, {"periodo": 201607, "idRegimen": 171, "idImpuesto": 218, "tipoRegimen": "RETENCION", "descripcionRegimen": "OTRAS GANANCIAS NO PREVISTAS"}, {"periodo": 201904, "idRegimen": 765, "idImpuesto": 218, "tipoRegimen": "RETENCION", "descripcionRegimen": "TRANSFERENCIA DE TECNOLOGIA-INC A) PTO 1 ART 93 LIG-MARCAS Y PATENTES, Y DEMAS PRESTACIONES DE TECNOLOGIA INC A) PTO 2 ART 93 LIG, EN TODOS LOS CASOS EN QUE NO CUMPLEN LOS REQUIS.LEGALES PREVISTOS POR LA AUTORIDAD DE APLICACION (LEY TRANSF TECNO.)"}, {"periodo": 201805, "idRegimen": 771, "idImpuesto": 218, "tipoRegimen": "RETENCION", "descripcionRegimen": "RETRIBUCIONES POR SERVICIOS PERSONALES PRESTADOS POR ARTISTAS O DEPORTISTAS"}, {"periodo": 201907, "idRegimen": 820, "idImpuesto": 218, "tipoRegimen": "RETENCION", "descripcionRegimen": "RETRIBUCIONES POR SERVICIOS PERSONALES INDEPENDIENTES"}, {"periodo": 201907, "idRegimen": 902, "idImpuesto": 218, "tipoRegimen": "RETENCION", "descripcionRegimen": "TRANSFERENCIA DE TECNOLOGIA - ASISTENCIA TECNICA, SERVICIOS DE INGENIERIA O CONSULTORIA NO OBTENIBLES EN EL PAIS INCLUIDAS EN EL INCISO A) PUNTO 1, DEL ART.93 DE LA LIG EXCEPTO SOFTWARE"}, {"periodo": 201503, "idRegimen": 904, "idImpuesto": 218, "tipoRegimen": "RETENCION", "descripcionRegimen": "INTERESES POR PRESTAMOS OBTENIDOS EN EL EXTERIOR - ART. 93 INCISO C) PUNTO 1, DE LA LIG"}, {"periodo": 201907, "idRegimen": 962, "idImpuesto": 218, "tipoRegimen": "RETENCION", "descripcionRegimen": "USO DE PROGRAMAS DE SOFTWARE PARA COMPUTADORAS - BENEFICIARIO ES EL AUTOR O SU DERECHOHABIENTE"}, {"periodo": 201907, "idRegimen": 963, "idImpuesto": 218, "tipoRegimen": "RETENCION", "descripcionRegimen": "BENEFICIARIOS DEL EXTERIOR USO DE PROGRAMAS DE SOFTWARE PARA COMPUTADORAS - BENEFICIARIO NO ES EL AUTOR O SU DERECHOHABIENTE"}, {"periodo": 201503, "idRegimen": 742, "idImpuesto": 353, "tipoRegimen": "RETENCION", "descripcionRegimen": "EMPRESAS DE SERVICIOS EVENTUALES"}, {"periodo": 200311, "idRegimen": 748, "idImpuesto": 353, "tipoRegimen": "RETENCION", "descripcionRegimen": "RETENCIÓN DE PRESTADORES DE SERVICIOS DE LIMPIEZA DE INMUEBLES"}, {"periodo": 200502, "idRegimen": 754, "idImpuesto": 353, "tipoRegimen": "RETENCION", "descripcionRegimen": "RETENCION CONTRIBUCIONES PATRONALES PRESTACION SERVICIOS DE INVESTIGACIÓN Y SEGURIDAD"}, {"periodo": 201503, "idRegimen": 755, "idImpuesto": 353, "tipoRegimen": "RETENCION", "descripcionRegimen": "RETENCIÓN GENERAL DE CONTRIBUCIONES"}, {"periodo": 200001, "idRegimen": 493, "idImpuesto": 767, "tipoRegimen": "PERCEPCION", "descripcionRegimen": "REG.PER.AL VALOR AGREGADO - EMPRESAS PROVEEDORAS."}, {"periodo": 201807, "idRegimen": 160, "idImpuesto": 787, "tipoRegimen": "RETENCION", "descripcionRegimen": "RENTAS DEL TRABAJO PERSONAL BAJO RELACIÓN DE DEPENDENCIA Y OTROS"}, {"periodo": 20070101, "idRegimen": 68, "idImpuesto": 103, "descripcionRegimen": "PARTICIPACIONES SOCIETARIAS"}, {"periodo": 20080603, "idRegimen": 71, "idImpuesto": 103, "descripcionRegimen": "CITI - VENTAS"}, {"periodo": 20050101, "idRegimen": 72, "idImpuesto": 103, "descripcionRegimen": "CITI - COMPRAS"}, {"periodo": 20020401, "idRegimen": 226, "idImpuesto": 103, "descripcionRegimen": "GUIA FISCAL HARINERA - ESTABLECIMIENTOS MOLINEROS"}, {"periodo": 20020401, "idRegimen": 227, "idImpuesto": 103, "descripcionRegimen": "GUIA FISCAL HARINERA - USUARIOS DE MOLIENDA"}, {"periodo": 20100101, "idRegimen": 255, "idImpuesto": 103, "descripcionRegimen": "PRESENTACION DE ESTADOS CONTABLES EN FORMATO PDF"}], "impuesto": [{"periodo": 190101, "idImpuesto": 10, "descripcionImpuesto": "GANANCIAS SOCIEDADES"}, {"periodo": 198903, "idImpuesto": 30, "descripcionImpuesto": "IVA"}, {"periodo": 200501, "idImpuesto": 103, "descripcionImpuesto": "REGIMENES DE INFORMACIÓN"}, {"periodo": 200305, "idImpuesto": 211, "descripcionImpuesto": "BP-ACCIONES O PARTICIPACIONES"}, {"periodo": 200001, "idImpuesto": 217, "descripcionImpuesto": "SICORE-IMPTO.A LAS GANANCIAS"}, {"periodo": 201503, "idImpuesto": 218, "descripcionImpuesto": "IMP.A LAS GAN.- BENEF.DEL EXT."}, {"periodo": 197101, "idImpuesto": 301, "descripcionImpuesto": "EMPLEADOR-APORTES SEG. SOCIAL"}, {"periodo": 200311, "idImpuesto": 353, "descripcionImpuesto": "RETENCIONES CONTRIB.SEG.SOCIAL"}, {"periodo": 200001, "idImpuesto": 767, "descripcionImpuesto": "SICORE - RETENCIONES Y PERCEPC"}, {"periodo": 201807, "idImpuesto": 787, "descripcionImpuesto": "RET ART 79 LEY GCIAS INC A,BYC"}], "actividad": [{"orden": 16, "periodo": 201704, "idActividad": 11211, "nomenclador": 883, "descripcionActividad": "CULTIVO DE SOJA"}, {"orden": 15, "periodo": 201704, "idActividad": 11291, "nomenclador": 883, "descripcionActividad": "CULTIVO DE GIRASOL"}, {"orden": 18, "periodo": 201806, "idActividad": 14113, "nomenclador": 883, "descripcionActividad": "CRÍA DE GANADO BOVINO, EXCEPTO LA REALIZADA EN CABAÑAS Y PARA LA PRODUCCIÓN DE LECHE"}, {"orden": 3, "periodo": 201808, "idActividad": 104011, "nomenclador": 883, "descripcionActividad": "ELABORACIÓN DE ACEITES Y GRASAS VEGETALES  SIN REFINAR"}, {"orden": 19, "periodo": 201902, "idActividad": 104012, "nomenclador": 883, "descripcionActividad": "ELABORACIÓN DE ACEITE DE OLIVA"}, {"orden": 20, "periodo": 201908, "idActividad": 104013, "nomenclador": 883, "descripcionActividad": "ELABORACIÓN DE ACEITES Y GRASAS VEGETALES REFINADOS"}, {"orden": 1, "periodo": 201311, "idActividad": 106110, "nomenclador": 883, "descripcionActividad": "MOLIENDA DE TRIGO"}, {"orden": 4, "periodo": 201808, "idActividad": 107110, "nomenclador": 883, "descripcionActividad": "ELABORACIÓN DE GALLETITAS Y BIZCOCHOS"}, {"orden": 5, "periodo": 201808, "idActividad": 107121, "nomenclador": 883, "descripcionActividad": "ELABORACIÓN INDUSTRIAL DE PRODUCTOS DE PANADERÍA, EXCEPTO GALLETITAS Y BIZCOCHOS"}, {"orden": 2, "periodo": 201808, "idActividad": 107420, "nomenclador": 883, "descripcionActividad": "ELABORACIÓN DE PASTAS ALIMENTARIAS SECAS"}, {"orden": 21, "periodo": 201908, "idActividad": 107999, "nomenclador": 883, "descripcionActividad": "ELABORACIÓN DE PRODUCTOS ALIMENTICIOS N.C.P."}, {"orden": 14, "periodo": 201808, "idActividad": 108000, "nomenclador": 883, "descripcionActividad": "ELABORACIÓN DE ALIMENTOS PREPARADOS PARA ANIMALES"}, {"orden": 10, "periodo": 201808, "idActividad": 170201, "nomenclador": 883, "descripcionActividad": "FABRICACIÓN DE PAPEL ONDULADO Y ENVASES DE PAPEL"}, {"orden": 11, "periodo": 201808, "idActividad": 181109, "nomenclador": 883, "descripcionActividad": "IMPRESIÓN N.C.P., EXCEPTO DE DIARIOS Y REVISTAS"}, {"orden": 6, "periodo": 201808, "idActividad": 461011, "nomenclador": 883, "descripcionActividad": "VENTA AL POR MAYOR EN COMISIÓN O CONSIGNACIÓN DE CEREALES (INCLUYE ARROZ), OLEAGINOSAS Y FORRAJERAS EXCEPTO SEMILLAS"}, {"orden": 9, "periodo": 201808, "idActividad": 461021, "nomenclador": 883, "descripcionActividad": "VENTA AL POR MAYOR EN COMISIÓN O CONSIGNACIÓN DE GANADO BOVINO EN PIE"}, {"orden": 22, "periodo": 201908, "idActividad": 462131, "nomenclador": 883, "descripcionActividad": "VENTA AL POR MAYOR DE CEREALES (INCLUYE ARROZ), OLEAGINOSAS Y FORRAJERAS EXCEPTO SEMILLAS"}, {"orden": 7, "periodo": 201808, "idActividad": 466110, "nomenclador": 883, "descripcionActividad": "VENTA AL POR MAYOR DE COMBUSTIBLES Y LUBRICANTES PARA AUTOMOTORES"}, {"orden": 23, "periodo": 201908, "idActividad": 469090, "nomenclador": 883, "descripcionActividad": "VENTA AL POR MAYOR DE MERCANCÍAS N.C.P."}, {"orden": 8, "periodo": 201808, "idActividad": 473000, "nomenclador": 883, "descripcionActividad": "VENTA AL POR MENOR DE COMBUSTIBLE PARA VEHÍCULOS AUTOMOTORES Y MOTOCICLETAS"}, {"orden": 24, "periodo": 201908, "idActividad": 479900, "nomenclador": 883, "descripcionActividad": "VENTA AL POR MENOR NO REALIZADA EN ESTABLECIMIENTOS  N.C.P."}, {"orden": 17, "periodo": 201704, "idActividad": 523090, "nomenclador": 883, "descripcionActividad": "SERVICIOS DE GESTIÓN Y LOGÍSTICA PARA EL TRANSPORTE DE MERCADERÍAS N.C.P."}, {"orden": 12, "periodo": 201808, "idActividad": 524210, "nomenclador": 883, "descripcionActividad": "SERVICIOS DE EXPLOTACIÓN DE INFRAESTRUCTURA PARA EL TRANSPORTE MARÍTIMO, DERECHOS DE PUERTO"}, {"orden": 13, "periodo": 201808, "idActividad": 649999, "nomenclador": 883, "descripcionActividad": "SERVICIOS DE FINANCIACIÓN Y ACTIVIDADES FINANCIERAS N.C.P."}, {"orden": 25, "periodo": 201908, "idActividad": 681098, "nomenclador": 883, "descripcionActividad": "SERVICIOS INMOBILIARIOS REALIZADOS POR CUENTA PROPIA, CON BIENES URBANOS PROPIOS O ARRENDADOS N.C.P."}, {"orden": 26, "periodo": 201908, "idActividad": 960990, "nomenclador": 883, "descripcionActividad": "SERVICIOS PERSONALES N.C.P."}]}}}',
                'created_at' => '2021-05-10 23:03:36',
                'updated_at' => '2021-05-10 23:03:36',
                'accounting_account_id' => 52,
                'sublevel_accounting_account_id' => 170,
                'regimen_id' => NULL,
                'iibb_exempt' => 0,
                'iva_exempt' => 0,
                'gcias_exempt' => 0,
                'suss_exempt' => 0,
                'has_afip_data' => 1,
                'contact' => 'nbnbnbn',
                'cell_phone' => NULL,
                'phone_1' => NULL,
                'phone_2' => NULL,
                'phone_3' => NULL,
                'email' => NULL,
                'others' => NULL,
                'status_id' => 1,
                'pay_condition' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'MAGALI RITA SEIDEM',
                'number' => '27341817876',
                'inscription_id' => 6,
                'address_id' => NULL,
                'purchaser_document_id' => 25,
                'datos_generales' => NULL,
                'regimen_general' => NULL,
                'monotributo' => NULL,
                'error_constancia' => NULL,
                'afip_data' => '{"personaReturn": {"metadata": {"servidor": "linux11b", "fechaHora": "2021-05-14T09:35:42.826-03:00"}, "datosGenerales": {"nombre": "MAGALI RITA", "apellido": "SEIDEM", "idPersona": 27341817876, "mesCierre": 12, "tipoClave": "CUIT", "estadoClave": "ACTIVO", "tipoPersona": "FISICA", "domicilioFiscal": {"codPostal": "1842", "direccion": "FRAY LUIS BELTRAN 623", "localidad": "MONTE GRANDE", "idProvincia": 1, "tipoDomicilio": "FISCAL", "descripcionProvincia": "BUENOS AIRES"}}, "datosMonotributo": {"impuesto": {"periodo": 201701, "idImpuesto": 20, "descripcionImpuesto": "MONOTRIBUTO"}, "categoriaMonotributo": {"periodo": 202002, "idImpuesto": 20, "idCategoria": 41, "descripcionCategoria": "G LOCACIONES DE SERVICIO"}, "actividadMonotributista": {"orden": 1, "periodo": 201709, "idActividad": 749009, "nomenclador": 883, "descripcionActividad": "ACTIVIDADES PROFESIONALES, CIENTÍFICAS Y TÉCNICAS N.C.P."}}}}',
                'created_at' => '2021-05-14 12:35:52',
                'updated_at' => '2021-05-14 12:35:52',
                'accounting_account_id' => 52,
                'sublevel_accounting_account_id' => 128,
                'regimen_id' => NULL,
                'iibb_exempt' => 0,
                'iva_exempt' => 0,
                'gcias_exempt' => 0,
                'suss_exempt' => 0,
                'has_afip_data' => 1,
                'contact' => NULL,
                'cell_phone' => NULL,
                'phone_1' => NULL,
                'phone_2' => NULL,
                'phone_3' => NULL,
                'email' => NULL,
                'others' => NULL,
                'status_id' => 1,
                'pay_condition' => NULL,
            ),
        ));
        
        
    }
}