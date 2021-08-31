
export default {
    
    data() {
        return {
            customer : null,
            customers : [],
            show_spinner_multiselect : false
        }
    },

    methods: {
        
        selectedCustomer(el)
        {
            this.$store.commit('SET_CUSTOMER_ON_PEDIDO', el);
            this.$store.commit('SET_CUSTOMER_ADDRESSES', []);
            if (el.addresses) {
                this.$store.commit('SET_CUSTOMER_ADDRESSES', el.addresses);
            }
        },

        removeCustomer(el)
        {
            this.customer = null;

            if (typeof this.loadData == 'function') {
                this.loadData();
            }
        },

        async asyncFind (query) {
            
            this.show_spinner_multiselect = true;
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.User.token;
            
            let customer = await axios.post('/api/customer/find_customer_by_name', 
                {
                    customer : query
                })
            this.show_spinner_multiselect = false;
            this.customers = customer.data;
        },

    },

    mounted() {

        if (typeof this.loadData == 'function') {
            this.loadData();
        }
    },
}