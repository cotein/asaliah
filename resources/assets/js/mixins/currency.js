export default {
    methods: {
        CurrencyToNumber : function(value){
            let importe =  value.replace(/[\.$]+/g, "");
            importe = importe.replace(/,/g, '.');
            importe =  Number.parseFloat(importe);
            return importe;
        },

        CurrencyFormat : function(importe) {
            return new Intl.NumberFormat('es-AR',
                {
                    style:"currency",
                    currency:"ARS", 
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                }).format(importe);
        },
        
        onlyForCurrency ($event) {
            // console.log($event.keyCode); //keyCodes value
            let keyCode = ($event.keyCode ? $event.keyCode : $event.which);
            console.log('$event.which');
            console.log($event.which);
            // only allow number and one dot
            if ((keyCode < 48 || keyCode > 57) && (keyCode !== 46 || this.price.indexOf('.') != -1)) { // 46 is dot
             $event.preventDefault();
            }
       
            // restrict to 2 decimal places
            if(this.price!=null && this.price.indexOf('.')>-1 && (this.price.split('.')[1].length > 1)){
            $event.preventDefault();
            }
        }
        
    },
}