<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;

class SiteController extends Controller
{
    public function index(){
        $user = Auth::guard('admin')->user();
//        Auth::guard('admin')->logout();
//        show($user);exit;
        return view('admin.site.index');
    }
    
    public function mail(){
        // 邮箱主题subject一定要设置，否则邮件可能被当做垃圾邮件而退信
//        $flag = Mail::send('email.hello',[],function($message){
//            $message ->to('805742791@qq.com')
//                    ->subject('密码重置');  
//        });
        
//        $flag = Mail::raw('goods moring i love u', function($message){
//            $message->to('805742791@qq.com');
//            $message->subject('Reset Password');
//        });
        
        
        $flag = Mail::raw('sdsdsd', function($m){
            $m->to('805742791@qq.com');
            $m->subject('reset p');
        });
        
        if($flag){  
            echo '发送邮件成功，请查收！';  
        }else{  
            echo '发送邮件失败，请重试！';  
        }  
    }
}
