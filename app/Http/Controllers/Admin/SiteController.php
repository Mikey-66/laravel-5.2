<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;
use Gate;

use App\Models\Article;

class SiteController extends Controller
{
    public function index(Request $request){
        
        $post = Article::findOrFail(11);

        $su = \App\Models\Sysuser::findOrFail(1);
//        $user = Auth::guard('admin')->user();
        
//        $user = $request->user('admin');
//        dump($user);exit;
        
//        if (Gate::denies('update-post', $post)) {
////            exit('五次权限');
//            abort(403);
//        }
        
        
//        if (Gate::forUser($su)->check('update-post', $post)) {
//            exit('有权限');
//            abort(403);
//        }
        
//        if (Gate::forUser($su)->allows('update-post', $post)) {
//            exit('无权限');
//            abort(403);
//        }
        
//        if ($request->user('admin')->can('update-post', [$post])){
//            exit('有权限');
//        }
        
//        if ($su->can('update-post', [$post])){
//            exit('有权限');
//        }
//        
//        exit('ok');
        
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
