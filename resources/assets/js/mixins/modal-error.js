import {Event} from 'vue-tables-2';
export default {

    methods : {

        handlerError(err)
        {
            let e = JSON.parse(err.response.data);
            this.$store.commit('SET_ERRORS_MSGS', e);
            this.openModalError();
        },

        openModalError(){
            Event.$emit('show-modal-error');
        },
    }
}