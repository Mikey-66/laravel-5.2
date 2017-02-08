<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;
//use Illuminate\Support\Facades\Validator;   不能用这个类,千万注意

class CategoryRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     * 
     * @return bool
     */
    public function authorize()
    {
        //return false;
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
            'model.name' => 'required|max:30',
            'model.pid' => 'required',
            'model.logo' => 'max:200',
            'model.link' => 'max:200',
            'model.sort' => 'integer'
        ];
    }
    
    public function messages(){
        return [
            'required' => ':attribute 为必填',
            'max' => ':attribute 长度不超过:max个字符',
            'integer' => ':attribute 必须为整数'
        ];
    }
    
    public function attributes(){
        return [
            'model.name'=>'标题',
            'model.pid' => '父级分类',
            'model.logo'=>'分类logo',
            'model.link'=>'链接地址',
            'model.sort'=>'排序',
        ];
    }
    
}
