<template>
    <div class="col-md-2">
        <div class="btn-primary" @click="create()">
            Crear usuario MELi
        </div>
    </div>
</template>

<script>
export default {
    methods : {
        create(){
            axios.post('/meli/create_test_user')
            .then((result) => {
                console.log(result.data);
            }).catch((err) => {
                console.log(err);
            });
        }
    }
}
</script>

<style>

</style>
