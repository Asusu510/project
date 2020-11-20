<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequestBrand extends FormRequest
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
            'br_name' => 'required|max:190|min:2|unique:brands,br_name,'.$this->id
        ];
    }

    public function messages()
    {
        return [
            'br_name.required'   => 'Dữ liệu không được để trống',
            'br_name.unique'     => 'Dữ liệu đã tồn tại',
            'br_name.max'        => 'Dữ liệu không quá 190 ký tự',
            'br_name.min'        => 'Dữ liệu phải nhiều hơn 2 ký tự'
        ];
    }
}
