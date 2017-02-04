<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

//use Illuminate\Contracts\Validation\Validator; // 类不要乱使用

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
      # 重写此方法需谨慎,千万注意
//    protected function formatValidationErrors(Validator $validator)
//    {
//        return $validator->errors()->all();
//    }
}
