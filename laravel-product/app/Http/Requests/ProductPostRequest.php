<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            // 'image' => 'required|max:255',
            'description' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, mixed>
     */
    public function messages(): array
    {
        return [
            'name.required' => '商品名称不能为空',
            'name.max' => '商品名称不能超过255个字符',
            'price.required' => '商品价格不能为空',
            'price.numeric' => '商品价格必须是数字',
            // 'image.required' => '商品图片不能为空',
            // 'image.max' => '商品图片不能超过255个字符',
            'description.required' => '商品描述不能为空',
        ];
    }
}
