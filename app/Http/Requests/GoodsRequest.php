<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;
//use Illuminate\Support\Facades\Validator;   不能用这个类,千万注意

class GoodsRequest extends Request
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
            'model.name' => 'required|max:200',
            'model.cate_id' => 'required',
            'model.goods_sn' => 'max:50',
            'model.barcode' => 'max:50',
            'model.price' => 'required',
        ];
    }
    
    public function messages(){
        return [
            'required' => ':attribute 为必填',
            'max' => ':attribute 长度不超过:max个字符',
            'integer' => ':attribute 必须为整数',
        ];
    }
    
    public function attributes(){
        return [
            'model.name'=>'名称',
            'model.cate_id' => '分类',
            'model.goods_sn'=>'货号',
            'model.barcode'=>'条码',
            'model.price'=>'销售价',
            'model.sort'=>'排序',
        ];
    }
    
}
