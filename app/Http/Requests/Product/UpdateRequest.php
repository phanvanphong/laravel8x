<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'product_name' => 'required|unique:product,product_name,'.request()->id,
            'product_price_original' => 'required|min:1',
            'product_price' => 'required|min:1',
            'product_number' => 'required|min:1',
            'product_desc' => 'required',
            'product_image' => 'required',
            'product_image_list' => 'required',
        ];
    }

    public function messages()
    {
        return [
           'product_name.required' =>'Tên sản phẩm không được để trống',
           'product_name.unique' =>'Tên sản phẩm này đã tồn tại',
           'product_price_original' => 'Gía sản phẩm không được để trống',
           'product_price_original' => 'Gía sản phẩm phải lớn hơn 0',
           'product_price' => 'Gía giảm sản phẩm không được để trống',
           'product_price' => 'Gía giảm sản phẩm phải lớn hơn 0',
           'product_desc' => 'Mô tả sản phẩm không được để trống',
           'product_number' => 'Số lượng sản phẩm không được để trống',
           'product_number' => 'Số lượng sản phẩm phải lớn hơn 0',
           'product_image' => 'Hình ảnh sản phẩm không được để trống',
           'product_image_list' => 'Danh sách hình ảnh sản phẩm không được để trống',
        ];
    }
}
