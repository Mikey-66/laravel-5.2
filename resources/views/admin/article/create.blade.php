@extends('layouts.new')
@section('title', '添加文章')
@section('content')
<div>
    @include('layouts.message')
    
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">添加文章</h2>
        </div>
        <div class="panel-body">
            <br/>
            @include('admin.article.form')
        </div>
    </div>
</div>   
@stop

@section('script')
@parent
<script>
    console.log('1212');
</script>
@stop
