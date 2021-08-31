
class Payment {
    
    status(value)
    {
        switch (value) {
            case 'confirmed': //Initial state of an order, and it has no payment y
                return 'Confirmado';
                break;
        
            case 'payment_required': //The order needs a payment to become confirmed and show users information.

                return 'Pago requerido';
            
            case 'payment_in_process': //There is a payment related with the order, but it has not accredited yet.
                return 'Pago en proceso';
            
            case 'paid': //The order has a related payment and it has been accredited.
                return 'Pagado'; 
            
            case 'cancelled': //The order has not completed by some reason.
                return 'Cancelado';
            
            case 'invalid':
                return 'Inválido';
        }
    }

    status_color(value)
    {
        switch (value) {
            case 'confirmed': //Initial state of an order, and it has no payment y
                return 'my-success';
                break;
        
            case 'payment_required': //The order needs a payment to become confirmed and show users information.

                return 'my-warning';
            
            case 'payment_in_process': //There is a payment related with the order, but it has not accredited yet.
                return 'my-info';
            
            case 'paid': //The order has a related payment and it has been accredited.
                return 'my-success'; 
            
            case 'cancelled': //The order has not completed by some reason.
                return 'my-danger';
            
            case 'invalid':
                return 'my-danger';
        }
    }

    status_detail(status)
    {
        //Status detail, in case the order was cancelled.
        //code:Status code.
        //description:Status description.
    }

    payment_type(value)
    {
        switch (value) {
            case 'credit_card':
                return 'T. Crédito';
            case 'debit_card':
                return 'T. Débito';
            case 'ticket':
                return 'Ticket';
            case 'bank_transfer':
                return 'Transferencia';
            
        }
    }

}

export default Payment;