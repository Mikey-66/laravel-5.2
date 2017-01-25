@extends('layouts.admin')   
@section('title', '文章列表')
@section('content')
    <h1 class="page-header">文章列表</h1>
    
    <p class="text-right"><a class="btn btn-primary" href="{{ url('admin/article/create') }}">添加文章</a></p>
    
    @if(Session::has('success'))
    <div class="alert alert-success alert-dismissible">
            <strong>{{ session('success')  }}</strong><br><br>
    </div>
    @endif
    
    <div class="collapse navbar-collapse">
        <form class="navbar-form navbar-left" method="GET" action="{{url('admin/article')}}">
            <div class="form-group">
              <input type="text" name="sword" class="form-control" placeholder="标题">
            </div>
            <button type="submit" class="btn btn-default">搜索</button>
        </form>
    </div>
    
    <!--<h2 class="sub-header">Section title</h2>-->
    
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
              <tr>
                <th class="text-center">序号</th>
                <th>标题</th>
                <th>内容</th>
                <th>作者</th>
                <th>更新时间</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody>
                @foreach($data as $key=>$item)
                <tr>
                  <td class="text-center">{{ $key+1 }}</td>
                  <td>{{ $item->title }}</td>
                  <td>{{ $item->body }}</td>
                  <td>{{ $item->user_id }}</td>
                  <td>{{ $item->updated_at }}</td>
                  <td>
                        <a title="详情查看" href="{{ url("admin/article/{$item->id}") }}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>&nbsp;
                        <a title="编辑" href="{{ url("admin/article/{$item->id}/edit") }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>&nbsp;
                        <a title="删除" pos="{{url("admin/article/{$item->id}")}}" class="lj_ajax-del" warning="确认删除?" href="javascript:;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>&nbsp;
                  </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {!! $data->render() !!}
    </div>

@endsection
