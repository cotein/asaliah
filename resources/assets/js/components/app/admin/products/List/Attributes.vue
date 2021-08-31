<template>
    <div>
        <ul>
            <li v-for="(attr, index) in data.attributes" :key="index">
                {{attr.name + ' - ' + attr.value}}
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props : ['data'],


    }
</script>

<style lang="scss" scoped>

</style>