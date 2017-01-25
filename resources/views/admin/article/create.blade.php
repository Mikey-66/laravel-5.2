@extends('layouts.admin');
@section('title', '添加文章')
@section('content')

    <h2>添加文章</h2>
    @include('layouts.message')
    @include('admin.article.form')

@stop

@section('script')
@parent
<script>
    var x = {name:'liujie', age:18}
    console.log('1212');
</script>
@stop
