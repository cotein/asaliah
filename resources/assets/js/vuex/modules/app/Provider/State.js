const state = {

    providers : [],
        selected_provider : false,
        provider : {
            name : null,
            status : false,
            tipo_persona : false,
            tipo_clave : false,
            inscription : {},
            purchase_document : {},
            number : null,
            regimen : null,
            accounting_account : {
                id : 52,
                account : 211001,
                name : 'PROVEEDORES'
            },
            sublevel_accounting_account : {},
            address : {
                type : null,
                state : null,
                city : null,
                address : null,
                number : null,
                cp : null,
                between : null,
                obs : null
            },
            contact : {
                name : null,
                email : null,
                cell_phone : null,
                phone_1 : null,
                phone_2 : null,
                phone_3 : null,
            },
            taxes : {
                iibb_exempt : false,
                iva_exempt : false,
                gcias_exempt : false,
                suss_exempt : false,
            },
            afip_data : {}
        }
}

export default state;