<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    public function index(Request $request){
        $data = Article::paginate(10);
        return view('admin.article.index', ['data'=>$data]);
    }
    
    public function create(){
        return view('admin/article/create');
    }
    
    public function store(ArticleRequest $request){
        
//        $data = $request->get('content'); //获取指定参数
//        $data = $request->content; //获取指定参数
        $data = $request->all();            //获取全部参数
        $article = new Article();
        $article->title = $request->title;
        $article->body = $request->content;
        $article->user_id = 2;
        
        if ($article->save()) {
            return redirect('admin/article');
        } else {
            return redirect()->back()->withInput()->withErrors('保存失败！');
        }
    }
    
    public function show(Request $request,$id){
        
//        $path = $request->path();
//        $url = $request->url();
//        dd($url);
        return view('admin/article/show', ['model' => Article::findOrFail($id)]);
    }
    
//    public function edit(Request $request){
//        $id = $request->route('article');
//        return view('admin/article/edit', ['article'=>  Article::findOrFail($id)]);
//    }
    
    public function edit($id){
        return view('admin/article/edit', ['model'=>  Article::findOrFail($id)]);
    }
    
    public function update(ArticleRequest $request){
        $id = $request->route('article');
        $model = Article::findOrFail($id);
        
//        $arr1 = array('name'=>'liujie', 'age'=>19);
//        $arr2 = array('name'=>'fudi', 'gender'=>'male');
//        $arr3 = array('job'=>'worker', 'name'=>'liuie');
//        $arr4 = array('job'=>'worker', 'name'=>'tom');
//        $arr = array_intersect_key($arr1, $arr2, $arr3, $arr4);
//        dd($arr);
        
//        $attributes = $request->get('model');
//        $fillable = $model->getFillable();
//        $fillable = array_flip($fillable);
//        dump($attributes);
//        dd($fillable);
//        $model->title = $request->title;
//        $model->body = $request->content;
        $model->fill($request->get('model'));   // 批量赋值 填充模型 
        
        if ($model->save()){
            return redirect('admin/article');
        }else{
            return redirect()->back()->withInput()->withErrors('保存失败！');
        }
    }
    
    public function destroy(){
        
    }
}
