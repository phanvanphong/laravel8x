<?php

namespace App\Http\Requests\User;

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
            'name' =>'required',
            'email' =>'required|email|unique:users',
            'password'=>'required',
         ];
     }
 
     public function messages()
     {
         return [
            'name.required' =>'Tên thành viên không được để trống',
            'email.required' =>'Email không được đê trống',
            'email.email' =>'Email phải đúng định dạng',
            'email.unique' =>'Email này đã tồn tại',
            'password.required' => 'Mật khẩu không được để trống'
         ];
     }
 }
 
