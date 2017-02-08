<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    
    protected $primaryKey = 'id';
    
//    protected $fillable = [];
    
    protected $guarded = [];

    public $timestamps = true;
    
    // 定义关联关系
    
    public function father(){
        return $this->hasOne('App\Models\Category', 'id', 'pid');
    }
    
    public function son(){
        return $this->hasMany('App\Models\Category', 'pid', 'id');
    }




    //Accessors & Mutators   //通常用于格式化
    
    #Accessors
//    public function getNameAttribute($value){
//        return '哈哈';  // 现在通过模型访问 name属性 会返回 '哈哈';
//    }
    
    #Mutators
//    public function setSortAttribute($value){
//        // 现在通过模型设置 sort属性 会在设定值基础上再加100;
//        $this->attributes['sort'] = $value +100;
//    }
    
    
}
