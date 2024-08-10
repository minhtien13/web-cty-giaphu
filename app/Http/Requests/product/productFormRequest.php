<?php

namespace App\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;

class productFormRequest extends FormRequest
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
            'title' => 'required',
            'thumb' => 'required',
            'is_link' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Vui lòng nhập tiểu đề',
            'thumb.required' => 'Vui lòng thêm hình sản phẩm',
            'is_link.required' => 'Đường dẫn bắt buột có',
        ];
    }
}