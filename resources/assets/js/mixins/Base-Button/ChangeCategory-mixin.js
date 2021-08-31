import {Event} from 'vue-tables-2';
export default {

    data() {
        return {
            loading : false,
            status : null
        }
    },

    methods : {

        async toggleStatus()
        {
            this.sleep(250);

            let payload = {
                token : this.User.token,
                category_id : this.data.id,
                status : !this.data.status
            }

            let category = await this.$store.dispatch('setCategoryStatus', payload)
                .catch(err => {
                    console.log(err);
                });
            
            if(category){
                this.success_message('Categoría', 'Ha cambiado el estado');
                Event.$emit('StatusCategoryWasChange', category);
            }

        }
    },

    computed : {

        Status()
        {
            if (this.data.status == 'ACTIVO' || this.data.status == true ) {
                return true;
            }

            if (this.data.status == 'INACTIVO' || this.data.status == false) {
                return false;
            }

        },

        StatusText()
        {
            if (this.data.status == 'ACTIVO' || this.data.status == true ) {
                return 'ACTIVO';
            }

            if (this.data.status == 'INACTIVO' || this.data.status == false) {
                return 'INACTIVO';
            }

        }
    },

    mounted(){
        this.status = this.data.status
    }
}