<?php

namespace App\Http\Requests\form;

use Illuminate\Foundation\Http\FormRequest;

class formRequestRegister extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'info_email' => 'required|email',
            'password' => 'required|min:6',
            // 'password_confirmation' => 'required_with:password|same:password',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên tài khoản',
            'email.required' => 'Vui lòng nhập tên người dùng',
            'info_email.required' => 'Vui lòng nhập gmail',
            'info_email.email' => 'Gmail không đúng định dạng',
            'password.min' => 'Vui lòng đặt mật khẩu từ 6 ký tự trở lên',
            'password.required' => 'Vui lòng nhập mật khẩu',
            // 'password_confirmation.required_with' => 'Vui lòng nhập mật khẩu xác nhận',
            // 'password_confirmation.same' => 'Mật khẩu xác nhận không chính xác'
        ];
    }
}