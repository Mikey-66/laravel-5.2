<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;

class ImgController extends Controller
{
    public function index(Request $request){
        
        if ($request->isMethod('POST')){
            $file = $request->file();
            dd($file);
            exit;
            $imgManager = new ImageManager();
            //dd($_FILES);
            $imgManager->make($_FILES['file']['tmp_name'])->save('uploads/temp/sdsd2.jpeg');
            $imgManager->make($_FILES['file']['tmp_name'])->resize(100,100)->save('uploads/temp/sdsd2_thumb.jpeg');
            $imgManager->make($_FILES['file']['tmp_name'])->resize(50,50)->save('uploads/temp/sdsd2_thumb_min.jpeg');
            
//                    ->resize(100, 100)
//                    ->save('uploads/temp/sdsd2.jpeg');
            echo 'done';
        }
        
        return view('admin.img.index');
    }
}
