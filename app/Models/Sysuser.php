<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Zizaco\Entrust\Traits\EntrustUserTrait;

class Sysuser extends Authenticatable
{
    use EntrustUserTrait;   // add this trait to your user model
    
    protected $table = 'sysuser';
    
    protected $primaryKey = 'id';
    
    protected $guarded = [];

    public $timestamps = true;
    
    public function isSuperAdmin(){
        return false;
    }
    
}
