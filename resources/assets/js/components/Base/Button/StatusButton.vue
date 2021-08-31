<template>
    <div>
        <button  class="label" :class="(Status ?'activo':'inactivo')" >{{StatusText}}</button>
    </div>
</template>

<script>
export default {
    props: ['data', 'index'],

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
    
}
</script>

<style scoped>
    .inactivo{
        background-color: #E91808;
    }
    .activo{
        background-color: #4C8A48;
    }
    
</style>