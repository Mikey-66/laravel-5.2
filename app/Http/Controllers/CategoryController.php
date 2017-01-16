<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(){
        
        DB::table('category')->delete();
        
        $res = \App\Models\Category::create([
                'name'=>'家电',
                'cate_path'=>'1,',
                'sort'=>1
            ]);
        
        dd($res);
    }
    
}
