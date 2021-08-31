<template>
    <div class="col-md-8 col-md-offset-2">
        <div class="card">
            <div class="card-header">
                <strong >Atributos de la categoría</strong>
                <button class="btn btn-warning btn-xs pull-right"
                @click="add_attr">Nuevo Atributo</button>
            </div>
            <div class="card-body" data-toggle="match-height" style="height: 200px;">
                <table class="table table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center col-md-1">#</th>
                            <th class="text-center col-md-6">Atributo</th>
                            <th class="text-center col-md-1">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <attr_row v-for="(attr, index) in AttributesFromCategoryGetter" :key="index" :index="index">
                            
                        </attr_row>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import {mapGetters} from 'vuex';
import attr_row from './attr_row.vue';

export default {
    components : {
        attr_row
    },
    data(){
        return {
        }
    },

    computed : {

        ...mapGetters([
            'AttributesFromCategoryGetter'
        ])
    },

    methods : {
        
        delete_attr(index){
            this.attributes.splice(index, 1);
        },

        add_attr(){
            this.$store.commit('ADD_ATTRIBUTE_TO_CATEGORY');
        }
    }
}
</script>
