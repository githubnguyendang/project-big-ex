<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'fileToUpload' =>'required|mimes:jpeg,jpg,png,gif',
        ];
    }
    public function messages()
    {
        return [
        'name.required' => 'Tên Slider không được để trống !',
        'fileToUpload.required' => 'Slider không được để trống',
        'fileToUpload.mimes' => 'Slider phải có định dạng là : jpeg,jpg,png,gif !',
        ];

    }
}
