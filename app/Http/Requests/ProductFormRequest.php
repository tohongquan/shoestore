<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'thumb' => 'required',
            'menu_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn phải nhập tên sản phẩm',
            'thumb.required' => 'Bạn phải chọn ảnh đại diện cho sản phẩm',
            'menu_id.required' => 'Bạn phải chọn danh mục cho sản phẩm',
        ];
    }
}
