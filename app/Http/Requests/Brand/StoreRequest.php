<?php

namespace App\Http\Requests\Brand;

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
           'brand_name' =>'required|unique:brand',
           'brand_desc' =>'required'
        ];
    }

    public function messages()
    {
        return [
           'brand_name.required' =>'Tên thương hiệu không được để trống',
           'brand_desc.required' =>'Mô tả thương hiệu không được đê trống',
           'brand_name.unique' => 'Thương hiệu này đã tồn tại'
        ];
    }
}
