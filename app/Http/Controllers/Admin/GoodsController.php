<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Libs\BaseApi;

class GoodsController extends Controller
{
    public function Index(){
        
    }
    
    public function create(){
        return view('admin.goods.create');
    }
    
    public function store(Request $request){
        $data = $request->input();
        dd($data);
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
