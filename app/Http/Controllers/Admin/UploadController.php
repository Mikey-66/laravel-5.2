<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    /**
     * 图片上传
     */
    public function imgUpload(){
        echo 'post';
        
        dd($_FILES);
    }
    
    public function index(){
        return view('admin.upload.index');
    }
    
    
}

