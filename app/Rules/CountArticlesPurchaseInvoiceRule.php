<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CountArticlesPurchaseInvoiceRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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

        $articles = collect($invoice['articles']);
        //dd($articles->first());
        return (is_null($articles->first()['id'])) ? false : true; 
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El comprobante de contener cómo mínimo un artículo.';
    }
}
