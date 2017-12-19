<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'txtUser'   =>'required|unique:users,username',
            'txtPass'   =>'required',
            'txtRePass' =>'required|same:txtPass',
            'txtEmail'  =>'required|email',
        ];
    }

    public function messages(){
        return [
            'txtUser.required'   =>'Vui lòng nhập username',
            'txtUser.unique'     =>'Username đã tồn tại',
            'txtPass.required'   =>'Vui lòng nhập password',
            'txtRePass.required' =>'Vui lòng nhập lại password',
            'txtRePass.same'     =>'Password nhập lại không đúng',
            'txtEmail.required'  =>'Vui lòng nhập email',
            'txtEmail.email'     =>'Email không đúng'
        ];
    }
}
