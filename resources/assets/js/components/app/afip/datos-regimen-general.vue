<template>
    <div>
        <div class="text-center m-b">
            <h3 class="m-b-0">Datos Regimen General</h3>
        </div>
        <div class="row gutter-xs" v-if="datos_regimen_general">
            <div class="col-md-12">
                <div class="panel panel-body text-center ov-h">
                    <h5>Actividad</h5>
                    <p v-for="(actividad, index) in datos_regimen_general.actividad" :key="index">
                        <small>{{actividad.descripcionActividad}}</small>
                    </p>
                </div>
            </div>
        </div>
        <div class="row gutter-xs" v-if="datos_regimen_general">
            <div class="col-md-4">
                <div class="panel panel-body text-center ov-h">
                    <h5>Impuestos</h5>
                    <ul v-for="(item, index) in datos_regimen_general.impuesto" :key="index">
                        <li class="text-left"><small>Impuesto: {{item.descripcionImpuesto}}</small></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-body text-center ov-h">
                    <h5>Regimen</h5>
                    <ul v-for="(item, index) in datos_regimen_general.regimen" :key="index">
                        <li v-if="! Array.isArray(item)" class="text-left"><small>{{item}}</small></li>
                        <li v-else class="text-left"><small>Regimen: {{item.descripcionRegimen}} - Tipo: {{item.tipoRegimen}} </small></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props : ['datos_regimen_general'],

}
</script>
<style scoped>
    ul {
        list-style-type: none;
    }
</style>