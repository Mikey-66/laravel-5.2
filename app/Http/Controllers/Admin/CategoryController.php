<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    
    public function __construct() {
        parent::__construct();
    }


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
        
        try{
            DB::beginTransaction();
            if (!$cate->save()){
                throw new \Exception('保存失败');
            }

            $cate->cate_path = $cate->father ? $cate->father->cate_path . $cate->id . ',' : '0,';

            if (!$cate->save()){
                throw new \Exception('保存失败');
            }

            DB::commit();
            return redirect('admin/category')->with('success', '保存成功');
        }
        catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors('保存失败 ' . $e->getMessage());
        }
    }

    public function edit(){
        
    }

    public function update(){
        
    }
    
    public function destroy($id){
        $model = Category::find($id);
        if (!$model){
            return response()->json(['code'=>500, 'msg'=>'参数有误']);
        }
        
        if ($model->delete()){
            return response()->json(['code'=>200, 'msg'=>'删除成功']);
        }else{
            return response()->json(['code'=>500, 'msg'=>'删除失败']);
        }
    }
    
    public function show(){
        
    }
}
