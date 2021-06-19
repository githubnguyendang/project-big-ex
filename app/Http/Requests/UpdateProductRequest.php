<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'proName' => 'required',
            'fileToUpload' =>'mimes:jpeg,jpg,png,gif',
            'description' => 'required',
            'pro_price' => 'required|numeric|min:0',
            'pro_sale' => 'numeric|min:0|nullable|lte:pro_price',
        ];
    }
    public function messages()
    {
        return [
            'proName.unique' => 'Sản phẩm đã tồn tại !',
            'fileToUpload.mimes' => 'Ảnh sản phẩm phải có định dạng là : jpeg,jpg,png,gif !',
            'description.required' => 'Mô tả sản phẩm không được để trống !',
            'pro_price.required' => 'Giá sản phẩm không được để trống !',
            'pro_price.min' => 'Giá sản phẩm phải lớn hơn 0 !',
            'pro_price.numeric' => 'Giá sản phẩm phải là dạng số !',
            'pro_sale.numeric' => 'Giá sản phẩm phải là dạng số !',
            'pro_sale.min' => 'Giá sản phẩm phải lớn hơn 0 !',
            'pro_sale.lte' => 'Giá khuyến mãi phải nhỏ hơn giá gốc !',
        ];
    }
}
