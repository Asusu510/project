<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequestRole extends FormRequest
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
            'name' => 'required|unique:roles,name,'.$this->id,
            'permissions' =>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.unique' =>'Tên nhóm quyền đã tồn tại',
            'name.required' => 'Tên nhóm quyền không được để trống',
            'permissions.required' =>"Quyền truy cập không được để trống"
        ];
    }
}
