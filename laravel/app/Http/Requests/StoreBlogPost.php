<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
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
            'name'=>'required|unique:products',
            'producer'=>'required|unique:products',
            'price'=>'required|unique:products',
            'img'=>'required|unique:products',
            'describe_product'=>'required|unique:products',
            'weight'=>'required|unique:products'

        ];
    }

    public function messages()
    {
        return [
//            'name.min'=> "ít nhất 2 ký tự",
            'name.required'=> "Phải nhập tên",
            'producer.required'=> "Phải nhập tên nhà sản xuất",
            'price.required'=> "Phải nhập giá",
            'img.required'=> "Phải điền ảnh",
            'describe_product.required'=> "Phải nhập mô tả",
            'weight.required'=> "Phải nhập khối lượng",


        ];
    }
}
