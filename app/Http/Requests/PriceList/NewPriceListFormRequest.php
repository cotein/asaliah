<?php

namespace App\Http\Requests\PriceList;

use Illuminate\Foundation\Http\FormRequest;

class NewPriceListFormRequest extends FormRequest
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
            'price_list.name' => 'required|min:3|max:200|unique:price_list,name',
            'price_list.benefit' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'price_list.name.required' => 'El campo nombre es requerido.',        
            'price_list.name.unique' => 'Esta Lista de precios ya existe.',        
            'price_list.name.min' => 'El nombre de la lista de precios debe contener como mínimo 3 letras.',        
            'price_list.benefit.numeric' => 'El porcentaje de beneficio debe ser numérico.',        
        ];
    }
}
