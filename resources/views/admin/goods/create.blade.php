@extends('layouts.new')
@section('title', '添加商品')
@section('content')
<div>
    @include('layouts.message')
    
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="panel-title">添加商品</h2>
        </div>
        <div class="panel-body">
            <br/>
            @include('admin.goods.form')
        </div>
    </div>
</div>    
@stop

@section('script')
@parent
<!--<script>
    var x = {name:'liujie', age:18}
    console.log('1212');
</script>-->
@stop
