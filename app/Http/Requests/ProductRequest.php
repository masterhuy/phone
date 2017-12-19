<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'sltParent' =>'required',
            'txtName'   =>'required|unique:products,name',
            'fImages'   =>'required|image'
        ];
    }

    public function messages(){
        return [
            'sltParent.required' =>'Vui lòng chọn thể loại',
            'txtName.required'   =>'Vui lòng nhập tên sản phẩm',
            'txtName.unique'     =>'Tên sản phẩm đã tồn tại',
            'fImages.required'   =>'Vui lòng chọn ảnh sản phẩm',
            'fImages.image'      =>'File đã chọn không phải là định dạng hình'
        ];
    }
}
