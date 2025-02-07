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
        $rules = [
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'description' => 'required',
        ];

        // **如果是创建（store），图片是必填项**
        if ($this->isMethod('post')) {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048';
        }

        // **如果是更新（update），图片可以为空**
        if ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048';
        }

        return $rules;
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
            'image.required' => '图片上传失败',
            'image.image' => '上传的文件必须是图片',
            'image.mimes' => '图片格式必须是 jpeg, png, jpg, gif, svg',
            'image.max' => '图片大小不能超过 2MB',
            'description.required' => '商品描述不能为空',
        ];
    }
}
