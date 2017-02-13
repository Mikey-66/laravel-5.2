<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Libs\BaseApi;
use DB;
use App\Http\Requests\GoodsRequest;
use App\Models\Goods;


class GoodsController extends Controller
{
    public function index(Request $request){
        
        $query = Goods::query();
        $data = $query->with('cate')->paginate(config('custom.page_count'));
        
//        dd($data);
        return view('admin.goods.index', [
            'data' => $data
        ]);
        
    }
    
    public function create(){
        $cates = DB::table('category')
                ->whereRaw('LOCATE(?, cate_path) and id !=1', [',1,'])           // 这个方法很灵活 组装Raw SQL 很有用
//                ->whereRaw('sort = 100')
//                ->orWhereRaw('sort = 100')            // 太好啦，有这个方法 555
                ->orderBy('cate_path')->get();
 
        foreach ($cates as $key => $item){
            $cates[$key]['level'] = count(explode(',', $item['cate_path'])) - 2;
            $cates[$key]['show_name'] = str_repeat('&nbsp;', $cates[$key]['level']*2) . '|- ' . $item['name'];
        }
        
        return view('admin.goods.create', [
            'cates' => $cates
        ]);
    }
    
    public function store(GoodsRequest $request){
        $data = $request->input();
        $goods = new Goods();
        $goods->fill($request->get('model'));
        try{
            DB::beginTransaction();
            $cate = \App\Models\Category::findOrFail($goods->cate_id);
            $goods->cate_path = $cate->cate_path;
            
            if (!$goods->save()){
                throw new \Exception('保存失败');
            }
            
            DB::commit();
            return redirect('admin/goods')->with('success', '保存成功');
                    
            
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->withInput()->withErrors('保存失败' . $e->getMessage());
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
