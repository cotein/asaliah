<template>
    <div>
        <label class="control-label">Lista de Precios</label>
        <div class="row">
            <div class="col-md-12">
                <div class="demo-form-wrapper">
                    <form class="form form-inline">
                        <div class="form-group">
                            <div class="input-with-icon">
                                <input 
                                    class="form-control" 
                                    type="text" 
                                    placeholder="Lista de Precios"
                                    v-model="name"
                                    >
                                <div class="icon icon-dollar input-icon"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-with-icon">
                                <input 
                                    class="form-control" 
                                    type="text" 
                                    placeholder="Beneficio"
                                    v-model="benefit">
                                <div class="icon icon-percent input-icon"></div>
                            </div>
                        </div>
                        <button 
                            class="btn btn-primary" 
                            type="submit"
                            :disabled="spinner"
                            @click.prevent="price_list_store"
                            :class="{'spinner spinner-inverse spinner-sm' : spinner}"
                            >Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {Event} from 'vue-tables-2';
    import {mapGetters, mapActions} from 'vuex';
    import toast_mixin from '../../../../../mixins/toast-mixin';
    import sleep_mixin from '../../../../../mixins/sleep-mixin';
    import view_error_mixin from '../../../../../mixins/Errors/View422StatusError';
    export default {
        
        mixins : [toast_mixin, sleep_mixin, view_error_mixin],

        data(){
            return {spinner : false}
        },

        computed : {

            ...mapGetters([
                'NewPriceListNameGetter',
                'NewPriceListBenefitGetter',
                'NewPriceListGetter'
            ]),

            name : {
                get(){
                    return this.NewPriceListNameGetter;
                },
                set(value){
                    this.$store.commit('NEW_PRICE_LIST_SET_NAME', value);
                }
            },

            benefit : {
                get(){
                    return this.NewPriceListBenefitGetter;
                },
                set(value){
                    this.$store.commit('NEW_PRICE_LIST_SET_BENEFIT', value);
                }
            }
        },

        methods : {

            ...mapActions([
                'priceListSetInitialStatus'
            ]),

            async price_list_store()
            {
                this.spinner = true;

                this.sleep(750);

                let payload = {
                    token : this.User.token,
                    price_list : this.NewPriceListGetter
                }

                let price_list = await this.$store.dispatch('priceListStore', payload)
                    .catch(err => {
                        if (err.response.status == 422) this.view_422_status_error(err.response.data.errors, 'Lista de Precios')    
                    }).finally(()=>{
                        this.spinner = false
                    });

                if (price_list) {
                    this.success_message('Lista de precios', 'Ingresada correctamente');
                    this.priceListSetInitialStatus();
                    this.$store.commit('ADD_NEW_PRICE_LIST_TO_LIST', price_list);
                    Event.$emit('PriceListWasCreated', price_list.data);
                }

            }
        }
    }
</script>

<style scoped>
    div div.row {
        margin-left: .3rem;
    }
    div label.control-label {
        margin-left: .3rem;
    }
</style>