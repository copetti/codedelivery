<?php

namespace CodeDelivery\Http\Requests;

use CodeDelivery\Http\Requests\Request;

class AdminUserRequest extends Request
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
            'email' => 'required|email|unique:users'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório!',
            'email.required' => 'O campo email é obrigatório!',
            'email.unique' => 'Já existe uma conta com o email digitado!'
        ];
    }
}
