<template>
<div class="row">
    <div class="col-md-12">
        <div class="card" >
            <div class="card-header" >
                Variantes
                <span class="pull-right">
                    <strong>{{data.title}}</strong>
                </span>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    
                </div>
                <table class="table table-striped">
                <thead>
                    <tr>
                    <th class="text-center col-md-1">#</th>
                    <th class="text-center  col-md-1">ID</th>
                    <th class="text-center col-md-1">Disponibles</th>
                    <th class="text-center col-md-1">Vendidas</th>
                    <th class="text-center col-md-2">Attributos</th>
                    <th class="text-center col-md-3">Nueva Cantidad</th>
                    <th class="text-center col-md-3">Nuevo Importe</th>
                    </tr>
                </thead>
                <tbody>
                    <PublicationListVariationRow 
                        v-for="(row, index) in data.variations" :key="row.id"
                        :index="index"
                        :variation="row"
                        :data="data"
                    />
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    import PublicationListVariationRow from './PublicationListVariationRow'
    import {mapGetters} from 'vuex';
    import collect from 'collect.js';
    import {Event} from 'vue-tables-2';
    import Datepicker from 'vuejs-datepicker';
    import {es} from 'vuejs-datepicker/dist/locale';
    import auth from './../../../../../mixins/auth';
    import toast_mixin from './../../../../../mixins/toast-mixin';
    export default {
        props: ['data'],
        components : {PublicationListVariationRow},
        mixins : [auth, toast_mixin],
        data() {
            return {
            }
        },
       
    }
</script>
