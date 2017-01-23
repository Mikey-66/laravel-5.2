@extends('layouts.admin');

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2>详情查看</h2>
    <p class="text-right"><a class="btn btn-primary" href="{{ url('admin/article') }}">返回</a></p>
    <!--@include('admin.article.form')-->
    <div class="form-group">
      <label>标题</label>
      <input type="text" class="form-control" name="model[title]" value="{{ $model->title or '' }}">
    </div>

    <div class="form-group">
      <label>内容</label>
      <textarea rows="10" class="form-control" name="model[body]">{{ $model->body or ''}}</textarea>
    </div>
</div>
@endsection

@section('script')
<script>
    console.log(11);
</script>
@endsection