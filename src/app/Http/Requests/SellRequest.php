<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellRequest extends FormRequest
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
            'image' => ['required', 'image', 'mimes:jpeg,png'],
            'categories' => ['required', 'array', 'min:1'],
            

            'condition_id' => ['required', 'integer','exists:conditions,id'],
            

            'name' => ['required', 'string'],
            'brand' => ['required', 'string', 'max:50'],

            'detail' => ['required', 'string', 'max:255'],

            'price' => ['required', 'integer', 'min:0'],
        ];
    }

    public function messages() 
    { 
        return [ 
            'image.required' => '画像を選択してください', 
            'image.mimes' => '画像はjpegまたはpng形式でアップロードしてください',
            'categories.required' => 'カテゴリーを選択してください', 
            'condition_id.required' => '商品の状態を選択してください', 
            'name.required' => '商品名を入力してください', 
            'brand.required' => 'ブランド名を入力してください',  
            'detail.required' => '商品の説明を入力してください', 
            'detail.max' => '255字以内で入力してください', 
            'price.required' => '価格を入力してください',
            'price.integer' => '数字で入力してください',
            ]; 
    }

}
