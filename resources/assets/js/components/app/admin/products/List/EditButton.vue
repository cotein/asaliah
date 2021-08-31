<script>
    import EditButton from './../../../../Base/Button/EditButton.vue';
    export default {

        extends : EditButton,

        props: ['data', 'index'],

        methods : {
            
            goTo()
            {
                console.log('ppppppppp');
                let product_id = this.data.id;
                console.log(this.data);
                window.location.href = "/empresa/productos/edicion/" + product_id;
            }
            
        },
       
    }
</script>