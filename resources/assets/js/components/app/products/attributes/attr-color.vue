<template>
    <div class="form-group">
        <label class="col-sm-3 control-label" >{{name}}</label>
        <div class="col-md-9">
            <multiselect 
                v-model="color" 
                :option-height="100"
                placeholder="Color" 
                label="name" track-by="name" 
                :options="OptionsColor" 
                :show-labels="false">
                <span slot="noOptions">
                    Lista Vacía
                </span>
            <!--  <template slot="option" slot-scope="props">
                    <span :style="{ 'background-color': '#'+props.option.rgb }" class="bg-primary circle sq-40">
                    </span>
                        <p style="margin-right:31px; color:ccc">{{ props.option.name }} </p>
                </template> -->
            </multiselect>
        </div>
    </div>
</template>

<script>
import Multiselect from 'vue-multiselect';
import {mapGetters} from 'vuex';

export default {
    props : {
        name : {
            type : String,
            default : ''
        },
        variation : {
            type : Boolean,
            default : true
        }, 
        row : {
            type : Number
        }
    },
    components: {
        Multiselect
    },
    data() {
        return {
            value : null
        }
    },
    methods : {
        
    },
    computed : {
        ...mapGetters(['OptionsColor']),

        color : {
            get(){
                /* if (!this.variation) {
                    return this.$store.state.products.product.color;    
                } */
                return this.$store.state.products.product.variations[this.row].color;
            }, 
            set(value){
               /*  if (!this.variation) {
                    this.$store.commit('VMODEL_COLOR', value);
                }else{ */
                    this.$store.commit('VMODEL_COLOR_VARIATION', this.row, value);
                //}
                
            }
        }
    },
    mounted(){
        setTimeout(() => {
            console.log(this.row);
        }, 500);
    }
}
</script>

<style>
</style>
