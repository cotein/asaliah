<template>
    <div class="text-center">
        <ul class="no-bullets">
            <li class="text-right">
                <strong>
                    Disponibles {{data.available_quantity}}
                </strong>
            </li >
            <li class="text-right">Vendidos {{data.sold_quantity}}</li>
            <li class="text-right">
                <span v-if="spinner" class="spinner spinner-primary spinner-sm pos-r sq-32"></span>
                <span v-else>Visitas {{visits}}</span>
            </li>
        </ul>
    </div>
</template>

<script>
    import auth from './../../../../../mixins/auth';
    import sleep from './../../../../../mixins/sleep-mixin';
    import toast_mixin from './../../../../../mixins/toast-mixin';
    import random_number from './../../../../../mixins/random_number';
    export default {
        props: ['data'],
        mixins : [auth, toast_mixin, random_number, sleep],
        data() {
            return {
                spinner : false,
                visits : 0,
            }
        },

        methods : {

            async visits_by_publication  () {
                
                let $vm = this;

                $vm.spinner = true;

                let payload = {
                    token : $vm.User.token,
                    publication_id : $vm.data.id
                }

                let visits = await $vm.$store.dispatch('visits_by_publication', payload)
                    .catch((err) => {
                        $vm.error_message('Se ha producido un error en la consulta', 'MercadoLibre');
                    }).finally(()=>{
                        $vm.spinner = false;
                    });

                    if (visits) {
                        Object.keys(visits.data.body).forEach(function(key) {
                            $vm.visits = visits.data.body[key];
                        });
                    }
            },

            getVisits()
            {
                let ms = this.random_number(350000, 1500000);

                this.sleep(ms);

                this.visits_by_publication()
            }
        },

        watch : {
            data(n){
                this.getVisits();
            }
        },
        mounted()
        {
            this.getVisits();
            
        }

       
    }
</script>
<style  scoped>
.no-bullets {
  list-style-type: none; /* Remove bullets */
  padding: 0; /* Remove padding */
  margin: 0; /* Remove margins */
}
</style>