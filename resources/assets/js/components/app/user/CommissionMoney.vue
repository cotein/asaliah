<template>
    <div>
        {{data.commission | currency}}
    </div>
</template>

<script>
    export default {
        props: ['data'],
    }
    
</script>