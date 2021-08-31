<template>
    <div>
        <div class="text-center m-b">
            <h3 class="m-b-0">Datos Generales</h3>
        </div>
        <div class="row gutter-xs" v-if="datos_generales">
            <div class="col-md-4">
                <div class="panel panel-body text-center ov-h">
                    <h5>Nombre y Apellido</h5>
                    <p v-if="datos_generales.apellido">
                        <small>{{datos_generales.apellido}} {{datos_generales.nombre}}</small>
                    </p>
                    <p v-if="datos_generales.razonSocial">
                        <small>{{datos_generales.razonSocial}}</small>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-body text-center ov-h">
                    <h5>Estado</h5>
                    <p>
                        <small>{{datos_generales.estadoClave}}</small>
                    </p>
                </div>
            </div>
            <div class="col-md-4" v-if="datos_generales.domicilioFiscal">
                <div class="panel panel-body text-center ov-h">
                    <h5>Domicilio Fiscal</h5>
                    <ul>
                        <li class="text-left"><small>Dirección: {{datos_generales.domicilioFiscal.direccion}}</small></li>
                        <li class="text-left"><small>Cod. Pos.: {{datos_generales.domicilioFiscal.codPostal}}</small></li>
                        <li class="text-left"><small>Localidad: {{datos_generales.domicilioFiscal.localidad}}</small></li>
                        <li class="text-left"><small>Provincia: {{datos_generales.domicilioFiscal.descripcionProvincia}}</small></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row gutter-xs">
            <div class="col-md-4" v-if="datos_generales.domicilioFiscal">
                <div class="panel panel-body text-center ov-h">
                    <h5>Clave</h5>
                    <p>
                        <small>{{datos_generales.tipoClave}}</small>
                    </p>
                </div>
            </div>
            <div class="col-md-4" v-if="datos_generales.domicilioFiscal">
                <div class="panel panel-body text-center ov-h">
                    <h5>Número</h5>
                    <p>
                        <small>{{datos_generales.idPersona}}</small>
                    </p>
                </div>
            </div>
            <div class="col-md-4" v-if="datos_generales.domicilioFiscal">
                <div class="panel panel-body text-center ov-h">
                    <h5>Tipo</h5>
                    <p>
                        <small>{{datos_generales.tipoPersona}}</small>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props : ['datos_generales'],

}
</script>
<style scoped>
    ul {
        list-style-type: none;
    }
</style>