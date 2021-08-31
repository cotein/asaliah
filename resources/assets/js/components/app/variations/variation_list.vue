<template>
    <div>
        <loading 
            :active.sync="loading" 
            color="#0469c7"
            :can-cancel="false" 
            :is-full-page="false">
        </loading>
        <v-client-table
            ref="variations"
            :columns="columns"
            :data="rows"
            :options="options"
        >
        </v-client-table>
    </div>
</template>

<script>
import value from './value';
//import size from './size';
import total from './total';
//import color from './color';
import publish from './publish';
import collect from 'collect.js';
import published from './published';
import status_here from './status_here';
import status_meli from './status_meli';
import Loading from 'vue-loading-overlay';
import {mapGetters, mapActions} from 'vuex';
import increment_meli from './increment_meli';
import increment_here from './increment_here';
import 'vue-loading-overlay/dist/vue-loading.css';
import row_number from './../publications/partials/row-number';

export default {
    props : ['variations'],
    components : {
        Loading
    },
    data() {
        return {
            loading : true,
            columns : [
                'number',
                'available_total',
                'available_quantity_meli',
                'status_meli',
                'available_quantity_here',
                'status_here',
                'publish',
            ],
            rows : this.variations.variation,
            options: {
                resizableColumns : true,
                perPage: 15,
                perPageValues: [10, 25, 50, 100],
                headings: {
                    number: "N°",
                    //color : "Color",
                    //talle : "Talle",
                    available_total : "Disponible",
                    available_quantity_meli : "Publicar en Mercado Libre",
                    status_meli : 'Mercado Libre',
                    available_quantity_here : "Publicar Aquí",
                    status_here : "Aquí",
                    publish : 'Publicar',
                },
                /*  rowClassCallback(row) {
                    return (!row.valid)?'alert-danger':''; 
                }, */
                templates: {
                    number : row_number,
                    //color : value,
                    //talle : value,
                    available_total : total,
                    available_quantity_meli : increment_meli,
                    available_quantity_here : increment_here,
                    status_meli : status_meli,
                    status_here : status_here,
                    publish : publish
                },
                columnsClasses: {
                    number: 'text-center',
                    color: 'text-center',
                    talle: 'text-center',
                    available_total :  'text-center',
                    available_quantity_meli :  'text-center',
                    available_quantity_here :  'text-center',
                    status_meli : 'text-center',
                    status_here : 'text-center',
                    publish : 'text-center',
                },
                sorteable: ['number'],
                //filterable: ["number", 'category_id', 'status', 'price']
            }
        }
    },
    methods : {
        
    },
    mounted() {
        setTimeout(()=>{
            this.loading = false
        }, 1750)

        let $vm = this;
        let h = collect($vm.variations.heads);

        let heads = h.map((i)=>{

            return collect(i).map((a)=>{

                return a.id;

            });

        });

        let final_heads = heads.flatten().unique().all();

        collect(final_heads).each((item) => {

            let i =  new String(item);

            $vm.columns.splice(1, 0, i.toLowerCase().trim());

        });

        collect($vm.variations.heads).map((i)=>{
            
            collect(i).map((a)=>{

                let id = new String(a.id);

                let id_lower = id.toLowerCase().trim();
                
                let obj = {
                    [id_lower] : value
                }

                $vm.options.templates = Object.assign({}, $vm.options.templates, obj);

                let he = {
                    [id_lower] : a.name
                }

                $vm.options.headings = Object.assign({}, $vm.columns.headings, he);
            });
        });

    },

}
</script>
<style scoped>
    th:nth-child(5) {
        width: 165px;
    }
    tr td:nth-child(7) {
        width: 100px;
    }
</style>

