<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use \Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Article;
use App\Models\Comments;
use App\Models\Votes;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

class IndexController extends Controller{
    
    public function __construct()
    {
        
//        $this->middleware('auth');
//
//        $this->middleware('log', ['only' => ['fooAction', 'barAction']]);
//
//        $this->middleware('subscribed', ['except' => ['fooAction', 'barAction']]);
    }
    
    //  请求
     
    public function index(Request $request){
//        $action = Route::currentRouteAction();
//        echo $action;
//        $path = $request->path();
//        echo $path . '<hr/>';
//        
//        if ($request->is('index/*')){
//            echo 'yes<hr/>';
//        }
//        
//        $url = $request->url();
//        echo $url.'<hr>';
//        
//        $method = $request->method();
//        echo $method . '<hr>';
//        
//        if ($request->isMethod('get')){
//            echo 'get<hr>';
//        }
//        
//        // Retrieving An Input Value
//        $a = $request->input('a');
//        $b = $request->b;
//        $c = $request->input('c', 'default value of c');
//        
//        echo $a . '-' . $b . '-' . $c . '<hr/>';
//        
//        //Determining If An Input Value Is Present
//        if ($request->has('a')){
//            echo 'a exists<hr/>';
//        }
//        //When working on forms with array inputs, 
//        //you may use "dot" notation to access the arrays   
////        $input = $request->input('products.0.name');
//        
//        //Retrieving All Input Data
//        $input = $request->all();
//        dd($input);
        //Retrieving A Portion Of The Input Data
//        $input = $request->only(['a']);
//        $input = $request->only(['a', 'b']);
//        $input = $request->except(['a']);
//        $input = $request->except(['b']);
//        $request->flash();
//        $a = session(['a'=>'liujie']);
//        $a = session('a', 'a is not sessioned');
//        dd($a);
//        $request->session()->put('name','liujie');
        
        
        /**
         * 在运行测试时，Laravel 会自动将环境变量设置为 testing，并将 Session 及缓存以 数组 
         * 的形式存入，也就是说在测试时不会保存任何的 Session 或缓存数据。
         */
//        $se = $request->session()->get('name', 'fudi');
//        if ($request->hasSession('name')){
//            echo $request->session()->get('name'). '<hr/>';
//        }
//        
////        $request->session()->put('age', 19);
//        if ($request->hasSession('age')){
//            echo $request->session()->get('age'). '<hr/>';
//        }
//        exit;
//        $request->session()->forget('age');
//        $request->session()->flush();
//        $request->session()->regenerate(true);
        
//        $request->session()->flash('status', 'Task was successful!');
//        $se = $request->session()->all();
        
//        $se = $request->session()->get('status');
//        $se = $request->old('status');
//        $se = $request->session()->all();
//        dump($se);
//        $age = $request->session()->pull('age');
////        dd($age);
//        $se = $request->session()->all();
//        dump($se);
        
        
        
    }
}

