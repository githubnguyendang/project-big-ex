<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'noidung' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề bài viết không được để trống !',
            'description.required' => 'Description bài viết không được để trống !',
            'noidung.required' => 'Nội dung bài viết không được để trống !',
        ];
    }
}
