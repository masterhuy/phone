<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CateRequest extends FormRequest
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
            'txtCateName'=>'required|unique:cates,name'
        ];
    }

    public function messages(){
        return [
            'txtCateName.required' =>'Bạn chưa nhập tên thể loại',
            'txtCateName.unique'   =>'Thể loại đã tồn tại'
        ];
    }
}