<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Libs\CSXCore;

class CategoryController extends Controller
{
    
    private $_init_category = false;


    public function __construct() {
        parent::__construct();
    }


    private function _init(){
        $default_cate = config('custom.default_cate');
//        DB::table('category')->truncate();
        
        $cates = Category::select('id')->whereIn('id',[1,2])->pluck('id')->toArray();

        $notExistsCate = array_diff(array_keys($default_cate), $cates);
        
        foreach ($default_cate as $key => $item){
            if (!in_array($key, $notExistsCate)){
                unset($default_cate[$key]);
            }
        }
        
        foreach ($default_cate as $key => $item){
            DB::table('category')->insert([
                'id' => $key,
                'name' => $item,
                'cate_path' => '0,' . $key . ',',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
        
    }
    
    
    public function index(Request $request){
        if ($this->_init_category){
            $this->_init();
        }
        
        $query = Category::query();
        
        $p = $request->route('pid') ? $request->route('pid') : 0;
        
        if ($p !== null){
            $query->where('pid', $p);
        }
        
        $data = $query->with('father')->paginate(10);
        
        return view('admin.category.index', [
            'data' => $data
        ]);
    }
    
    public function create(){
//        $cates = DB::table('category')->select(['id', 'name'])->get();
//        $cates = DB::table('category')->lists('name', 'id');
        
        $cates = DB::table('category')->orderBy('cate_path')->get();
        
        foreach ($cates as $key => $item){
            $cates[$key]['level'] = count(explode(',', $item['cate_path'])) - 2;
            $cates[$key]['show_name'] = str_repeat('&nbsp;', $cates[$key]['level']*2) . '|- ' . $item['name'];
        }
        
//        $cates = DB::table('category')
//                ->whereRaw('LOCATE(?, cate_path)', [',1,'])
//                ->pluck('name', 'id');
        
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

            $cate->cate_path = $cate->father ? $cate->father->cate_path . $cate->id . ',' : '0,' . $cate->id . ',';
            
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

    public function edit($id){
//        $cates = DB::table('category')->orderBy('cate_path')->get();
        $cates = DB::table('category')->get();
        $cates = CSXCore::set_array_key($cates, 'id');
//        show($cates);exit;
        $cates = CSXCore::generate_tree4($cates);
        show($cates);
        exit;
        
        foreach ($cates as $key => $item){
            $cates[$key]['level'] = count(explode(',', $item['cate_path'])) - 2;
            $cates[$key]['show_name'] = str_repeat('&nbsp;', $cates[$key]['level']*2) . '|- ' . $item['name'];
        }
        
        return view('admin/category/edit', [
            'model' => Category::findOrFail($id),
            'cates' => $cates 
        ]);
    }

    public function update(CategoryRequest $request, $id){
        $model = Category::findOrFail($id);
        $model->fill($request->get('model'));
        
        if ($model->isDirty('pid')){
            $model->cate_path = $model->father ? $model->father->cate_path . $model->id . ',' : '0,' . $model->id . ',';
        }
        
        if ($model->save()){
            return redirect('admin/category')->with('success', '保存成功');
        }else{
            return redirect()->back()->withInput()->withErrors('保存失败');
        }
        
        
        
        
    }
    
    public function destroy($id){
        $model = Category::find($id);
        if (!$model){
            $this->jsonMsg(500, '参数有误');
        }
        
        if ( count($model->son()) ){
            $this->jsonMsg(501, '存在下架分类，暂不可删除');
        }
        
        if ($model->delete()){
            $this->jsonMsg(502, '删除成功');
        }else{
            $this->jsonMsg(503, '删除失败');
        }
    }
    
    public function show(){
        
    }
}
