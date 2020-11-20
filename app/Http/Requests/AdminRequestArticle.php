<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequestArticle extends FormRequest
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
            'a_name' => 'required|max:190|min:2|unique:articles,a_name,'.$this->id,
            'a_description' => 'required',
            'a_menu_id' => 'required',
            'a_avatar' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'a_name.required' => 'Tên bài viết không được để trống',
            'a_name.unique'   => 'Tên bài viết đã tồn tại',
            'a_name.min' => 'Dữ liệu nhiều hơn 2 ký tự',
            'a_description.required' => 'Miêu tả không được để trống',
            'a_menu_id.required' =>'Tên bài viết không được để trống',
            'a_avatar.required' => 'Ảnh không được để trống'
     
        ];
    }
}
