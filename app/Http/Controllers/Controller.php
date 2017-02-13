<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\View;
use DB;

//use Illuminate\Contracts\Validation\Validator; // 类不要乱使用

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public $module;
    
    public $controller;
    
    public $action;

    public function __construct() {
        $this->_assignRoute();
    }
    
    private function _assignRoute(){
        $request_method = \Route::current()->getActionName();
        $request_method = strtolower(substr($request_method, strrpos($request_method, '\\') + 1));
        
        $arr = explode('@', $request_method);
        $this->controller = preg_replace('/controller/', '', $arr[0]);
        $this->action = $arr[1];
        
        View::share('share', [
            'controller' => $this->controller,
            'action' => $this->action
        ]);
        
    }
    
    public function jsonMsg($code, $msg, $data = Null, $url = NULL){
        if ($code == 200 && DB::transactionLevel() ==1){
                DB::commit();
        }elseif ($code !== 200 && DB::transactionLevel() ==1){
                DB::rollback();
        }
        
        response()->json([
            'code' => $code,
            'msg' => $msg,
            'data' => $data,
            'url' => $url
        ])->send();
        
        exit;
    }



}
