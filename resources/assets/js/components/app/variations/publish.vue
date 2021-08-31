<template>
    <div>
        <button @click="publish()" class="btn btn-info" 
            type="button"
            :class="{'btn btn-info spinner spinner-inverse spinner-sm' : show_spinner}"
            :disabled="show_spinner">
            Publicar
        </button>
    </div>
</template>

<script>
import collect from 'collect.js';
import {mapGetters} from 'vuex';
import busVue from './../../../extras/eventBus';
export default {
    props : ['data'],
    data() {
        return {
            show_spinner : false,
            values : this.data
        }
    },

    methods: {
        publish(){
            let $vm = this;

            if (! this.data.product_published_meli ) {
                $vm.show_spinner = true;
                setTimeout(() => {
                    window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + $vm.UserToken;
                    axios.post('/api/publication/publish', {'product' : $vm.data})
                    .then((result) => {
                        $vm.$toast.info('Variante actualizada correctamente ' , 'Proceso exitoso', $vm.InfoOk);
                    }).catch((err) => {
                        
                    }).finally(()=>{
                            
                        $vm.show_spinner = false;
                    });
                }, 500);
            }

            if (this.data.product_published_meli && this.data.variation_published_meli) {
                $vm.show_spinner = true;
                setTimeout(() => {
                    window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + $vm.UserToken;
                    axios.put('/api/publication/modify_quantity', {'data' : $vm.data})
                    .then((result) => {
                        
                        this.values = Object.assign({}, result.data.prdct);

                        $vm.$toast.info('Variante actualizada correctamente ' , 'Proceso exitoso', $vm.InfoOk);

                    }).catch((err) => {
                        console.error(err);
                    }).finally(()=>{
                        $vm.show_spinner = false;
                    });
                }, 500);
            }

            if (this.data.product_published_meli && (this.data.variation_published_meli == 0) ) {
                $vm.show_spinner = true;
                setTimeout(() => {
                    window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + $vm.UserToken;
                    axios.post('/api/publication/add_variation', {'data' : $vm.data})
                    .then((result) => {

                        $vm.$toast.info('Variante actualizada correctamente ' , 'Proceso exitoso', $vm.InfoOk);
                        
                    }).catch((err) => {
                        console.error(err);
                    }).finally(()=>{
                        $vm.show_spinner = false;
                    });
                }, 500);
            }
        },
    },

    computed : {
        Disabled(){
            if (this.data.status) {
                return true;
            }
            return false;
        },
        ...mapGetters([
            'ProductToPublish', 'UserToken',
            'InfoOk'
        ])
    },

    mounted() {
        let $vm = this;
        busVue.$on('increment_quantity', (values) => {
            if(values.variation_id == this.data.variation_id){
                $vm.values = Object.assign({}, values);
            }
        });

        busVue.$on('decrement_quantity', (values) => {
            if(values.variation_id == this.data.variation_id){
                $vm.values = Object.assign({}, values);
            }
        });

    },
}
</script>

<style>

</style>
