<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use Libs\Uploader;

class ImgController extends Controller
{
    public function index(Request $request){
        
        if ($request->isMethod('POST')){
            exit;
            $file = $request->file();
            show($file);
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
    
    public function test(){
//        $uploader = new Uploader();
//        show($uploader->upload());exit;
        $appPath = app_path();
        $basePath = base_path();
        $configPath = config_path();
        $dbPath = database_path();
        $publicPath = public_path();
//        dd($publicPath);
        $sets = ['custom.upload_dir'=>'sdsd/sdsds200'];
//        $appConfig = config($sets);
        $appConfig = config('custom');
        dump($appPath);
        dump($basePath);
        dump($configPath);
        dump($dbPath);
        dump($appConfig);
//        $fh = file_get_contents();
    }
    
    public function upload(Request $request){
        
        $uploader = Uploader::getInstance();
        $uploader->loadImage($request);
        
        if (!$uploader->upload()){
            $err = $uploader->getErrMsg();
            return response()->json(['status'=>0, 'msg'=>'fail', 'err'=>$err]);
        }else{
//            dd($uploader->getUrl());
            return response()->json(['status'=>1, 'msg'=>'ok', 'data'=>[
                'url' => $uploader->getUrl()
            ]]);
        }
    }
    
}
