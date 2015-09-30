<?php

namespace CodeDelivery\Http\Requests;

use CodeDelivery\Http\Requests\Request;

class AdminClientRequest extends Request
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
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório!',
            'email.required' => 'O campo email é obrigatório!',
            'phone.required' => 'O campo telefone é obrigatório!',
            'address.required' => 'O campo endereço é obrigatório!',
            'city.required' => 'O campo cidade é obrigatório!',
            'state.required' => 'O campo estado é obrigatório!',
            'zipcode.required' => 'O campo CEP é obrigatório!'
        ];
    }
}
