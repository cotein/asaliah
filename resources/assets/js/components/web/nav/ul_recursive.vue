<template>
    <ul class="tt-list-row">
        <li>
            {{arg.name}}
        </li>
    </ul>
</template>

<script>
    export default {
        name : 'ul_recursive',
        props : ['arg'],
    }
</script>

<style lang="scss" scoped>

</style>