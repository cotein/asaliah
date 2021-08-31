<template>
    <modal v-model="showModal">

        <p slot="header">Confirmation needed</p>

        <p slot="content">Do you want to continue?</p>

        <template slot="actions">
            <div class="ui black deny button" @click="showModal=false">
            No
            </div>
            <div class="ui positive right button" @click="confirm">
            Yes
            </div>
        </template>

    </modal>
</template>

<script>
import {Event} from 'vue-tables-2';
import modal from 'vue-semantic-modal'

export default {
    components: {
        modal
    },
    data() {
        return {
            showModal: false,
            confirmed: false
        }
    },
    methods : {
        confirm () {
            this.confirmed = true
            this.showModal = false
        }
    },

    mounted(){

        Event.$on('open_customer_edit_modal', () => {
            this.showModal = true;
            console.log('open-customer-edit-modal');
            console.log(this.showModal);
        });

    }
}
</script>

<style  scoped>

</style>