export const PriceListEditBenefit = async (context, payload) => {
    try {
        window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;

        let price_list = await axios.post('/api/price_list/update_benefit', {
            price_list_id : payload.price_list_id,
            benefit : payload.benefit,
        })
        
        return price_list;

    } catch (e) {
        console.log(e, 'update benefit');
        throw e;
    }
}