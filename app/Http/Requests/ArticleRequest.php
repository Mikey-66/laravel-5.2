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
            'model.title' => 'required|max:25',
            'model.body' => 'required',
        ];
    }
    
    public function messages(){
        return [
            'model.title.required' => '请填写标题',
            'model.body.required'  => '请填写内容',
            'model.title.max' => '标题长度不超过25个字'
        ];
    }


    /**
     *  定制存入闪存的错误信息格式
     */
    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }
}
