<template>
    <div>
        <v-collapse-wrapper>
        <div class="card" style="zoom: 1;">
            <div class="card-header ">
                <div class="card-actions">
                    <button type="button" class="card-action card-toggler header" v-collapse-toggle></button>
                </div>
                <strong>Variantes del producto seleccionado</strong>
            </div>
            <div class="card-body my-content" data-toggle="match-height" style="display: block;" v-collapse-content>
                <table class="table table-borderless table-middle ">
                <tbody>
                    <tr v-for="(item, index) in variations" :key="index">
                        <td class="col-xs-1">{{index + 1}}</td>
                        <td class="col-xs-5">
                            <p class="link-muted">Color: {{item.attribute_combinations[0].value_name}}</p>
                        </td>
                        <td class="col-xs-2">
                            <p class="link-muted">Talle: {{item.attribute_combinations[1].value_name}}</p>
                        </td>
                        <td class="col-xs-2">
                            <p class="link-muted">Estado</p>
                        </td>
                        <td class="col-xs-2">
                            <p class="label label-danger label-pill">Sin publicar</p>
                        </td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
        </v-collapse-wrapper>
    </div>
</template>

<script>
import VueCollapse from 'vue2-collapse'
export default {
    props : ['variations'],
    components : {
        VueCollapse
    },
    data() {
        return {
            
        }
    },
}
</script>

<style scoped>
    .v-collapse-content{
        max-height: 0;
        transition: max-height 0.3s ease-out;
        overflow: hidden;
        padding: 0;
    }

    .v-collapse-content-end{
        transition: max-height 0.3s ease-in;
        max-height: 500px;
    }
</style>
