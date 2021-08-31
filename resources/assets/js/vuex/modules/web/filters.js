import collect from 'collect.js'
export default {
    state: {
        filters: {
            category: [],
            brand: [],
            others: [],
            see_all: [],
        },
        filtered_data: [],
        pagination: {
            current_page: 0,
            from: 0,
            last_page: 0,
            per_page: 0,
            to: 0,
            total: 0,
        },
        colors: [],
        sizes: [],

        filter_types: []

    },

    actions: {

        filtered_data(context) {
            return new Promise((resolve, reject) => {
                axios.post('/publications?page=' + (context.state.pagination.current_page + 1), {
                        "filters": context.state.filters
                    })
                    .then((response) => {
                        resolve(response);
                    }, error => {
                        reject(error);
                    });

            });
        },

    },

    mutations: {
        CLEAR_FILTER_SEE_ALL(state){
            state.filters.see_all = [];
        },

        SET_FILTER_SEE_ALL(state, filter) {
            state.filters.see_all = [];
            state.filters.see_all.push(filter)
        },

        SET_FILTER_TYPES(state, filters) {
            state.filter_types = [];
            state.filter_types.push(filters);
        },

        ADD_FILTER(state, filter) {
            state.filters.others.push(filter);
        },

        DELETE_COLOR_FILTER(state, color) {

            let colors = collect(state.filters.color);

            colors.each((col, index) => {

                if (col.id == color.id) {

                    Vue.delete(state.filters.color, index);

                }
            });

        },

        DELETE_SIZE_FILTER(state, size) {

            let sizes = collect(state.filters.size);

            sizes.each((siz, index) => {

                if (siz.id == size.id) {

                    Vue.delete(state.filters.size, index);

                }
            });

        },

        ADD_CATEGORY_FILTER(state, category) {
            state.filters.category.push(category);
        },

        DELETE_CATEGORY_FILTER(state, category) {

            let categories = collect(state.filters.category);

            categories.each((cat, index) => {

                if (cat.id == category.id) {

                    Vue.delete(state.filters.category, index);

                }
            });

        },

        DELETE_FILTER(state, filter) {

            let others = collect(state.filters.others);

            others.each((other, index) => {

                if (other.value_id == filter.value_id) {

                    Vue.delete(state.filters.others, index);

                }
            });

        },

        ADD_BRAND_FILTER(state, value) {
            state.filters.brand.push(value);
        },

        DELETE_BRAND_FILTER(state, brand) {

            let brands = collect(state.filters.brand);

            brands.each((bra, index) => {

                if (bra.id == brand.id) {

                    Vue.delete(state.filters.brand, index);

                }
            });

        },

        SET_COLORS(state, value) {
            state.colors = value;
        },

        SET_SIZES(state, value) {
            state.sizes = value;
        },


        SHOW_COLOR(state, color_id) {

            let colors = collect(state.filters.color);

            colors.each((col, index) => {

                if (col.value_id == color_id) {

                    col.show = true;

                }

            });
        },

        SHOW_SIZE(state, size_id) {

            let sizes = collect(state.filters.size);

            sizes.each((siz, index) => {

                if (siz.value_id == size_id) {

                    siz.show = true;

                }
            });
        },

        SET_PAGINATION(state, pagination) {
            state.pagination.current_page = pagination.current_page,
                state.pagination.from = pagination.from,
                state.pagination.last_page = pagination.last_page,
                state.pagination.per_page = pagination.per_page,
                state.pagination.to = pagination.to,
                state.pagination.total = pagination.total
        },

        SET_CURRENT_PAGE(state, value) {
            state.pagination.current_page = value;
        },

        CLEAR_CATEGORY_FILTERS(state) {

            state.filters.category = [];

            state.filters.brand = [];

            this.commit('SHOW_ALL_CATEGORY_FILTER');

            this.commit('SHOW_ALL_BRAND_FILTER');
        },

        OTHERS_FILTERS_SHOW(state) {

            let colors = collect(state.colors);

            colors.each(col => {

                col.show = true;

            });
        },

        OTHERS_FILTERS_CLEAR(state) {

            state.filters.others = [];

            this.commit('OTHERS_FILTERS_SHOW');
        },


        CLEAR_BRAND_FILTERS(state) {

            state.filters.brand = [];

            this.commit('SHOW_ALL_BRAND_FILTER');
        },

        FORCE_INIT_PAGINATION(state) {

            state.pagination.current_page = 0;
            state.pagination.from = 0;
            state.pagination.last_page = 0;
            state.pagination.per_page = 0;
            state.pagination.to = 0;
            state.pagination.total = 0;
        },

        CLEAR_FILTERS(state) {

            this.commit('FORCE_INIT_PAGINATION');

            this.commit('CLEAR_CATEGORY_FILTERS');

            this.commit('CLEAR_BRAND_FILTERS');

            this.commit('OTHERS_FILTERS_CLEAR');

            this.commit('CLEAR_PUBLICATIONS');

            this.dispatch('filtered_data').then((result) => {

                this.commit('SET_PUBLICATIONS_WEB_WITH_PAGINATION', result.data.data);

                this.commit('SET_PAGINATION', result.data.pagination);

            }).catch((err) => {

            });
        }

    },

    getters: {
        FilterTypes(state) {

            let filter_types = collect(state.filter_types);

            if (filter_types.count() > 0) {

                return state.filter_types[0];

            }

            return [];
        },

        HasCategoryFilters(state) {

            let categories = collect(state.filters.category);

            if (categories.count() > 0) {
                return true;
            }

            return false;
        },

        HasBrandFilters(state) {

            let brands = collect(state.filters.brand);

            if (brands.count() > 0) {
                return true;
            }

            return false;
        },

        HasOthersFilters(state) {

            let o = collect(state.filters.others);

            if (o.count() > 0) {
                return true;
            }

            return false;
        },


        Colors(state) {

            let colors = collect(state.colors);

            if (colors.count() > 0) {
                return state.colors;
            }

            return [];
        },

        Sizes(state) {

            let sizes = collect(state.sizes);

            if (sizes.count() > 0) {
                return state.sizes;
            }

            return [];
        },

        BrandFilters(state) {
            return state.filters.brand;
        },

        CategoryFilters(state) {
            return state.filters.category;
        },

        OthersFilters(state) {
            return state.filters.others;
        },

        PaginationCurrentPage(state) {
            return state.pagination.current_page;
        },

        PaginationTotal(state) {
            return state.pagination.total;
        },

        Pagination(state) {
            return state.pagination;
        },

        VerifyIfLoadMorePublication(state) {

            if (state.pagination.current_page == state.pagination.last_page) {
                return true;
            }

            return false;
        }

    },



}