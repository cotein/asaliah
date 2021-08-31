<template>
    <tr>
        <td>{{index + 1}}</td>
        <td>{{product.name}}</td>
        <td class="text-center">
            <div class="form-group">
                <multiselect placeholder="Elegir una opción" 
                    track-by="name" label="name"
                    v-model="iva" 
                    :disabled="(enable_button && updated)"
                    @select="select()"
                    :options="GetIvas">
                </multiselect>
            </div>
        </td>
        <td class="text-center">
            <div>
                <button @click="iva_update()"
                    :class="(spinner) ? 'btn spinner btn-danger spinner-inverse spinner-sm' : 'btn btn-outline-info btn-icon sq-32'" 
                    type="button"
                    :disabled="(enable_button && updated)"
                >
                    <span :class=" (updated) ? 'icon icon-check green' : 'icon icon-repeat'"></span>
                </button>
            </div>
        </td>
    </tr>
</template>
<script>
import {mapGetters} from 'vuex';
import {Event} from 'vue-tables-2';
import Multiselect from 'vue-multiselect'
import auth from './../../../../mixins/auth';
export default {
    props : ['index', 'product'],
    mixins : [auth],
    components : {
        Multiselect
    },
    data() {
        return {
            iva : null,
            spinner : false,
            updated : false,
            enable_button : false
        }
    },
    computed : {
        ...mapGetters([
            'GetIvas'
        ])
    },
    methods : {
        initial_status(){
            this.iva = null,
            this.spinner = false,
            this.updated = false
        },

        select(){
            this.enable_button = true;
        },

        iva_update(){
            this.spinner = true;
            setTimeout(() => {
                
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.User.token;

                    axios.post('/api/products/iva_update', 
                        {
                            'iva' : this.iva,
                            'product' : this.product
                        })
                    .then((result) => {
                        
                    }).catch((err) => {
                    
                    }).finally(()=>{
                        this.spinner = false;
                        this.updated = true;
                        this.enable_button = true;
                    })
            }, 1000);
        }
    },
    mounted() {
        Event.$on('modal_close', ()=>{
            this.initial_status();
        });

        setTimeout(() => {
            if (this.product.has_iva) {
                this.updated = true;
                this.enable_button = true;
            }
        }, 100);
    },
}
</script>
<style scoped>
    .green {
        color: #5cb85c;
        border-color: #5cb85c !important;
    }
</style>