<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'email' => 'required|email',
            'phone' => 'required|integer',
            'tinh' => 'required',
            'huyen' => 'required',
            'xa' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống !',
            'email.required' => 'Email không được để trống !',
            'email.email' => 'Email không đúng định dạng !',
            'tinh.required' => 'Tỉnh không được để trống !',
            'huyen.required' => 'Huyệ không được để trống !',
            'xa.required' => 'Xã danh được để trống !',
        ];
    }
}
