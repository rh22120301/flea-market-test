<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
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
            'pay_id'   => ['required', 'integer', 'exists:pays,id'],
            'postcode' => ['required', 'string'],
            'address'  => ['required', 'string'],
        ];
    }

public function messages()
    {
        return [
            'pay_id.required' => '支払い方法を選択してください',
            'postcode.required' => '郵便番号がありません',
            'address.required' => '住所がありません',
        ];
    }
}
