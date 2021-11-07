<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
           'category_name' =>'required|unique:category',
           'category_desc' =>'required'
        ];
    }

    public function messages()
    {
        return [
           'category_name.required' =>'Tên danh mục không được để trống',
           'category_desc.required' =>'Mô tả danh mục không được đê trống',
           'category_name.unique' => 'Danh mục này đã tồn tại'
        ];
    }
}
