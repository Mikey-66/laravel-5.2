<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function index(){
        
        $user = Auth::guard('admin')->user();
//        Auth::guard('admin')->logout();
//        show($user);exit;
        return view('admin.site.index');
    }
}
