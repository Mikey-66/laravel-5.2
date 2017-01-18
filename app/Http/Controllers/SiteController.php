<?php
namespace App\Http\Controllers;

use \Illuminate\Support\Facades\DB;

class SiteController extends Controller{
    
    /**
     *  本控制器准中练习 raw sql
     */
    
    public function index(){
        //$data = DB::select('select MAX(id) as max_id from articles');
        //$data = DB::select('select id,title, NOW() as time from articles');
//        $data = DB::select('select distinct id from articles');
//        foreach ($data as $key => $item){
//            echo $item->id.'<br/>';
//        }
//        dump($data);
        
        // insert 
        
//        $line = DB::insert('INSERT INTO articles(title, body, user_id, created_at, updated_at) 
//                    VALUES(?, ?, ?, ?, ?)', ['title 10', 'body 10', 2, date('Y-m-d H:i:s'), date('Y-m-d H:i:s')]);
//        dd($line);
        
        // update
        
//        $line = DB::update('UPDATE articles SET title = ?, body = ? where title = ?', [
//            'title 12', 'body 12', 'title 10'
//        ]);
//        
//        dump($line);
        
        // delete 
//        $line = DB::delete('delete from articles where id >=5');
//        dd($line);
        
        
        //Using Named Bindings
//        $data = DB::select('select * from articles where title=:title and body=:body',[
//            'title'=>'title1', 'body'=>'body 1']);
//        dd($data);
        
        // Database Transaction
//        DB::transaction(function(){
//            DB::table('category')->where('id', 4)->update(['name'=>'蔬菜']);
//            throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException('页面未找到');
//            DB::table('articles')->where('id', 4)->update(['title'=>'title4']);
//            //
//        });
        
//        DB::beginTransaction();
//        DB::table('category')->where('id', 4)->update(['name'=>'蔬菜222']);
//        DB::table('articles')->where('id', 4)->update(['title'=>'title4']);
//        DB::rollback();
//        exit('ok');
//        DB::commit();
//        
//        
        //Using Multiple Database Connections
        $data = DB::connection('mysql_test')->select('select * from category');
        dd($data);
        exit('ok');
        
    }
    
    // 查询构造器
    public function query(){
        $data = DB::table('category')->get();
        $data = DB::table('category')->where('id', '>=', 2)->get();
        $data = DB::table('category')->where('name', 'like', '%果')->get();
        $data = DB::table('category')->where('name', 'like', '%果')->get();
        $data = DB::table('category')->where('name', '=', '水果')->get();
        $data = DB::table('category')->where('name', '家具')->get();
        $data = DB::table('category')->where('id', '<>', 1)->get();
        $data = DB::table('category')->where('sort', 100)->where('id', '>', 3)->get();
        $data = DB::table('category')->where('id', 2)->orWhere('name', '水果')->get();
        $data = DB::table('category')->where('sort', 100)->first();
        
        $data = DB::table('category')->whereBetween('id', [1,2])->get();
        $data = DB::table('category')->whereNotBetween('id', [1,2])->get();
        
        $data = DB::table('category')->whereIn('id', [1,3])->get();
        $data = DB::table('category')->whereNotIn('id', [1,3])->get();
        
        $data = DB::table('category')->whereNull('desc')->get();
        $data = DB::table('category')->whereNotNull('desc')->get();
        
        $data = DB::table('category')->whereIn('id', [2,1,3])->value('name');  //只会返回符号条件的第一个记录的name值
        
        
        $data = DB::table('category')->whereIn('id', [1,2,3])->lists('name');
        $data = DB::table('category')->distinct()->lists('name');
        
        $data = DB::table('category')->lists('name');
        $data = DB::table('category')->lists('name', 'id');   //以id作为键
        
        //Aggregates
        $data = DB::table('category')->whereBetween('id', [1,4])->count();
        $data = DB::table('category')->whereNotNull('desc')->count();
        $data = DB::table('category')->avg('sort');
        $data = DB::table('category')->max('id');
        
        // select 
        
        $data = DB::table('category')->select('id', 'name as title', 'sort as csort')->get();
        $data = DB::table('category')->distinct()->select('name', 'sort')->get();
        
        $data = DB::table('category')->select(DB::raw('count(1) as count, name'))
                ->whereIn('id', [1,2,3,4,5])
                ->groupBy('name')
                ->get();
        
        
        dd($data);
        //Advanced Where Clauses
        #Parameter Grouping
        $data = DB::table('category')
                    ->whereNull('desc')
                    ->orWhere(function($query){
                        $query->where('name', '水果')
                              ->where('sort', 100);
                    })
                    ->get();
                    
        #Exists Statements
//        $data = DB::table('users')
//                    ->whereExists(function ($query) {
//                        $query->select(DB::raw(1))
//                        ->from('orders')
//                        ->whereRaw('orders.user_id = users.id');
//                    })
//                    ->get();
//        The query above will produce the following SQL:
//
//        select * from users
//        where exists (
//            select 1 from orders where orders.user_id = users.id
//        )
                    
        
        $data = DB::table('category')->skip(1)->take(2)->get();
        $data = DB::table('category')->orderBy('id', 'desc')->get();
        
        dd($data);
        
    }
    
