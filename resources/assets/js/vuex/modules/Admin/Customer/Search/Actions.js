export const search_customer = async (context, payload) => {
    
    try {
        window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;

        let customers = await axios.post('/api/customer/search_customer', 
                {
                    customer : payload.query
                })
                
        return customers;

    } catch (e) {
        console.log(e, 'customers');
        throw e;
    }
}