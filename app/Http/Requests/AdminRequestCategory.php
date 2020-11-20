<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequestCategory extends FormRequest
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
            'c_name' => 'required|max:190|min:2|unique:categories,c_name,'.$this->id
        ];
    }

    public function messages()
    {
        return [
            'c_name.required' => 'Tên danh mục không được để trống',
            'c_name.unique'   => 'Tên danh mục đã tồn tại',
            'c_name.max'      => 'Tên danh mục không được quá 190 ký tự',
            'c_name.min'      => 'Tên danh mục phải nhiều hơn 2 ký tự'
        ];
    }
}
