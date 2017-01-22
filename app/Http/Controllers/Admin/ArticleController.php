<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index(){
        $data = Article::take(20)->get();
        return view('admin.article.index', ['data'=>$data]);
    }
    
    public function create(){
        echo 'index';
    }
    
    public function store(){
        echo 'index';
    }
    
    public function show(){
        echo 'index';
    }
    
    public function edit(){
        echo 'index';
    }
    
    public function update(){
        echo 'index';
    }
    
    public function destroy(){
        echo 'index';
    }
}
