<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequestUpdateInfo extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:clients,email,'.\Auth::guard('client')->user()->id,
            'address' => 'required',
            'phone' => 'required|unique:clients,phone,'.\Auth::guard('client')->user()->id,
            'birthday' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'email.required' => "Email không được để trống",
            'email.mail' => "Chưa đúng đinh dạng email",
            'email.unique' => "Email đã tồn tại",
            'address.required' =>'Địa chỉ không được để trống',
            'phone.required' =>'Điện thoại không được để trống',
            'phone.unique' =>'Số điện thoại đã tồn tại',
            'birthday.required' =>'Ngày sinh khôn được để trống'

        ];
    }
}
