export default {

    methods : {

        async update_product()
        {
            let payload = {
                token : this.User.token,
                product : this.ProductGetter,
                categories_path : this.ChildCategories,
                selected_categories_from_root : this.SelectedCategoriesFromRootGetter
            }

            let product = await this.$store.dispatch('update_product', payload)
                .catch(err => {
                    console.log(err);
                })
            console.log('EditProduct -> mixin');
            console.log(product);
            if (product) {
                console.log('update product');
                console.log(product);
                return product;
            }
        }
    }
}