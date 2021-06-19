<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCodeSaleRequest extends FormRequest
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
            'codename' => 'required',
            'value' => 'required|integer|min:1|max:100',
        ];
    }
    public function messages()
    {
        return [
            'codename.required' => 'Mã giảm giá không được để trống !',
            'value.required' =>  'Giá trị mã giảm giá khong được để trống !',
            'value.integer'   => 'Giá trị mã giảm giá phải là số !',
            'value.min'   => 'Giá trị mã giảm giá tối thiệu là 1% !',
            'value.max'   => 'Giá trị mã giảm giá không được vượt quá 100%',
        ];
    }
}
