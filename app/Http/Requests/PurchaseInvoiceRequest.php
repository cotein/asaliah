<?php

namespace App\Http\Requests;

use App\Rules\UniquePurchaseInvoice;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CountArticlesPurchaseInvoiceRule;

class PurchaseInvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'invoice.provider.id' => 'required',
            'invoice.type.id' => 'required',
            'invoice.subsidiary' => 'required',
            'invoice.number' => ['required', new UniquePurchaseInvoice],
            'invoice.money.id' => 'required',
            'invoice.date' => 'required',
            'invoice.imputation_date' => 'required',
            'invoice.articles' => ['required', new CountArticlesPurchaseInvoiceRule]
        ];
    }

    function messages()
    {
        return [
            'invoice.provider.id.required' => 'El campo Proveedor es requerido.',        
            'invoice.type.id.required' => 'El campo Comprobante es requerido.',        
            'invoice.subsidiary' => 'El campo Número es requerido',        
            'invoice.number.required' => 'El campo Número es requerido.',  
            'invoice.money.id.required' => 'El campo Pesos es requerido.',       
            'invoice.date.required' => 'El campo Fecha es requerido.',       
            'invoice.imputation_date.required' => 'El campo Fecha Imputación es requerido.',       
            'invoice.articles.required' => 'El campo artículo es requerido.'
        ];
    }
}
