<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Goods extends Model
{
    use SoftDeletes;
    
    protected $table = 'goods';
    
    public $timestamps = true;
    
    protected $guarded = ['id'];
    
    public function cate(){
        return $this->hasOne('App\Models\Category', 'id', 'cate_id');
    }
}