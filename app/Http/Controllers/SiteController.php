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
        
    }
}
