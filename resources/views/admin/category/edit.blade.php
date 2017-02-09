@extends('layouts.new');
@section('title', '编辑分类')
@section('content')
<div>
    @include('layouts.message')
    
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">编辑分类</h2>
        </div>
        <div class="panel-body">
            <br/>
            @include('admin.category.form')
        </div>
    </div>
</div>  
@endsection