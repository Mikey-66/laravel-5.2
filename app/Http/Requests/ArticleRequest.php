<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

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
     */
    protected function formatErrors(Validator $validator)
    {
//        dd($validator->errors());
        return $validator->errors()->all();
    }
}
