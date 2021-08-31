<?php

namespace App\Rules;

use App\Src\Models\PurchaseInvoice;
use Illuminate\Contracts\Validation\Rule;

class UniquePurchaseInvoice implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $invoice = request()->all()['invoice'];

        $provider_id = $invoice['provider']['id'];
        
        $type = $invoice['type']['id'];

        $subsidiary = $invoice['subsidiary'];
        
        $number = $invoice['number'];

        return ! PurchaseInvoice::where('provider_id', $provider_id)
                ->where('voucher_id', $type)
                ->where('ptovta', $subsidiary)
                ->where('number', $number)
                ->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Este comprobante ya ha sido ingresado.';
    }
}
