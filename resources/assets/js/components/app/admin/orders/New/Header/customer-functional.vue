<template functional>
    <div class="container">
        <div class="item-1">
            Nombre
        </div>
        <div class="item-2">
            DNI
        </div>
    </div>
</template>

<style scoped>
    .container {
        display : flex;
        justify-content : space-between;
    }
    div[class^="item-"]{
        width : 10rem;
        height : 3rem;
    }
</style>