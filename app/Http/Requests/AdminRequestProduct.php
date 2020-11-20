<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequestProduct extends FormRequest
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
            'pro_name' => 'required|max:190|min:2,'.$this->id,
            'pro_price' =>'required|numeric|min:0|not_in:0',
            'pro_sale' => 'min:|lt:pro_price',
            'pro_description' => 'required',
            'pro_category_id' => 'required',
            'pro_number'  => 'required',
            'pro_avatar' => 'required',
            'pro_brand_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'pro_name.required'   => 'Tên sản phẩm không được để trống',
            'pro_name.max'        => 'Tên sản phẩm không quá 190 ký tự',
            'pro_name.min'        => 'Tên sản phẩm phải nhiều hơn 2 ký tự',
            'pro_price.required'   => 'Giá không được để trống',
            'pro_price.min'     => 'Giá không được > 0',
            'pro_price.not_in'     => 'Giá không được bằng 0',           
            'pro_sale.lt'          => 'Gia khuyến mãi phải nhỏ hơn giá gốc',
            'pro_description.required'     => 'Miêu tả không được để trống',
            'pro_category_id.required'     => 'Danh mục không được để trống',
            'pro_number.required'     => 'Số lượng không được để trống',
            'pro_avatar.required'     => 'ảnh không được để trống',
            'pro_brand_id.required'   => 'Thương hiệu không được để trống'

        ];
    }
}
