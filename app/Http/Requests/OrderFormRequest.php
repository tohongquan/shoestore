<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderFormRequest extends FormRequest
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
            'name'=>'required',
            'phone'=>'required|numeric|regex:/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/',
            'address'=>'required',
            'email'=>'required|email:filter',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn phải nhập tên',
            'phone.required' => 'Bạn phải số điện thoại',
            'phone.regex' => 'Số điện thoại chưa đúng định dạng',
            'address.required' => 'Bạn phải nhập địa chỉ',
            'email.email' => 'Email phải là một địa chỉ email hợp lệ.',
            'email.required' => 'Bạn phải nhập email',
        ];
    }
}
