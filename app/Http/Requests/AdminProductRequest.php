<?php

namespace CodeDelivery\Http\Requests;

use CodeDelivery\Http\Requests\Request;

class AdminProductRequest extends Request
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
            'category_id' => 'required',
            'name' => 'required|min:3',
            'description' => 'required',
            'price' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'O campo categoria é obrigatório!',
            'name.required' => 'O campo nome é obrigatório!',
            'name.min' => 'O nome deve ter mais que 1 caractere.',
            'description.required' => 'O campo descrição é obrigatório!',
            'price.required' => 'O campo preço é obrigatório!'
        ];
    }
}
