<template>
    <div ref="addressmodal" id="add-address-modal" tabindex="-1" role="dialog" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title">Actualizar Domicilio del Cliente</h4>
            </div>
            <div class="modal-body">
                
                <div class="row">
                    <div class="gorm-group">

                    <label class="col-sm-3 control-label" for="form-control-6">Provincia</label>
                    <div class="col-sm-9">
                        <multiselect 
                                placeholder="Seleccionar una Provincia" 
                                track-by="name" label="name"
                                @select="selectedState"
                                v-model="address.state"
                                :options="Provinces">
                        </multiselect>
                    </div>
                  
                    </div>
                </div>
                <div class="row" style="margin-top:15px">
                    <div class="gorm-group">

                    <label class="col-sm-3 control-label" for="form-control-6">Localidad</label>
                    <div class="col-sm-9">
                        <multiselect placeholder="Seleccionar una Localidad" 
                            track-by="name" label="name"
                            :disabled="disabled_city"
                            :loading="loading_cities"
                            v-model="address.city"
                            @select="selectedCity"
                            :options="Cities">
                        </multiselect>
                    </div>
                  
                    </div>
                </div>
                <div class="row" style="margin-top:15px">
                    <div class="gorm-group">
                        <label class="col-sm-3 control-label" for="form-control-3">Domicilio</label>
                        <div class="col-sm-9">
                            <input class="form-control" 
                            type="text" 
                            placeholder="Domicilio"
                            :disabled="disabled_address"
                            v-model="address.address">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" 
                    @click="addressUpdate" 
                    :class="{'btn btn-primary spinner spinner-inverse spinner-sm' : spinner}"
                    type="button">Guardar</button>
                <button class="btn btn-default" @click="modalClose" type="button">Cerrar</button>
            </div>
            </div>
        </div>
    </div>
</template>
<script>
import {mapGetters} from 'vuex';
import auth from './../../../mixins/auth';
import Multiselect from 'vue-multiselect';
export default {
    components: {
        Multiselect
    },
    mixins : [auth],
    data() {
        return {
            spinner : false,
            disabled_city : true,
            loading_cities : false,
            disabled_address : true,
            address : {
                state : {},
                city : {},
                address : null
            }
        }
    },

    methods : {

        async addressUpdate(){
            console.log('pppppppppppppppppppppppppppppp');
            this.spinner = true;
            const payload = {
                token : this.User.token,
                customer_data : {
                    customer : this.ExistCustomer,
                    address : this.address
                }
            }

            let customer_update = await this.$store.dispatch('addressUpdate', payload);

            this.$store.commit('SET_EXIST_CUSTOMER', customer_update)
            
            this.spinner = false;
            
            this.modalClose();
        },

        modalClose(){
            $(this.$refs.addressmodal).modal('hide');
        },

        initialStatus(){
            this.address.state = {};
            this.address.city = {};
            this.address.address = null;
        },

        async getStates(){
            await this.$store.dispatch('getProvinces')
                    .then((result) => this.$store.commit('SET_PROVINCES', result.data));
        },

        async getCities(city){
            await this.$store.dispatch('getCities', city)
                    .then((result) =>  this.$store.commit('SET_CITIES', result.data));
                    
        },

        async selectedState(el){
            this.loading_cities = true;
            await this.getCities(el);
            this.loading_cities = false;
            this.disabled_city = false;
            this.address.city = {};
        },

        selectedCity(){
            this.disabled_address = false;
        }
    },

    computed : {
        ...mapGetters([
            'Provinces',
            'Cities',
            'ExistCustomer'
        ])
    },

    mounted() {
        this.getStates();
        $(this.$refs.addressmodal).on("hidden.bs.modal", () => this.initialStatus());
    },
}
</script>