<template>
    <PriceListWrapper>
        <template #header>
            <PriceListAddNew />
        </template>

        <template #body>
            <PriceListList />
        </template>

        <template #footer>

        </template>
    </PriceListWrapper>
</template>

<script>
    import PriceListWrapper from './../Base/PriceListWrapper.vue';
    import PriceListAddNew from './PriceListAddNew.vue';
    import PriceListList from './../List/PriceListTable.vue';
    export default {
        components : {
            PriceListWrapper,
            PriceListAddNew,
            PriceListList
        }
    }
</script>
