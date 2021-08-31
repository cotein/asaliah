<template>
    <div class="center">
        <div style="padding-top:31px; width:20px">
            <p >{{(row+1)}}</p>
        </div>
        <div class="cart-list-image">
            <a href="product.html">
                <img class="cart-list-thumbnail" src="https://images.unsplash.com/photo-1550437943-d781ab642ba9?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjcwNjE0fQ&w=90&h=106" alt="Raja Elephant T-shirt">
            </a>
        </div>
        <div class="cart-list-details" style=" width:350px">
            <h4 class="cart-list-name">
                <p style="color:red">PRODUCTO: {{(row+1)}}</p>
            </h4>
            <div class="cart-list-description">
                 <div class="form-group">
                    <label >Color</label>
                    <multiselect 
                        v-model="variation.attribute_combinations.color" 
                        placeholder="Color" 
                        label="name" track-by="name" 
                        :options="OptionsColor" 
                        :show-labels="false">
                        <span slot="noOptions">
                            Lista Vacía
                        </span>
                    </multiselect>
                </div>
                
            </div>
           <!--  <div class="cart-list-actions">
                <ul class="list-inline">
                    <li>
                        <a href="#">Delete</a>
                    </li>
                    <li>
                        <span aria-hidden="true">|</span>
                    </li>
                    <li>
                        <label class="custom-control custom-control-primary custom-checkbox">
                            <input class="custom-control-input" type="checkbox">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-label">This is a gift</span>
                        </label>
                    </li>
                </ul>
            </div> -->
        </div>
        <div class="cart-list-description" style=" width:350px">
            <div class="form-group" style="margin-top:40px">
                    <label  >Talle</label>
                    <multiselect 
                        v-model="variation.attribute_combinations.size" 
                        :option-height="100"
                        placeholder="Talle" 
                        label="name" track-by="name" 
                        :options="OptionsSize" 
                        :show-labels="false">
                        <span slot="noOptions">
                        Lista Vacía
                        </span>
                    </multiselect>
                </div>
        </div>
        <div class="cart-list-quantity">
            
        </div>
        <div class="cart-list-subtotal">
            <p class="text-center">Cantidad</p>
            <div class="input-group">
                <span class="input-group-btn">
                    <button @click="baja()" type="button" class="quantity-left-minus btn" >
                        <span class="icon icon-minus-square"></span>
                    </button>
                </span>
                <div type="text" id="quantity" name="quantity" class="form-control text-center" >
                    {{Count}}
                </div>
                <span class="input-group-btn">
                    <button @click="sube()" type="button" class="quantity-right-plus btn">
                        <span class="icon icon-plus-square"></span>
                    </button>
                </span>
            </div>
        </div>
        <div>
           <button @click="deleteVariation(row)" class="btn btn-outline-danger btn-icon sq-32" type="button" style="margin-top:54px">
                  <span class="icon icon-trash-o"></span>
                </button>
        </div>
    </div>
</template>

<script>
import Multiselect from 'vue-multiselect';
import collect from 'collect.js';
import {mapState, mapActions, mapGetters} from 'vuex';
import busVue from './../../../../extras/eventBus';
export default {
    props : ['row'],
    components : {
        Multiselect
    },
    data() {
        return {
            variation : {
                price : null,
                available_quantity : 1,
                sold_quantity : 0,
                attribute_combinations : {
                    color : {},
                    size : {},
                },
                picture_ids : []
            }
            

        }
    },
    methods:{
        ...mapActions(['deleteVariation', 'incrementQty', 'decrementQty']),

        sube(){
            this.incrementQty(this.row);
            this.variation.available_quantity = this.Count
        },

        baja(){
            this.decrementQty(this.row);
            this.variation.available_quantity = this.Count
        }
    },
    computed : {
        ...mapGetters(['OptionsColor', 'OptionsSize']),

        Count(){
            return this.$store.state.products.product.variations[this.row].available_quantity;
        },
        
    },
    mounted() {
        let $vm = this;
        busVue.$on('give_me_variation', ()=>{
            setTimeout(() => {
                this.$store.commit('ADD_ROW', this.variation);
            }, ($vm.row + 1 * 100));
        });
    },
}
</script>

<style>

</style>
