<?php

namespace CodeDelivery\Http\Requests;

use Illuminate\Http\Request as HttpRequest;

class CheckoutRequest extends Request
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
    public function rules(HttpRequest $request)
    {
        $rules = [
            'cupom_code' => 'exists:cupoms,code,used,0'
        ];
        $this->buildRulesItems(0,$rules);

        $items = $request->get('items',[]);
        $items = !is_array($items) ? [] : $items;

        foreach($items as $key => $val){
            $this->buildRulesItems($key,$rules);
        }

        return $rules;
    }

    public function buildRulesItems($key, array &$rules){
        $rules['items.'.$key.'.product_id'] = 'required';
        $rules['items.'.$key.'.qtd'] = 'required';
    }

/*    public function messages()
    {
        $msgs = [
            'cupom_code.exists' => 'O cupom informado é invalido!!!'
        ];
        $this->buildRulesMessagesItems(0,$msgs);

        $items = HttpRequest::get('items');

        $items = !is_array($items) ? [] : $items;

        foreach($items as $key => $val){
            $this->buildRulesMessagesItems($key,$msgs);
        }
        return $msgs;
    }

    public function buildRulesMessagesItems($key, array &$msgs){
        $msgs['items.'.$key.'.product_id.required'] = 'O campo produto '.$key.' é obrigatório!';
        $msgs['items.'.$key.'.qtd.required'] = 'O campo quantidade '.$key.' é obrigatório!';
    }*/
}
