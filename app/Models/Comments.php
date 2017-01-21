<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'comments';
    
    //protected $fillable =['article_id'];
    
    protected $guarded = ['*'];
    
    //
    
    public function article(){
        return $this->hasOne('App\Models\Article', 'id', 'article_id');
    }
    
    public function vote(){
        return $this->hasOne('App\Models\Votes', 'comment_id', 'id');
    }
}
