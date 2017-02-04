<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;
//use Illuminate\Support\Facades\Validator;   不能用这个类,千万注意

class ArticleRequest extends Request
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
            'model.title' => 'required|max:5',
            'model.body' => 'required',
        ];
    }
    
    public function messages(){
        return [
            'required' => ':attribute 为必填',
            'max' => ':attribute 长度不超过:max个字符'
        ];
    }
    
    public function attributes(){
        return [
            'model.title'=>'标题',
            'model.body' => '内容'
        ];
    }


    /**
     *  定制存入闪存的错误信息格式
     *  重写此方法需谨慎
     *  注意以下两种方法 的区别
     */
    protected function formatErrors(Validator $validator)
    {
        # 这样写有问题(返回的索引数组) 错误信息无法和验证规则绑定
//        return $validator->errors()->all(); 
//        
//        
        # 这样写是可以的  其实和Illuminate\Foundation\Http\FormRequest 中的formatErrors是一样的
        return $validator->getMessageBag()->toArray();  
    }
}
