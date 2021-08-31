const actions = {

    async store_product(context, payload)
    {
        try {
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + payload.token;

            let product = await axios.post('/api/products/store', {
                product : payload.product,
                categories_path : payload.categories_path,
                selected_categories_from_root : payload.selected_categories_from_root
            })

            return product;

        } catch (e) {
            throw e;
        }
    },

    updateSupplierData(context, value)
    {
        context.commit('NEW_PRODUCT_SET_SUPPLIER_DATA', value);
    }
}

export default actions;