<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    use SoftDeletes;
    
    protected $table = 'goods';
    
    public $timestamps = true;
    
    protected $fillable = ['title','body','user_id'];
    
    protected $guarded = ['*'];
}