const state = {

    invoice : {
        date_is_ok : false,
        provider : null,
        type : false,
        subsidiary : null,
        number : null,
        date : null,
        imputation_date :new Date(),
        money : {
            code: "PES",
            description: "name",
            id: 1,
            name: "PESOS",
            symbol: "$",
        },
        articles : [
            {
                article_is_selected : false,
                id : null,
                name : null,
                accounting_account_id : null,
                unit_price : 0,
                measure_unity : null,
                neto_import : 0,
                quantity : 1,
                iva : {
                    code : 5,
                    id : 6,
                    name : "21%",
                    percentage : 21
                },
                iva_id : 6,
                iva_import : 0,
                discount_import : 0,
                total_import : 0,
            }
        ],
        percep_iibb : 0,
        percep_iva : 0,
        taxes : [],
        total : 0,
    }
}

export default state;