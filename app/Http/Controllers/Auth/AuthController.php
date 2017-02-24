<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Sysuser;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use App\Models\Category;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    
    protected $registerView = "auth.myregister";     // 注册视图
    
    protected $loginView = "auth.login";     // 登录视图
    
    protected $guard = "admin";
    
    protected $username = "username";   // 用于查找用户的字段

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = 'admin/site/index';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('guest', ['except' => 'logout']);
    }
    
    /**
     * Get a validator for an incoming registration request.
     *  验证用户注册时 提交的数据
     *  可重写此方法改变数据验证规则
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:60',
            'email' => 'required|email|max:60|unique:sysuser',
            'phone' => 'required|max:20',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required'
        ], [
            'required' => ':attribute 不能为空',
            'max' => ':attribute 长度不能超过:max 个字符',
            'unique' => ':attribute 已经存在'
        ], [
            'username' => '用户名',
            'email' => '邮箱',
            'phone' => '手机号码',
            'password' => '密码',
            'password_confirmation' => '确认密码'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     * 在数据验证通过后保存 orm模型 并返回（用于登录）
     * 可重写此方法，写入用户信息，在方法的最后返回插入的orm模型即可
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return Sysuser::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => bcrypt($data['password']),
        ]);
    }
    
    
    // 验证失败的返回信息
//    protected function sendFailedLoginResponse(Request $request)
//    {
//        return redirect()->back()
//            ->withInput($request->only($this->loginUsername(), 'remember'))
//            ->withErrors([
//                $this->loginUsername() => $this->getFailedLoginMessage(),
//            ]);
//    }
    
    // 错误信息
    protected function getFailedLoginMessage()
    {
        return '密码或用户名不正确';
    }
    
    /**
     * 重写traits中的方法  
     * 展示登录视图
     * @param Request $request
     * @return type
     */
//    public function showLoginForm() {
//        return view('auth.mylogin');
//    }
    
    /**
     * 重写traits中的方法  
     * 展示注册视图
     * @param Request $request
     * @return type
     */
    
//    public function showRegistrationForm(){
//        return view('auth.myregister');
//    }
}
