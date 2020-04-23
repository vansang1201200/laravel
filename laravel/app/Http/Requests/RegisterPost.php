<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterPost extends FormRequest
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
            'customer_name'=>'required|unique:customers',
            'customer_email'=>'required|email:rfc,dns',
            'customer_password'=>'required|unique:customers',
            'customer_phone'=>'required|unique:customers',
            'email_account'=>'required|unique:customers',
            'password_account'=>'required|unique:customers'
        ];
    }
    public function messages()
    {
       return [
           'customer_name.required'=>'Phải nhập tên',
           'customer_email.required'=>'Phải nhập mail',
           'customer_password.required'=>'Phải nhập mật khẩu',
           'customer_phone.required'=>'Phải nhập số điện thoại',
           'email_account.required'=>'Phải nhập tài khoản',
           'password_account.required'=>'Phải nhập mật khẩu',

       ];
    }
}
