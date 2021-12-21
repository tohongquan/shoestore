<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
            'email' => 'bail|required|email:filter',
            'password' => 'bail|required'
        ];
    }

    public function messages()
    {
        return [
            'email.email' => 'Email phải là một địa chỉ email hợp lệ.',
            'email.required' => 'Bạn phải nhập email',
            'password.required' => 'Bạn phải nhập mật khẩu'
        ];
    }
}
