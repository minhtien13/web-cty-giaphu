<?php

namespace App\Http\Requests\contact;

use Illuminate\Foundation\Http\FormRequest;

class contactFormRequest extends FormRequest
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
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'phone.required' =>  'Vui lòng nhập số điện thoại',
            'email.required' =>  'Vui lòng nhập gmail',
            'email.email' =>  'Gmail không đúng định dạng',
            'address.required' =>  'Vui lòng nhập địa chỉ'
        ];
    }
}