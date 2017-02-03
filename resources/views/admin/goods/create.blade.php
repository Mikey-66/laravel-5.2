@extends('layouts.new')
@section('title', '添加商品')
@section('content')
    <ol class="breadcrumb">
        <li><a>商品管理</a></li>
        <li><a>商品列表</a></li>
    </ol>
    <h2>添加商品</h2>
    @include('layouts.message')
    @include('admin.goods.form1')
@stop

@section('script')
@parent
<!--<script>
    var x = {name:'liujie', age:18}
    console.log('1212');
</script>-->
@stop
