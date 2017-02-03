<?php
namespace Libs;

class Uploader
{
    private static $uploader;
    private $file;
    protected $path;  // 文件保存路径
    protected $maxSize = 2097152;  //2M
    protected $tmpPath = 'uploads/temp';
    protected $ext;     // 上传文件后缀
    protected $allowExt=['jpg', 'jpeg', 'bnp', 'gif', 'png'];  //允许上传的文件后缀
    protected $errMsg = [];     //错误信息
    protected $imageFlag = true;   // 是否检查是否为真实图片 默认为是
    protected $mkDir = true;        //如果路径不存在则创建
    
    private function __construct() {}
    
    public function loadImage($request){
        if ($request->file('file') && $request->file('file')->isValid()){
            $this->file = $request->file('file');
            $ext = strtolower($this->file->getClientOriginalExtension());
            $this->ext = $ext=='jpg' ? 'jpeg' : $ext;
        }else{
            $this->addErrMsg('文件载入失败');
        }
    }

    public static function getInstance(){
        if (self::$uploader !==null){
            return self::$uploader;
        }else{
            self::$uploader = new self();
            return self::$uploader;
        }
    }
    
    public function getErrMsg(){
        return $this->errMsg;
    }

    public function addErrMsg($msg){
        $this->errMsg[] = $msg;
    }
    
    public function getUrl(){
        $re = realpath(public_path() . '/' . $this->tmpPath);
        $p = str_replace($re , '', $this->path);
        $p = '/' . $this->tmpPath . $p;
        return $p; 
    }

    public function setImgFlag($flag = null){
        if ($flag && in_array($flag, array(true, false,1, 0))){
            $this->imageFlag = (bool)$flag;
        }else{
            $this->imageFlag = !$this->imageFlag;
        }
    }

    protected function _checkExt(){
        if (!in_array($this->ext, $this->allowExt)){
            $this->addErrMsg('非法的文件类型');
        }
    }
    
    protected function _checkSize(){
        if ($this->file->getSize() > $this->maxSize){
            $this->addErrMsg('文件过大');
        }
    }
    
    protected function _checkImage(){
        if ($this->imageFlag){
            if (!getimagesize($this->file->getRealPath())){
                $this->addErrMsg('不是真实的图片');
            }
        }
    }
    
    protected function getUniName(){
        return md5(uniqid(microtime(true), true));
    }
    
    protected function _checkPath(){
        $path = public_path() . '/' . $this->tmpPath;
        
        if (realpath( $path ) === false){
            if (!file_exists($path) && $this->mkDir){
                mkdir($path, 0777, true);
            }else{
                $this->addErrMsg('路径无效');
            }
        }
        
        $this->path = realpath($path);
    }
    
    protected function _checkBeforeUpload(){
        if (count($this->errMsg)<=0){
            $this->_checkExt();     //检查是否为允许的文件类型
            $this->_checkImage();   //检查是否是真实的图片
            $this->_checkSize();    //检查文件大小是否符合设置
            $this->_checkPath();    //检查文件保存路径
        }
    }
    
    public function upload(){
        
        $this->_checkBeforeUpload();
        
        if (count($this->errMsg)){
            return false;
        }else{
            $fileName = $this->getUniName() . '.' . $this->ext;
            $this->path .= '/' . date('Y');
            
            if (!file_exists($this->path)){
                mkdir($this->path);
            }
            
            $this->path .= '/' . date('m');
            
            if (!file_exists($this->path)){
                mkdir($this->path);
            }
            
            $this->path .= '/' . date('d');
            
            if (!file_exists($this->path)){
                mkdir($this->path);
            }
            
            try{
                $this->file->move($this->path, $fileName);
                $this->path = $this->path . '/' . $fileName;
                return true;
            }  catch (\Symfony\Component\HttpFoundation\File\Exception\FileException $exception){
                $this->addErrMsg($exception->getMessage());
                return false;
            }
        }
    }
    
    
}

