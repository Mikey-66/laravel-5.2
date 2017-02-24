@extends('layouts.new')
@section('title', '文章列表')

@section('content')
<div class="jumbotron">
    <div style="padding: 0 60px;">
        <h1>Hello, Laravel!</h1>
        <p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to 
            featured content or information.</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
        <p>
            <?php if (Auth::check()):?>
            <span>已登录</span>
            <?php endif;?>
        </p>
    </div>
</div>
@stop