    // 查询构造器  插入 修改 删除
    public function query2(){
        
        # insert
        
        // 插一条
//        $insert = DB::table('goods')->insert([
//                    'name'=>'坦克', 'cate_id'=>3, 'price'=>9999, 
//                    'created_at'=>date('Y-m-d H:i:s'),
//                    'updated_at'=>date('Y-m-d H:i:s')
//                  ]);
        
        
        // 插多条
//        $insert = DB::table('goods')->insert([
//            ['name'=>'飞机', 'cate_id'=>1, 'price'=>6000, 'created_at'=>date('Y-m-d H:i:s')], 
//            ['name'=>'飞机2', 'cate_id'=>2, 'price'=>889, 'created_at'=>date('Y-m-d H:i:s')]
//        ]);
        
        // 插一条 并返回记录主键
//        $insert = DB::table('goods')->insertGetId([
//                    'name'=>'坦克10', 'cate_id'=>3, 'price'=>999.8, 
//                    'created_at'=>date('Y-m-d H:i:s'),
//                    'updated_at'=>date('Y-m-d H:i:s')
//                  ]);
        
        #update
        // where 一定要写在 update()前面 ，不然会发生很恐怖的事情 =.=!
        
        //$line = DB::table('goods')->where('id', '>', 5)->update(['price'=>989]);
        
        //$line = DB::table('goods')->where('id', '<', 3)->Where('cate_id', 1)->update(['price'=>1000, 'cate_id'=>3]);
        
        //Increment / Decrement
        
//        $line = DB::table('goods')->where('price', '>', 900)->increment('cate_id');
//        $line = DB::table('goods')->where('price', '>', 900)->increment('cate_id', 100);
//        $line = DB::table('goods')->where('price', '>', 900)->decrement('cate_id');
//        $line = DB::table('goods')->where('price', '>', 900)->decrement('cate_id', 100);
        
        //You may also specify additional columns to update during the operation
        
//        $line = DB::table('goods')->where('id', 1)->increment('cate_id', 1, ['name'=>'风扇2']);
//        $line = DB::table('goods')->where('id', 1)->decrement('cate_id', 1, ['name'=>'风扇', 'price'=>5000]);
        
        
        #delete
        // delete 一定要写在 delete()前面 ，不然会发生很恐怖的事情 =.=!
        //$line = DB::table('goods')->where('id', 14)->delete();
        
        //If you wish to truncate the entire table, 
        //which will remove all rows and reset the auto-incrementing ID to zero, 
        //you may use the truncate method:
        
        //$line = DB::table('goods')->truncate();
        
        //dd($line);
    }
    
    // orm model curd
    
    public function orm(){
      
        
    }
    
}
