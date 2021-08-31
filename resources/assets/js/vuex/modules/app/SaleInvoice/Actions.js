const actions = {

    async invoice_store(context, token){
        try {
            
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;
            
            let response = await axios.post('/api/sale_invoice/store', 
            {
                invoice : context.state.invoice,
                invoices : context.state.invoices,
            })

            return response.data;

        } catch (error) {
            console.log('Hubo un error en invoice_store');
            throw error;
        }
    }
}

export default actions;