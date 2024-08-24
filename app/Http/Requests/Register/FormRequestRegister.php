<?php

namespace App\Http\Requests\Register;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestRegister extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
            'info_email' => 'required|email',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng đặt tên tài khoản',
            'email.required' => 'Vui lòng đặt tên đăng nhập tài khoản, có thể dùng gmail',
            'email.email' => 'Vui lòng đặt tên đăng nhập dúng định dạng như abc@admin.com hoăc có thể dùng gmail',
            'password.required' => 'Vui lòng đặt mật khẩu',
            'password.min' => 'Vui lòng đặt mật khẩu từ 6 ký tự',
            'password.confirmed' => 'Vui lòng đặt mật khẩu xác nhận không chính xác',
            'info_email.required' => 'Vui lòng nhập gmail của bạn',
            'info_email.email' => 'Gmail của bạn không dúng định dạng',
        ];
    }
}