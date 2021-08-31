<template>
    <vue-autonumeric 
        class="form-control col-md-2"
        :options=options
    ></vue-autonumeric>
</template>

<script>
    import VueAutonumeric from '../../../../../../node_modules/vue-autonumeric/src/components/VueAutonumeric';
    export default {
        props: ['data', 'index'],
         components : {
            VueAutonumeric
        },
        data() {
            return {
                options : {
                    digitGroupSeparator: '.',
                    decimalCharacter: ',',
                    decimalCharacterAlternative: '.',
                    currencySymbol: '$ ',
                    currencySymbolPlacement: 'p',
                    roundingMethod: 'U',
                    minimumValue: '0',
                    modifyValueOnWheel  : false,
                    showOnlyNumbersOnFocus : true,
                },
            }
        },
        
        methods : {
            rowNumber(){
                return this.index;
            },
            Price(){
                return this.data.price
            }
        },
        computed : {
            
        },
       
    }
</script>
