<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCartFormRequest extends FormRequest
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
            'quantity' => 'Bail:required|integer|gte:1',
            'size' => 'Bail:required|integer|between:36,46'
        ];
    }

    public function messages()
    {
        return [
            'quantity.required' => 'Số lượng không thể để trống',
            'quantity.integer' => 'Số lượng phải là số',
            'quantity.gte' => 'Số lượng phải lớn hơn 0',
            'size.required' => 'Bạn phải chọn size',
            'size.integer' => 'Size phải là số',
            'size.between' => 'Size phải trong khoảng 36-46'
        ];
    }

}
