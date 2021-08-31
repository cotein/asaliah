<template>
    <div>
        {{data.pedido_base_imponible | currency}}
    </div>
</template>

<script>
    export default {
        props: ['data'],
    }
    
</script>