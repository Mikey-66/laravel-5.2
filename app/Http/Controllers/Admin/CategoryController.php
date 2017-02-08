<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    
    private function _init(){
        $default_cate = config('custom.default_cate');
        DB::table('category')->truncate();
        foreach ($default_cate as $key => $item){
            DB::table('category')->insert([
                'name' => $item,
                'cate_path' => '0,' . $key . ',',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
        
    }
    
    
    public function index(){
        
//        $data = DB::table('category')->paginate(10);
        $data = Category::with('father')->paginate(10);
        
        return view('admin.category.index', [
            'data' => $data
        ]);
    }
    
    public function create(){
//        $cates = DB::table('category')->select(['id', 'name'])->get();
//        $cates = DB::table('category')->lists('name', 'id');
        $cates = DB::table('category')->pluck('name', 'id');
        
        
        return view('admin.category.create', [
            'cates' => $cates
        ]);
    }
    
    public function store(CategoryRequest $request){
        $data = $request->get('model');
        $cate = new Category();
        $cate->fill($data);
        dd($cate);
        if ($cate->save()){
            return redirect('admin/category')->with('success', '保存成功');
        }else{
            return redirect()->back()->withInput()->withErrors('保存失败');
        }
    }

    public function edit(){
        
    }

    public function update(){
        
    }
    
    public function destory(){
        
    }
    
    public function show(){
        
    }
}
