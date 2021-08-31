<template>
    <div class="text-center">
        <GChart
            type="PieChart"
            :data="chartData"
            :options="chartOptions"
        />
    </div>
</template>

<script>
    import { GChart } from 'vue-google-charts'
    export default {
        props : ['data'],
        components: {
            GChart
        },
        data(){
            return{
                chartData: [
                    ['Health'],
                    [31]
                ],
                chartOptions: {
                    chart: {
                        title: 'Salud de la publicación',
                    }
                }
            }
        }
    }
</script>

<style scoped>

</style>