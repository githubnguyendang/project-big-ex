<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class UserRequest extends FormRequest
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
            'username' => 'required|unique:users,user_name',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ];
    }
    public function messages(){
        return [
            'username.required' => 'User Name không được để trống !',
            'username.unique' => 'User Name đã tồn tại',
            'email.required' => 'Email không được để trống !',
            'email.email' => 'Định dạng Email không đúng',
            'password.required' => 'Password không được để trống !',
            'password.min' => 'Password tối thiểu là 6 ký tự',
            'password.confirmed' => 'Mật khẩu nhập lại không giống !'
        ];
    }
}
