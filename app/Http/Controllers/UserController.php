<?php

namespace App\Http\Controllers;

class UserController extends Controller{
    
    public function showProfile(){
        $route = route('profile2', ['id'=>1, 'name'=>'liujie']);
        dd($route);
    }
    
    public function showProfile2(){
    }
}
