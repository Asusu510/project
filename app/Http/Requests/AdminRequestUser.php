<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequestUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->id,
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
            
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'email.required' => "Email không được để trống",
            'email.unique' =>"Email đã tồn tại",
            'password.required' =>"mật khẩu không được đẻ trống",
            'confirm_password.required' => 'Không được để trống',
            'confirm_password.same' =>"Mật khẩu không trùng khớp",
            

        ];
    }
}
