<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserFormRequest extends FormRequest
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
            'email' => 'required|email:filter',
            'password' => [
                'required',
                'min:6',
                'confirmed'
            ],
            'firstname' => 'required',
            'lastname' => 'required',
            'checked' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.email' => 'Email phải là một địa chỉ email hợp lệ.',
            'email.required' => 'Bạn phải nhập email',
            'password.required' => 'Bạn phải nhập mật khẩu',
            'password.min' => 'Mật khẩu tối thiểu 6 kí tự',
            'password.confirmed' => 'Mật khẩu khác nhau',
            'firstname.required' => 'Bạn phải nhập họ',
            'lastname.required' => 'Bạn phải nhập tên',
            'checked.required'=>'Bạn phải đồng ý điều kiện với được đăng kí'
        ];
    }
}
