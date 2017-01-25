<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;
use Validator;

class ArticleController extends Controller
{
    public function index(Request $request){
        $query = Article::query();
        if ($request->sword){
            $query->whereRaw('LOCATE(?, title)', [$request->sword]);
        }
//        $sql = $query->toSql();
//        $bindings = $query->getBindings();
//        dump($sql);
//        dd($bindings);
        $data = $query->paginate(15);
//        dd($data);
//        $s = require_once 'js/article/base.js';
//        echo $s;exit;
        return view('admin.article.index', ['data'=>$data]);
    }
    
    public function create(){
//        exit('ok');
        return view('admin/article/create');
    }
    
    public function store(ArticleRequest $request){
//        dd($request->input());
//        $this->validate($request, $rules, $messages, $customAttributes);
//        $valiador = val
//        $data = $request->get('content'); //获取指定参数
//        $data = $request->content; //获取指定参数
        $data = $request->input('model');            //获取全部参数
        $article = new Article();
        $article->title = $data['title'];
        $article->body = $data['body'];
        $article->user_id = 2;
        
        if ($article->save()) {
            return redirect('admin/article')->with('success', '保存成功');
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
    
    /**
     * AJAX method
     * @param type $id
     * @return type
     */
    public function destroy($id){
        $model = Article::find($id);
        if (!$model){
            return response()->json(['code'=>500, 'msg'=>'参数有误']);
        }
        
        if ($model->delete()){
            return response()->json(['code'=>200, 'msg'=>'删除成功']);
        }else{
            return response()->json(['code'=>500, 'msg'=>'删除失败']);
        }
    }
}
