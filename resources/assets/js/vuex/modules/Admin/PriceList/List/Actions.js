export const priceListGetListAction = async (context, token) => {

    try {
        window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + token;

        let list = await axios.post('/api/price_list/index')
            .catch(err => {
                console.log(err);
            });
        
        return list;

    } catch (e) {
        console.log(e, 'pppppppppppppp');
        throw e;
    }
}