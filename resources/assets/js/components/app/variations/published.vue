<template>
    <div>
        <p>
            {{Published}}
        </p>
    </div>
</template>

<script>
export default {
    props : ['data'],
    data() {
        return {
            published : 0
        }
    },

    computed: {
        Published(){
            return this.published;
        }

    },

    mounted() {
        this.published = this.data.available_quantity
    },
}
</script>

<style>

</style>
