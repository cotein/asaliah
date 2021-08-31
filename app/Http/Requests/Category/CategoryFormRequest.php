<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
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
            'name' => 'required|unique:categories,name',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es requerido.',        
            'name.unique' => 'Esta categoría ya existe.',        
        ];
    }
}
