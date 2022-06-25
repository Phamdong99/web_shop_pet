<?php

namespace App\Http\Requests\Product;

use http\Env\Request;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Contracts\Service\Attribute\Required;

class CreateFormRequest extends FormRequest
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
            'file' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên sản phẩm',
            'file.required' => 'Ảnh đại diện sản phẩm không được trống'

        ];
    }
}
