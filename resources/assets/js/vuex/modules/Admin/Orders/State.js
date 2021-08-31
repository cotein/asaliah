const state = {

    order : {
        customer : {},
        date : null,
        delivery_date : null,
        address : {
            state_id : null,
            city : null,
            cp : null,
            street : null,
            number : null,
            others : {}
        },
        user_id : null,
        products : [
            {
                product : null,
                unit_price : 0,
                quantity : 1,
                iva : {
                    id: 6,
                    code: "5",
                    name: "21%",
                    percentage: "21",
                },
                iva_import : 0,
                neto : 0,
                discount : 0,
                total : 0,
                price_lists : [],
                price_list : null,
            }
        ],
        iva_import : 0,
        neto : 0,
        discount : 0,
        total : 0,
    }
}

export default state;