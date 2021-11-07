<?php

namespace App\Http\Requests\Customer;

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
            'email' => 'required|email|unique:customer',
            'name' => 'required',
            'phone' => 'required',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
           'email.required' =>'Email khách hàng không được để trống',
           'email.unique' =>'Email khách hàng này đã tồn tại',
           'email.email' =>'Email phải đúng định dạng',
           'name.required' => 'Tên khách hàng không được để trống',
           'phone.required' => 'Số điện thoại không được để trống',
           'password.required' => 'Mật khẩu không được để trống',
        ];
    }
}

