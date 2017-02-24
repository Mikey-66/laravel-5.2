<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Sysuser extends Authenticatable
{
    protected $table = 'sysuser';
    
    protected $primaryKey = 'id';
    
    protected $guarded = [];

    public $timestamps = true;
    
}
