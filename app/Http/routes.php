<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'HomeController@index');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

//Route::group(['middleware' => ['web']], function () {
//    //
//});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    //Route::get('/home', 'HomeController@index');
});

Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function() {  
    Route::get('/', 'HomeController@index');
    
});



#1 基础路由 

//get
Route::get('route1', function(){
    return 'route1';
});

//post
Route::post('route2', function(){
    return 'route2';
});

//put
Route::put('foo/bar', function () {
    //
});

//delete
Route::delete('foo/bar', function () {
    //
});

#2 多路由

//match
Route::match(['get', 'post'],'multi', function(){
    return 'muti routes';
});

//any
Route::any('all', function(){
    return 'accept any routes';
});

#3 路由参数

// Required parameter
Route::get('route3/{id}/{name}', function($id, $name){
    return $id.'-'.$name;
});

Route::get('posts/{post_id}/comments/{comment_id}', function($postId, $commentId){
    
});

// Optional parameter
Route::get('user/{name?}', function( $name = 'liujie' ){
    return $name;
});

Route::get('user2/{name?}', function( $name = null ){
    return $name;
});

// Regular Expression Constraints
Route::get('user3/{name}', function($name){
    return $name;
})->where('name', '[A-Za-z]+');

Route::get('user4/{id}', function($id){
    return $id;
})->where('id', '[0-9]+');

Route::get('user5/{id}/{name}', function($id, $name){
    return $id.'-'.$name;
})->where(['id'=>'[0-9]+', 'name'=>'[a-z]+']);

/*
Global Constraints
If you would like a route parameter to always be constrained by a given regular expression, 
 * you may use the pattern method. You should define these patterns in the boot method of 
 * your RouteServiceProvider:

public function boot(Router $router)
{
    $router->pattern('id', '[0-9]+');

    parent::boot($router);
}
Once the pattern has been defined, it is automatically applied to all routes using that parameter name:
Route::get('user/{id}', function ($id) {
    // Only called if {id} is numeric.
});
*/

#4 命名路由

Route::get('route/profile', ['as' => 'profile', function () {
    $route = route('profile');
    echo $route;
    //return 'named routes';
}]);

Route::get('route2/profile', [
    'as' => 'profile2',
    'uses' => 'UserController@showProfile'
]);

Route::get('route3/profile', 'UserController@showProfile2')->name('profile3');

#5 分组路由
Route::group(['prefix' => 'member', 'namespace'=>'Member', 'middleware'=>'test'], function(){
    Route::get('add', function(){
        return 'member-add';
    });
    
    Route::get('create', 'MemberController@create');
    
});


#6 路由-模型绑定

/*
First, use the router's model method to specify the class for a given parameter. 
 * You should define your model bindings in the RouteServiceProvider::boot method:

Binding A Parameter To A Model

public function boot(Router $router)
{
    parent::boot($router);

    $router->model('user', 'App\User');
}
Next, define a route that contains a {user} parameter:
 * 
 */

Route::get('route4/{user}', function(\App\User $user){
    dd($user);
});

Route::get('route5/{p1}', function(\App\User $p1){
    dd($p1);
});

# 如何提交 put patch delete 请求
/*
Form Method Spoofing

HTML forms do not support PUT, PATCH or DELETE actions. So, when defining PUT,  PATCH or DELETE routes that are called from an HTML form, you will need to add a hidden  _method field to the form. The value sent with the _method field will be used as the HTTP request method:

<form action="/foo/bar" method="POST">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
To generate the hidden input field _method, you may also use the method_field helper function:

<?php echo method_field('PUT'); ?>
Of course, using the Blade templating engine:

{{ method_field('PUT') }}
 * */

# 抛出一个 404 路由异常
Route::get('route6', function(){
    abort(404);
    //throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException('页面未找到');
});


Route::get('route7', function(){
    $a = App\Models\Goods::all();
    dd($a);
});


//--------------------------------------------------------------------------------------

Route::get('category/index', 'CategoryController@index');


Route::get('site/index', 'SiteController@index');