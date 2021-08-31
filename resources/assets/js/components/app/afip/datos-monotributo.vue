<template>
    <div>
        <div class="text-center m-b">
            <h3 class="m-b-0">Datos Monotributo</h3>
        </div>
        <div class="row gutter-xs" v-if="datos_monotributo">
            <div class="col-md-6">
                <div class="panel panel-body text-center ov-h">
                    <h5>Actividad</h5>
                    <p>
                        <small>{{datos_monotributo.actividadMonotributista.descripcionActividad}}</small>
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-body text-center ov-h">
                    <h5>Categoría</h5>
                    <p>
                        <small>{{datos_monotributo.categoriaMonotributo.descripcionCategoria}}</small>
                    </p>
                </div>
            </div>
            
        </div>
    </div>
</template>
<script>
export default {
    props : ['datos_monotributo'],

}
</script>
<style scoped>
    ul {
        list-style-type: none;
    }
</style>