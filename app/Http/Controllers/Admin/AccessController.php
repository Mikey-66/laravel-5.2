<?php

/**
 * RBAC 控制器
 * 
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccessController extends Controller{
    
    // 角色列表 
    
    
    // 添加角色
    public function addRole(){
        
        return view('admin.access.addrole');
    }
    
    
    // 初始化 角色和权限
    public function init(){
        
        $roles = config('rbac.roles');
        dump($roles);
        
        
    }
    
}
