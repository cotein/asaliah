<template>
    <button @click="getOrder()" class="btn btn-primary btn-sm" type="button">Ver Detalle</button>
</template>

<script>
    
    export default {
        props: ['data', 'index'],
        data() {
            return {
                token : null
            }
        },
        methods : {
            getOrder(){
                let $vm = this;

                sessionStorage.setItem('order_id', $vm.data.id);
            
                window.location.href = '/ordenes/orden';
                /* setTimeout(() => {
                    
                    this.$store.dispatch('getOrder', obj).then((result) => {
                        
                        this.$store.commit('SET_ORDER', result.data.body);

                    }).catch((err) => {
                    
                    });

                }, 100); */
            }
        },
        computed : {
            
        },

        mounted() {
           this.token = this.$parent.$options.parent.$options.propsData.token
        },
       
    }
</script>
